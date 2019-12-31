<?php

namespace App\Http\Controllers;

use App\imgImovel;
use Illuminate\Http\Request;
use App\Imovel;
use App\Items;
use Illuminate\Support\Facades\Storage;
use DateTime;


class ImovelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $imoveis = Imovel::where('status', '!=', 'Oculto')->paginate(6);
        return view( 'home', compact('imoveis'));
    }

    public function gerenciar()
    {
        $imoveis = Imovel::paginate(6);
        return view( 'perfil/gerenciar', compact('imoveis'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {         
        $imovel = new Imovel();
        $imovel->titulo = $request->input('titulo');
        $imovel->piscina = $request->input('piscina');
        $imovel->capacidade = $request->input('capacidade');
        $imovel->cobertura = $request->input('cobertura');
        $imovel->descricao = $request->input('descricao');
        $imovel->portaria = $request->input('portaria');
        $imovel->quartos = $request->input('quartos');
        $imovel->endereco = $request->input('endereco');
        $imovel->areaLazer = $request->input('areaLazer');
        $imovel->status = true;
        $imovel->save();
        $files = $request->file('images');
        if (!empty($files)) {
            foreach($files as $key=>$file)
            {
                $img = new imgImovel();
                $img->imovel_id = $imovel->id;                          
                $pathFoto = $file->storeas('uploads', $imovel->titulo."foto".($key+1).'.'.$file->getClientOriginalExtension(), 'public');
                $img->img_path = $pathFoto;
                $img->save();
            }
        }
        return redirect('/imovel/gerenciar');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $imovel = Imovel::find($id);
        if($imovel != ""){
            return view('detalhado')->with('imovel', $imovel);
        }
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $imovel = Imovel::find($id);
        if($imovel != ""){
            return view('perfil/editImovel')->with('imovel', $imovel);
        }
        return redirect('/home');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $imovel = Imovel::find($id);
        if($imovel != ""){
            $imovel->titulo = $request->input('titulo');
            $imovel->piscina = $request->input('piscina');
            $imovel->capacidade = $request->input('capacidade');
            $imovel->descricao = $request->input('descricao');
            $imovel->portaria = $request->input('portaria');
            $imovel->quartos = $request->input('quartos');
            $imovel->endereco = $request->input('endereco');
            $imovel->areaLazer = $request->input('areaLazer');
            $imovel->status = $request->input('status');
            
            if($request->input('itemsHidden') != null && $request->input('itemsHidden') != ''){
                $items = explode( "!_!itemSeparator!_!",$request->input('itemsHidden'));
                print_r($items);
                foreach($items as $item){
                    if($item != ''){

                        $atributos = explode("|", $item);
                        print_r($atributos);
                        $itemObj = new Items();
                        $itemObj->nome = $atributos[2];
                        $itemObj->tipo = $atributos[1];
                        $itemObj->quantidade = $atributos[0];
                        $itemObj->imovel_id = $imovel->id;
                        $itemObj->save();       
                    }
                }
               
            }
            $imovel->save();
            return redirect("/imovel/editar/$imovel->id");
        }return redirect("/imovel/gerenciar");
    }

     /**
     * Adiciona imagem ao imovel.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function addImg(Request $request, $id)
    {
        $imovel = Imovel::find($id);
        if($imovel != ""){
            $qtdImgs = sizeof($imovel->images);
            $files = $request->file('images');
            if (!empty($files)) {
                $i = 1;
                foreach($files as $key=>$file)
                {   
                    $img = new imgImovel();
                    $img->imovel_id = $imovel->id;                          
                    $pathFoto = $file->storeas('uploads', $imovel->titulo."foto".($qtdImgs+$i).'.'.$file->getClientOriginalExtension(), 'public');
                    $img->img_path = $pathFoto;
                    $img->save();
                    $i++;
                }
            }
            $imovel->save();
            return redirect("/imovel/editar/$imovel->id");
        }
        return redirect("/imovel/gerenciar");
    }

    public function ocultar(Request $request){
        $imovel = Imovel::find($request->input('id'));
        if($imovel){
            $imovel->status = "Oculto";
            $imovel->save();
            
        }
        return redirect()->back();
    }
    public function exibir(Request $request){
        $imovel = Imovel::find($request->input('id'));
        if($imovel){
            $imovel->status = "Livre";
            $imovel->save();
            
        }
        return redirect()->back();
    }

    /** remove the specified image from imovel
     * 
     * @param int id
     * @return \Illuminate\Http\Response
     */
    public function removeImg($id)
    {
        $imovelImg = imgImovel::find($id);
        if($imovelImg){
            $id = $imovelImg->imovel_id;
            Storage::disk('public')->delete($imovelImg->img_path);
            $imovelImg->delete();
            return redirect("/imovel/editar/$id");
        }
        return redirect("/imovel/gerenciar");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Request $request)
    {
        $imovel = Imovel::find($request->id);
        if($imovel){
            foreach($imovel->images as $img){
                Storage::disk('public')->delete($img->img_path);
                $img->delete();
            }
            $imovel->delete();
            return redirect('/imovel/gerenciar');
        }
        return redirect('/imovel/gerenciar');
    }
}
