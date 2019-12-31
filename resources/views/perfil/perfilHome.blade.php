@extends('layouts.perfil')
@section('content')
    <div class="container-fluid">
        
        <img src="../imgs/user.jpg"  class='img-fluid mt-4 d-flex mx-auto imgPerf rounded-circle img-thumbnail' width="150px" alt="">
        
        <div class="row block">
            <div class=" rounded bg-light col-md-10 col-12 offset-md-1  mt-10negativo perfJumbo material-shadow ">
                <br><br>
                <h4 class="display-4  text-center mt-5 text-capitalize">
                    {{Auth::user()->name}}
                </h4> 
                <h6 class="text-secondary text-center display-6">Administrador</h6>
                <hr>
                <!-- cards -->
                <div class="row">
                    <div class="col-12  col-md-6 offset-md-0 animatedOverflow">
                        <div class="card animated slideInLeft menuItem" data-toggle="modal" data-target="#modalCadastro">
                            <div class="card-header bg-primary">
                                <p class="display-7 text-center text-light">
                                    <i class="fas fa-building"></i>
                                    Cadastro
                                </p>
                            </div>
                            <div class="card-body text-center">
                                Clique nesse card para cadastrar um imóvel ou cliente no sistema, assim que cadastrado o imóvel já estará disponível na página inicial.
                            </div>
                        </div>
                    </div>
                    
                    

                    <div class="col-12 col-md-6 offset-md-0 animatedOverflow">
                        <div class="card animated slideInRight menuItem" data-toggle="modal" data-target="#modalGerenciar">
                            <div class="card-header bg-success">
                                <p class="display-7 text-center text-light">
                                    <i class="fas fa-clipboard-list"></i>    
                                    Gerenciamento
                                </p>
                            </div>
                            <div class="card-body text-center">
                                Clique nesse card para escolher qual painel administrativo deseja abrir.
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-12 col-md-6 offset-md-0 animatedOverflow">
                        <div class="card animated slideInLeft menuItem"  data-toggle="modal" data-target="#modalReservas">
                            <div class="card-header bg-danger">
                                <p class="display-7 text-center text-light">
                                    <i class="fas fa-concierge-bell"></i>    
                                    Agendamento de Reservas
                                </p>
                            </div>
                            <div class="card-body text-center">
                                Clique nesse card para agendar uma reserva com os imóveis e clientes cadastrados.
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 offset-md-0 animatedOverflow">
                        <div class="card animated slideInRight menuItem" >
                            <div class="card-header bg-warning">
                                <p class="display-7 text-center text-light">
                                    <i class="fas fa-file-signature"></i>    
                                    Gerador de Contratos
                                </p>
                            </div>
                            <div class="card-body text-center">
                                Clique nesse card para gerar um contrato de locação.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script type="text/javascript">
(function( $ ) {
    
    $.fn.sameHeight = function() {
        var selector = this;
        var heights = [];

        selector.each(function(){
            var height = $(this).height();
            heights.push(height);
        });
        
        var maxHeight = Math.max.apply(null, heights);
        selector.each(function(){
            $(this).height(maxHeight);
        }); 
    };
 
}( jQuery ));

$('.card').sameHeight();
$(window).resize(function(){
    $('.card').sameHeight();
});
function limpaModal(){
    $( "div#modalCadastro" ).find( ".modal-body" ).html('');
}

function formCliente(){
    limpaModal();
    let form = "<form method='POST' action='/cliente' id='formCliente'>";
    form+='@csrf';
            form+="<div class='form-group'>";
		        form+= "<div class='form-row'>";
		            form+="<div class='col'>";
		                form+="<label for='#nome'>Nome</label>";
	                    form+="<input type='text' required='' name='nome' id='nome' class='form-control'>";
		            form+="</div>";
                form+="</div>";
                form+= "<div class='form-row'>";
		            form+="<div class='col'>";
		                form+="<label for='#email'>E-mail</label>";
	                    form+="<input type='email' required='' name='email' id='email' class='form-control'>";
		            form+="</div>";
                form+="</div>";
                form+= "<div class='form-row'>";
                    form+="<div class='col'>";
		                form+="<label for='#cpf'>CPF</label>";
	                    form+="<input type='text' required='' name='cpf' id='cpf' class='form-control'>";
		            form+="</div>";
                form+="</div>";
                form+= "<div class='form-row'>";
                    form+="<div class='col'>";
		                form+="<label for='#rg'>RG</label>";
	                    form+="<input type='text' required='' name='rg' id='rg' class='form-control'>";
		            form+="</div>";
                form+="</div>";
                form+= "<div class='form-row'>";
                    form+="<div class='col'>";
		                form+="<label for='#telefone'>Telefone</label>";
	                    form+="<input type='text' required='' name='telefone' id='telefone' class='form-control'>";
		            form+="</div>";
                form+="</div>";
                form+= "<div class='form-row'>";
                    form+="<div class='col'>";
		                form+="<label for='#endereco'>Endereço</label>";
	                    form+="<input type='text' required='' name='endereco' id='endereco' class='form-control'>";
		            form+="</div>";
                form+="</div>";
                form+="<div class='form-row'>";
                    form+="<button type='submit' class='btn btn-primary btn-block mt-4'>Cadastrar</button>";
                form+="</div>";
            form+="</div>";
        form+="</form>";	
    $( "div#modalCadastro" ).find( ".modal-title" ).html('Cadastro de Clientes');
    $( "div#modalCadastro" ).find( ".modal-body" ).html(form);
                    
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

function formImovel(){
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
    $( "div#modalCadastro" ).find( ".modal-title" ).html('Cadastro de Imóveis');
    $( "div#modalCadastro" ).find( ".modal-body" ).html(form);
}
function voltarMenu(){
    let menu = '<p> Selecione um dos itens abaixo para abrir o respectivo menu de cadastro </p>';
        menu+='<div class="list-group">';
            menu+='<button  class="menuItem list-group-item list-group-item-action" onclick="formImovel()">Cadastro de Apartamentos</button>';
            menu+='<button  class="menuItem list-group-item list-group-item-action" onclick="formCliente()">Cadastro de Clientes</button>';
        menu+='</div>';
    $( "div#modalCadastro" ).find( ".modal-body" ).html(menu);
}

function defineCliente(){
    let valorCliente;
    valorCliente = $("#selectCliente").val(); 
    if( valorCliente != "0"){
        $("#selectClientes").addClass("animated fadeOutUp");
        setTimeout(function () {
            $("#selectClientes").hide();
        }, 600);
        $("#selectImoveis").removeClass("d-none");
        $("#selectImoveis").addClass("animated fadeInUp");
    }
}

function defineImovel(){
    let valorImovel;
    valorImovel = $("#selectImoveis").val(); 
    if(  valorImovel != "0"){
        $("#selectImoveis").addClass("animated fadeOutUp");
        setTimeout(function () {
            $("#selectClientes").hide();
        }, 600);
        $("#datas").removeClass("d-none");
        $("#datas").addClass("animated fadeInUp");
    }
}

function voltaMenuReserva(indice){
    switch(indice){
        case 1:
            
            $("#selectImoveis").addClass("d-none");
            $("#selectImoveis").removeClass("animated fadeInUp");
            $("#selectClientes").removeClass("animated fadeOutUp");
            $("#selectClientes").show();
            break;
        case 2:

            break;


    }
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
                        <button href="#" class="menuItem list-group-item list-group-item-action" onclick="formImovel()">
                            Cadastro de Apartamentos
                        </button>
                        <button href="#" class="menuItem list-group-item list-group-item-action" onclick="formCliente()">
                            Cadastro de Clientes
                        </button>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="voltarMenu()">Menu</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="voltarMenu()">fechar</button>
                </div>
            </div>
        </div>
    </div>

<!-- modal gerenciamento -->
<div class="modal fade" id="modalGerenciar" tabindex="-1" role="dialog" aria-labelledby="modalGerenciarLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalGerenciarLabel">Gerenciamento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="voltarMenu()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p> Selecione um dos itens abaixo para abrir a respectiva página de gerenciamento </p>
                    <div class="list-group">
                        <a href="/imovel/gerenciar" class="list-group-item list-group-item-action">
                            Gerenciamento de Apartamentos
                        </a>
                        <a href="/cliente/gerenciar" class="list-group-item list-group-item-action">
                        Gerenciamento de Clientes
                        </a>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">fechar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalReservas" tabindex="-1" role="dialog" aria-labelledby="modalReservasLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalReservasLabel">Reservas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="voltarMenu()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row" id='selectClientes'>
                        <div class="col-12">
                            <p>Escolha o Cliente desejado:</p>
                        </div>
                        <div class="col-10">
                            <select name="cliente" id="selectCliente" class="custom-select">
                                <option value='0'>Selecione</option>
                                @foreach($clientes as $cliente)
                                <option value="{{$cliente->id}}">{{$cliente->nome}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-2">
                            <button class="btn btn-outline-success btnRedondo mb-2" id='btnCliente' onClick='defineCliente()'> <i class="fas fa-2x fa-check-circle"></i></button>
                        </div>
                    </div>
                    <div class="row d-none" id='selectImoveis'>
                        <div class="col-12">
                            <p>Escolha o Imóvel desejado:</p>
                        </div>
                        <div class="col-10">
                           <select name="imovel" id="selectImovel" class="custom-select">
                                <option>Selecione</option>
                                    @foreach($imoveis as $imovel)
                                        <option value="{{$imovel->id}}">{{$imovel->titulo}}</option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="col-2">
                                <button class="btn btn-outline-success btnRedondo mb-2" id='btnImovel' onClick='defineImovel()'> <i class="fas fa-2x fa-check-circle"></i></button>
                               
                        </div>
                        <button class="btn btn-outline-secondary " id='btnVoltar' onClick='voltaMenuReserva(1)'><i class="fas fa-backward"></i></button>
                    </div>
                    <div class="row d-none" id='datas'>
                        <div class="col-12">
                            <p>Escolha as data de Entrada e Saída :</p>
                        </div>
                        <div class="col-10">
                            <label for="#dataEntrada">Data de Entrada</label>
                            <input type='date' id='dataEntrada' name="dataEntrada" required class="form-controls">
                        </div>
                        <div class="col-2">
                                <button class="btn btn-outline-success btnRedondo mb-2" id='btnImovel' onClick='defineImovel()'> <i class="fas fa-2x fa-check-circle"></i></button>
                               
                        </div>
                        <button class="btn btn-outline-secondary " id='btnVoltar' onClick='voltaMenuReserva(2)'><i class="fas fa-backward"></i></button>
                    </div>

                </div>
                <div class="modal-footer">
                    
                    <button type="button" class="btn btn-danger" data-dismiss="modal">fechar</button>
                </div>
            </div>
        </div>
    </div>
@endsection