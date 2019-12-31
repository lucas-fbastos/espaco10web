@extends('layouts.perfil')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-12 mt-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/home">Perfil</a></li>
                        <li class="breadcrumb-item"><a href="/imovel/gerenciar">Gerenciar Imóveis</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{$imovel->titulo}}</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mx-auto mt-4">
                <h6 class="display-4 text-center text-capitalize">{{$imovel->titulo}}</h6>
                <p class="text-center text-muted">
                    <small> Atualizado em: {{$imovel->updated_at}}</small>
                </p>
            </div>
        </div>
        <div class="row mt-4 ">
            <div class="col-md-8 col-12">
                <div  class="carousel slide h-100 w-100" id="carousel" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($imovel->images as $img)
                            @if ($loop->first)
                                <div class="carousel-item active">
                            @else
                                <div class="carousel-item ">
                            @endif
                                    <img class="img-tamanho" 
                                    src="/storage/{{$img->img_path}}"
                                        alt="Foto" >
                                </div>
                        @endforeach
                        
                        <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="d-none d-sm-block col-md-4 mt-2negativo">
                <div class="card p-3">
                    <h5 class="display-6 card-title">Detalhes do Imóvel</h5>
                    <hr  class="mt-2negativo">
                    <div class="row">
                        <div class="col-12 m-1">
                            @if($imovel->status == "Livre")
                                <p class="card-text">
                                    Status:<Strong class="text-primary">&nbsp;Livre</Strong>
                                </p>
                            @else
                                <p class="card-text">
                                    Status:<Strong class="text-Warinig">&nbsp;Ocupado</Strong>
                                </p>
                            @endif
                        </div>
                        <div class="col-12 m-1">
                            <p class="card-text">Número de quartos: <strong>{{$imovel->quartos}}</strong></p>
                        </div>
                        @if($imovel->capacidade != "")
                            <div class="col-12 m-1">
                                <p class="card-text">Capacidade: <strong>{{$imovel->capacidade}}</strong> pessoa(s)</p>
                            </div>
                        @endif
                        @if($imovel->piscina == 1)
                            <div class="col-6 m-1">
                                <p class="card-text ">Piscina: <strong><i class="fas fa-check"></i></strong></p>
                            </div>
                        @endif
                        @if($imovel->portaria == 1)
                            <div class="col-6 m-1">
                                <p class="card-text ">Portaria: <strong><i class="fas fa-check"></i></strong></p>
                            </div>
                        @endif
                        @if($imovel->areaLazer == 1)
                            <div class="col-6 m-1">
                                <p class="card-text ">Área de Lazer: <strong><i class="fas fa-check"></i></strong></p>
                            </div>
                        @endif
                        @if($imovel->cobertura == 1)
                            <div class="col-6 m-1">
                                <p class="card-text ">Cobertura: <strong><i class="fas fa-check"></i></strong></p>
                            </div>
                        @endif
                        <div class="col-12 m-1">
                                <p class="card-text ">Endereço: <strong>{{$imovel->endereco}}</strong></p>
                            </div>
                    </div>
                </div>
                <div class="card">
                    <h4 class="card-text text-center p-3">Contato</h4>
                    <span class="text-center m-1">
                        <strong class="text-primary">
                            <i class="fas fa-phone"></i>
                        </strong>
                        (99) 9999-9999
                    </span>
                    <span class="text-center m-1">
                        <strong class="text-primary">
                                <i class="fas fa-envelope-open-text"></i>
                        </strong>
                        contato@espaco10.com.br
                    </span>
                    <hr>
                </div>
                <div class="card ">
                    <div class="col-12 mt-1 text-center">
                        <p class="text-center m-2">
                            <h4>Itens Disponíveis</h4>
                            <hr>
                        </p>
                    </div>
                    
                    <div class="collapse show" id="collapseItems">
                        <div class="card card-body">
                           @foreach ($imovel->items as $item)
                               
                           <div class="col-12">
                               @if ($item->tipo == 'eletrodoméstico')
                                    <strong class="text-primary">
                                        <i class="fas fa-plug"></i>
                                    </strong>
                               @endif
                               @if ($item->tipo == 'cama')
                                    <strong class="text-primary">
                                        <i class="fas fa-bed"></i>
                                    </strong>
                                @endif
                                @if ($item->tipo == 'louça')
                                    <strong class="text-primary">
                                        <i class="fas fa-utensil-spoon"></i>
                                    </strong>
                                @endif
                                @if ($item->tipo == 'outro')
                                    <strong class="text-primary">
                                        <i class="fas fa-clipboard-check"></i>
                                    </strong>
                                @endif
                                @if ($item->tipo == 'móvel')
                                    <strong class="text-primary">
                                        <i class="fas fa-couch"></i>
                                    </strong>
                                @endif
                                {{$item->nome}} - {{$item->quantidade}}x
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row mt-4 d-none d-sm-block mt-5negativo" style="max-width: 81vw;">
            <div class="container text-center">
                <div class="card-group">
                    @foreach ($imovel->images as $img)
                        <div class="row">
                            <div class="card">
                                <img  src="/storage/{{$img->img_path}}"
                                class="card-img-top img-list" alt="Foto">
                                <form action="/imovel.img/{{$img->id}}" method="POST" class=" border border-secondary">
                                    @csrf
                                    {{method_field('DELETE')}}
                                    <input type="hidden" name="id" id='id'>
                                    <button class="btn btn-sm ">
                                        <i class="fas fa-trash"></i>
                                    </button> 
                                </form>
                                
                            </div>
                        </div>
                        @if($loop->last)
                        <div class="row">
                                <div class="card ">
                                    <i class=" img-icon fas fa-camera-retro"></i>                                    
                                    <div class="border border-secondary">
                                        <button class="btn btn-sm ">
                                            <i class="fas fa-plus" data-toggle="modal"
                                                 data-target="#modalImg"></i>
                                        </button>
                                    </div> 
                                </div>
                            </div>
                        @endif
                    @endforeach
                    @if(sizeof($imovel->images)==0)
                        <div class="row">
                            <div class="card ">
                                <i class=" img-icon fas fa-camera-retro"></i>                                    
                                <div class="border border-secondary">
                                    <button class="btn btn-sm ">
                                        <i class="fas fa-plus" data-toggle="modal"
                                             data-target="#modalImg"></i>
                                    </button>
                                </div> 
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="card  mt-4 col-8 " >
                <h5 class="display-6 card-title">Descrição do Imóvel</h5>
                <hr  class="mt-2negativo">
                <div class="text-secondary">{!! nl2br($imovel->descricao) !!}</div>
            </div>
        </div>
        <!-- tela pequena -->
        <div class="row mt-2 d-sm-none">
            <div class="container text-center">
                <div class="row">
                    @foreach ($imovel->images as $img)
                        <div class="col-6">
                            <div class="card">
                                <img  src="/storage/{{$img->img_path}}"
                                    class="card-img-top img-list-ls" alt="Foto">
                                <form action="/imovel.img/{{$img->id}}" method="POST" class=" border border-secondary">
                                    @csrf
                                    {{method_field('DELETE')}}
                                    <input type="hidden" name="id" id='id'>
                                    <button class="btn btn-sm ">
                                        <i class="fas fa-trash"></i>
                                    </button> 
                                </form>                        
                            </div>
                        </div>
                        @if($loop->last)
                            <div class="col-6">
                                <div class="card ">
                                    <i class=" img-icon-ls fas fa-camera-retro"></i>                                    
                                    <div class="border border-secondary">
                                        <button class="btn btn-sm ">
                                           <i class="fas fa-plus" onclick="cadastraImg()"></i>
                                        </button>
                                    </div> 
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="d-sm-none col-12 ">
                <div class="card p-3">
                    <h5 class="display-6 card-title">Detalhes do Imóvel</h5>
                    <hr>
                    <div class="row">
                        @if($imovel->status == "Livre")
                            <div class="col-5 offset-1">
                                Status:<span class="text-primary">Livre</span>
                            </div>
                        @else
                             <p class="m-1">
                                 Status:<span class="text-warning">Ocupado</span>
                             </p>
                        @endif
                        <div class="col-5 offset-1">
                            <p class="card-text">Número de quartos: <strong>{{$imovel->quartos}}</strong></p>
                        </div>
                        @if($imovel->capacidade != "")
                            <div class="col-5 offset-1">
                                <p class="card-text">Capacidade: <strong>{{$imovel->capacidade}}&nbsp;Pessoa(s)</strong></p>
                            </div>
                        @endif
                       
                        @if($imovel->piscina == 1)
                            <div class="col-5 offset-1">
                                <p class="card-text ">Piscina: <strong><i class="fas fa-check"></i></strong></p>
                            </div>
                        @endif
                        @if($imovel->portaria == 1)
                            <div class="col-5 offset-1">
                                <p class="card-text ">Portaria: <strong><i class="fas fa-check"></i></strong></p>
                            </div>
                        @endif
                        @if($imovel->areaLazer == 1)
                            <div class="col-5 offset-1">
                                <p class="card-text ">Área de Lazer: <strong><i class="fas fa-check"></i></strong></p>
                            </div>
                        @endif
                        @if($imovel->cobertura == 1)
                            <div class="col-5 offset-1">
                                <p class="card-text ">Cobertura: <strong><i class="fas fa-check"></i></strong></p>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="card">
                    <h4 class="card-text text-center p-3">Contato</h4>
                    <span class="text-center m-1">
                        <strong class="text-primary">
                            <i class="fas fa-phone"></i>
                        </strong>
                        (99) 9999-9999
                    </span>
                    <span class="text-center m-1">
                        <strong class="text-primary">
                            <i class="fas fa-envelope-open-text"></i>
                        </strong>
                        contato@espaco10.com.br
                    </span>
                    <hr>
                </div>
                <div class="card ">
                        <p class="text-center m-2">
                            <button class="btn btn-block btn-outline-primary" type="button" data-toggle="collapse" 
                                data-target="#collapseItems" aria-expanded="true" aria-controls="collapseItems">
                                <h4>Itens Disponíveis</h4>
                            </button>
                        </p>
                        <div class="collapse show" id="collapseItems">
                            <div class="card card-body">
                               @foreach ($imovel->items as $item)
                                   
                               <div class="col-12">
                                   @if ($item->tipo == 'eletrodoméstico')
                                        <strong class="text-primary">
                                            <i class="fas fa-plug"></i>
                                        </strong>
                                   @endif
                                   @if ($item->tipo == 'cama')
                                        <strong class="text-primary">
                                            <i class="fas fa-bed"></i>
                                        </strong>
                                    @endif
                                    @if ($item->tipo == 'louça')
                                        <strong class="text-primary">
                                            <i class="fas fa-utensil-spoon"></i>
                                        </strong>
                                    @endif
                                    @if ($item->tipo == 'outro')
                                        <strong class="text-primary">
                                            <i class="fas fa-clipboard-check"></i>
                                        </strong>
                                @endif
                                @if ($item->tipo == 'móvel')
                                    <strong class="text-primary">
                                        <i class="fas fa-couch"></i>
                                    </strong>
                                @endif
                                {{$item->nome}} - {{$item->quantidade}}x
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" >
            <div class="d-sm-none  col-12  ">
                <div class="card p-3">
                    <h5 class="display-6 card-title">Descrição do Imóvel</h5>
                    <hr>
                    <p class="text-secondary">{!! nl2br($imovel->descricao) !!}</p>
                </div>
            </div>
        </div>
        <button class="btn btn-lg btn-primary rounded-circle sticky" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-pencil-alt"></i></button>
    </div>
    <!--  ---------------MODAL DE EDIÇÃO --------------- -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/imovel/{{$imovel->id}}" method="post" enctype='multipart/form-data'>
                    @csrf
                    {{method_field('PUT')}}
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="titulo">Título</label>
                            <input type="text" class="form-control" name="titulo" id="titulo" value="{{$imovel->titulo}}">
                        </div>
                        <div class="form-group">
                            <label for="endereco">Endereço</label>
                            <input type="text" class="form-control" id="endereco" name="endereco" value="{{$imovel->endereco}}">
                        </div>
                        <div class="form-group">
                            <label for="capacidade">Capacidade</label>
                            <input type='number' required='' min='1' max='99' name='capacidade'
                                 id='capacidade' class='form-control'>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label for="quartos">Qtd. Quartos</label>
                                <select name="quartos" class="form-control">
                                    <option value="1" @if($imovel->quartos == "1")  selected @endif>1</option>
                                    <option value="2" @if($imovel->quartos == "2")  selected @endif>2</option>
                                    <option value="3" @if($imovel->quartos == "3")  selected @endif>3</option>
                                    <option value="4" @if($imovel->quartos == "4")  selected @endif>4 ou mais</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="piscina">Piscina</label>
                                <select name="piscina" class="form-control">
                                    <option value="1" @if($imovel->piscina == "1")  selected @endif>Sim</option>
                                    <option value="0" @if($imovel->piscina == "0")  selected @endif>não</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label for="areaLazer">Área de Lazer</label>
                                <select name="areaLazer" class="form-control">
                                    <option value="1" @if($imovel->areaLazer == "1")  selected @endif>Sim</option>
                                    <option value="0" @if($imovel->areaLazer == "0")  selected @endif>não</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="portaria">Portaria</label>
                                <select name="portaria" class="form-control">
                                    <option value="1" @if($imovel->portaria == "1")  selected @endif>Sim</option>
                                    <option value="0" @if($imovel->portaria == "0")  selected @endif>não</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="Cobertura">Cobertura</label>
                                <select name="cobertura" class="form-control">
                                    <option value="1" @if($imovel->cobertura == "1")  selected @endif>Sim</option>
                                    <option value="0" @if($imovel->cobertura == "0")  selected @endif>não</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <label for="endereco">Status</label>
                            <select name="status" class="form-control">
                                <option value="Livre" @if($imovel->status == "Livre")  selected @endif>Livre</option>
                                <option value="Ocupado" @if($imovel->status == "Ocupado")  selected @endif>Ocupado</option>
                                <option value="Oculto" @if($imovel->status == "Oculto")  selected @endif>Oculto</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group p-2">
                        <div class="col-8 offset-2 ">
                            <button class="btn btn-block btn-primary" type="button" onclick="adicionarItemForm()">Adicionar Item</button>
                        </div>
                    </div>
                    <div class="form-group p-2 d-none itemForm1">
                        <div class="form-row">
                            <div class="col-6">
                                <label  for='#tipo'>Tipo </label>
                                <select name="tipo" class="form-control" id="tipo">
                                    <option value="eletrodoméstico">Eletrodoméstico</option>
                                    <option value="cama">Cama</option>
                                    <option value="móvel">Móvel</option>
                                    <option value="louça">Louça</option>
                                    <option value="outro">Outro</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label  for='#desc'>Quantidade</label>
                                <input type="number" name='qtd' id='qtd' class="form-control" min="0" max="99">
                            </div>
                        </div>
                        <div   class="form-row p-2 d-none itemForm1">
                            <label  for='#desc'>Descrição</label>
                            <input type="text" class="form-control" name="desc" id="desc">
                        </div>
                        <div class="form-row mt-3 d-none itemForm1">
                            <div class="col-8 offset-2 ">
                                <button class="btn btn-block btn-outline-success" type="button" onclick="cadastraItem()">+</button>
                                <button class="btn btn-block btn-outline-danger" type="button" onclick="limparItens()">Limpar</button>
                            </div>
                        </div>
                    </div>
                    <table id='tbItens' class=" table col-10 offset-1">
                        <thead>
                            <tr>
                                <th>Descrição</th>
                                <th>Tipo</th>
                                <th>Quantidade</th>
                            </tr>
                        </thead>
                        <input type="hidden" id="itemsHidden" name="itemsHidden"  value="">
                        <tbody>

                        </tbody>
                    </table>
                    <div class="form-group p-2">
                            <label  for='#desc'>Descrição </label>
                            <textarea name='descricao' id='desc' class='form-control'>{{$imovel->descricao}}</textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--  ---------------MODAL IMAGENS --------------- -->
    <div class="modal fade" id="modalImg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title" id="exampleModalLabel">Adiconar Imagens</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/imovel.addImg/{{$imovel->id}}" method="post" enctype='multipart/form-data'>
                        @csrf
                        {{method_field('PUT')}}    
                        <div class='custom-file'>
                            <label  for='#campoFoto'>Fotos</label>
                            <input type='file' name='images[]' multiple 
                                id='campoFoto' class='form-control'>
                        </div>
                        <button type="submit" class=" mt-5 btn btn-primary">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script>
    function adicionarItemForm(event){
        $('.itemForm1').toggleClass('d-none');
    }
    function cadastraItem(){
        var qtd = $('#qtd').val();
        var tipo = $('#tipo').val();
        var desc = $('#desc').val();
        if(qtd =='' || qtd == null ||tipo =='' || tipo == null
            || desc =='' || desc == null   ){
                return false;
        }
        var newItem = qtd+'|'+tipo+'|'+desc+'!_!itemSeparator!_!';
        if($("[name='itemsHidden']").val()!=null){
            $("[name='itemsHidden']").val($("[name='itemsHidden']").val()+newItem);
        }else{
            $("[name='itemsHidden']").val(newItem);
        }
        insRow(qtd,desc,tipo);
        $('#qtd').val('');
        $('#tipo').val('');
        $('#desc').val('');   
    }
    
    function insRow(qtd, desc,tipo){
        var newRowContent = "<tr><td>"+desc+"</td><td>"+tipo+"</td><td>"+qtd+"</td></tr>"
        $("#tbItens tbody").append(newRowContent);
    }

    function limparItens(){    
        $("#tbItens tbody tr").remove(); 
    }
    
</script>

@endsection()