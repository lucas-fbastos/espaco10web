@extends('layouts.perfil')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 offset-md-1 col-12 mt-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/home">Perfil</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Gerenciar Imóveis</a></li>
                    </ol>
                </nav>
            </div>
        </div>
        <p class="text-center display-4">Gerenciar Imóveis</p>
        <p class="text-center display-6 text-secondary">Alugar, cadastrar, editar e apagar imóveis.</p>
        <div class="row ">
            <div class=" rounded bg-light col-md-10 col-12 offset-md-1  perfJumbo material-shadow pb-4">
                    <div class="row">
                        @if(!$imoveis->isEmpty())
                            <?php $i=0; ?>
                            @foreach($imoveis as $imovel)
                                <?php $i++; ?>
                                <div class="col-12 col-md-4 mb-4" >
                                    <div class="card  anuncioC h-100 cardSombra {{$imovel->status == 'Oculto' ? 'remover' : ''}}">
                                        <div  class="carousel slide h-30 w-100" id="carousel{{$i}}" data-ride="carousel">
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
                                                <a class="carousel-control-prev" href="#carousel{{$i}}" role="button" data-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                                <a class="carousel-control-next" href="#carousel{{$i}}" role="button" data-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </div>
                                        </div>
                                        
                                        <div class="card-body">
                                                <p class=" card-title text-primary text-capitalize">{{$imovel->titulo}}</p>
                                                {{substr($imovel->descricao,0,150)}}
                                                 @if(strlen($imovel->descricao) > 150)
                                                    ... 
                                                @endif
                                            </div>
                                            <hr>
                                            <div class="card-foter  d-flex mx-auto">
                                                <div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups">
                                                    <div class="btn-group mr-2" role="group" aria-label="First group">
                                                        <button type="button" class="btn btn-outline-primary" title="Alugar Imóvel">
                                                            <i class="fas fa-concierge-bell"></i>
                                                        </button>
                                                        <a href="/imovel/editar/{{$imovel->id}}" class="btn btn-outline-success" title="Editar Imóvel">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </a>
                                                        @if ($imovel->status != "Oculto")
                                                            <form action="/imovel.ocultar/{{$imovel->id}}" method="POST">
                                                                @csrf
                                                                {{method_field('PATCH')}}
                                                                <input type="hidden" name="id" value='{{$imovel->id}}'>
                                                                <button type="submit" class="btn btn-outline-warning" title="Ocultar Imóvel">
                                                                    <i class="fas fa-eye-slash"></i>
                                                                </button>
                                                            </form>
                                                        @else
                                                            <form action="/imovel.exibir/{{$imovel->id}}" method="POST">
                                                                @csrf
                                                                {{method_field('PATCH')}}
                                                                <input type="hidden" name="id" value='{{$imovel->id}}'>
                                                                <button type="submit" class="btn btn-outline-warning" title="Exibir Imóvel">
                                                                    <i class="fas fa-eye"></i>
                                                                </button>
                                                            </form>
                                                        @endif
                                                        <button type="button" class="btn btn-outline-danger" data-toggle="modal" onClick="deleteImovel('{{$imovel->titulo}}', '{{$imovel->id}}')" title="Deletar Imóvel">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                    
                                    </div>
                               </div>
                            @endforeach
                            <div class="col-6 offset-3 mt-4">{{$imoveis->links()}}</div>
                            @else
                                <p class="display-4">Não existem imóveis cadastrados</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
<button class="btn btn-xg btn-primary rounded-circle sticky" data-toggle="modal" data-target="#modalCadastro" title="Adicionar Imóvel"><i class="fas fa-plus"></i></button>
@endsection
@section('script')
<script>
function limpaModal(){
    $( "div#modalCadastro" ).find( ".modal-body" ).html('');
}

function formCadastro(){
    limpaModal();
    let form = "<form class='needs-validation' method='POST' action='/imovel' enctype='multipart/form-data' id='formcadastro'>";
            form+='@csrf';
            form+="<div class='form-group'>";
		        form+= "<div class='form-row'>";
		            form+="<div class='col'>";
		                form+="<label for='#titulo'>Título</label>";
	                    form+="<input type='text' required='' name='titulo' id='titulo' class='form-control'>";
		                form+="<div class='invalid-tooltip'>Digite o Título do anúncio.</div>";
      	                form+="<div class='valid-tooltip'>OK!</div>";
		            form+="</div>";
		        form+="</div>";
				form+="<div class='form-row'>";
					form+="<div class='col'>";
					    form+="<label for='#quartos'>Qtd. Quartos</label>";
					   	form+="<select id='quartos' name='quartos' required='' class='form-control'>";
					   		form+="<option value='1'>1</option>";
					   		form+="<option value='2'>2</option>";
					   		form+="<option value='3'>3</option>";
					   		form+="<option value='4'>4 ou mais</option>";
					   	form+="</select>";
					form+="</div>";
					form+="<div class='col'>";
					   	form+="<label for='#capacidade'>Capacidade</label>";
                        form+="<input type='number' required='' min='1' max='99' name='capacidade' id='capacidade' class='form-control'>";
                    form+="</div>";
                    form+="<div class='col'>";
                        form+="<div class='btn-group' style='margin-top: 2.0rem!important' role='group'>";
                            form+="<button class='btn btn-outline-primary btn-sm' type='button' onclick='aumentar(`#capacidade`)'><i class='fas fa-plus'></i></button>";
                            form+="<button class='btn btn-outline-primary btn-sm' type='button' onclick='diminuir(`#capacidade`)'><i class='fas fa-minus'></i></button>";
                        form+="</div>";	
                    form+="</div>";				
                form+="</div>";
                form+="<div class='form-row'>";
                    form+="<div class='col'>";
					   	form+="<label for='#piscina'>Piscina</label>";
					   	form+="<select class='form-control' required='' id='piscina' name='piscina'>";
					   		form+="<option value='1'> Sim</option>";
					   		form+="<option value='0'> Não</option>";
					   	form+="</select>";
					form+="</div>";
					form+="<div class='col'>";
					   	form+="<label for='#areaLazer'>Área de lazer</label>";
					   	form+="<select class='form-control' required='' id='areaLazer' name='areaLazer'>";
					   			form+="<option value='1'> Sim</option>";
					   			form+="<option value='0'> Não</option>";
					   	form+="</select>";
					form+="</div>";
                form+="</div>";
                form+="<div class='form-row'>";
					form+="<div class='col'>";
					   	form+="<label for='#portaria'>Portaria 24h</label>";
                        form+="<select class='form-control' required='' id='portaria' name='portaria'>";
                                form+="<option value='1'> Sim</option>";
					   			form+="<option value='0'> Não</option>";
                        form+="</select>";
                    form+="</div>";
					form+="<div class='col'>";
                        form+="<label for='#cobertura'>Cobertura</label>";
                        form+="<select class='form-control' required='' id='cobertura' name='cobertura'>";
                                form+="<option value='1'> Sim</option>";
					   			form+="<option value='0'> Não</option>";
                        form+="</select>";
                    form+="</div>";
                form+="</div>";
                form+="<div class='row'>";
                    form+="<div class='col col-12'>";
                        form+="<label for='#campoEndereco'>Endereço</label>";
                        form+="<input type='text' name='endereco' id='endereco' class='form-control' required=''>";
                    form+="</div>";    
                form+="</div>";
                form+="<div class='row'>";
                    form+="<div class='col col-12'>";
                        form+="<label>Fotos</label>";
                        form+="<div class='custom-file'>";
                            form+="<label  for='#campoFoto'>Fotos</label>";
                            form+="<input type='file' name='images[]' multiple id='campoFoto' class='form-control'>";
                        form+="</div>";
                    form+="</div>";
                form+="</div>";
			
                form+="<div class='form-row'>";
                    form+="<label for='#conteudo'>Descrição</label>";
					form+="<textarea id='conteudo' onkeyup='this.value = this.value.slice(0, 3000)' required='' class='form-control' name='descricao'></textarea>";
                form+="</div>";
                form+="<div class='form-row'>";
                    form+="<button type='submit' class='btn btn-primary btn-block mt-4'>Cadastrar</button>";
                form+="</div>";
			form+="</div>";
        form+="</form>";	
    $( "div#modalCadastro" ).find( ".modal-body" ).html(form);
}

function deleteImovel(nome, id){
    $( "div#deleteModal" ).find( "#titulo" ).html(nome);
    $( "div#deleteModal" ).find( "#idImovel" ).val(id);
    $('#deleteModal').modal('show');
}

function aumentar(element){
    let valor = $(element).val();
    valor++;
    $(element).val(valor);
}
function diminuir(element){
    let valor = $(element).val();
    if(valor>0){
        valor--;
    }
    $(element).val(valor);
}
</script>

@endsection

@section('modal')
<!-- modal cadastro -->
    <div class="modal fade" id="modalCadastro" tabindex="-1" role="dialog" aria-labelledby="modalCadastroLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCadastroLabel">Cadastro</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="voltarMenu()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p> Selecione um dos itens abaixo para abrir o respectivo menu de cadastro </p>
                    <div class="list-group">
                        <button href="#" class="menuItem list-group-item list-group-item-action" onclick="formCadastro()">
                            Cadastro de Apartamentos
                        </button>
                        <button href="#" class="menuItem list-group-item list-group-item-action">
                            Cadastro de Clientes
                        </button>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="voltarMenu()">fechar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true" data-backdrop="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Excluir</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Tem certeza que deseja apagar o Imóvel: <strong id='titulo'></strong>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <form action="/imovel/{$id}" method="POST">
                        @csrf
                        {{method_field('DELETE')}}
                        <input type="hidden" name="id" id='idImovel'>
                        <button type="submit" class="btn btn-danger">Apagar</button>
                    </form>
                </div>
            </div>
        </div>
@endsection