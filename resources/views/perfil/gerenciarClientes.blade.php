@extends('layouts.perfil')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 offset-md-1 col-12 mt-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/home">Perfil</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Gerenciar Clientes</a></li>
                    </ol>
                </nav>
            </div>
        </div>
        <p class="text-center display-4">Gerenciar Clientes</p>
        <p class="text-center display-6 text-secondary"> Cadastrar, editar e apagar clientes.</p>
        <div class="row">
            <div class=" rounded bg-light col-md-10 col-12 offset-md-1  perfJumbo material-shadow pb-4">
                <div class="row">
            @if(!$clientes->isEmpty())
                    <table class="table table-hover">
                        <tr class='bg-dark text-light text-center'>
                            <td>#</td>
                            <td>Nome</td>
                            <td>E-mail</td>
                            <td>CPF</td>
                            <td>Ações</td>
                        </tr>
                    @foreach($clientes as $cliente)
                        <tr class='text-center'>
                            <td>{{$cliente->id}}</td>
                            <td>{{$cliente->nome}}</td>
                            <td>{{$cliente->email}}</td>
                            <td>{{$cliente->cpf}}</td>
                            <td>
                                <button class="btn btn-primary" title="Editar Usuário"  onclick="formClienteAtt('{{$cliente->nome}}',
                                    '{{$cliente->email}}','{{$cliente->cpf}}','{{$cliente->rg}}','{{$cliente->telefone}}'
                                    ,'{{$cliente->endereco}}','{{$cliente->id}}')">
                                    <i class="fas fa-user-edit" ></i>
                                </button>
                                <button class="btn btn-danger" title="Excluir Usuário"  onClick="deleteCliente('{{$cliente->nome}}', '{{$cliente->id}}')">
                                    <i class="fas fa-user-times"></i>
                                </a>
                            </td>
                        </tr>
                    </div>
                @endforeach   
                    </table>
            @endif
                </div>
            </div>
            <div class='col-6 offset-5 mt-4 '>
                        {{$clientes->links()}}
            </div>
        </div>
    </div>
    <button class="btn btn-xg btn-primary rounded-circle sticky" data-toggle="modal" data-target="#modalCadastro"><i class="fas fa-plus"></i></button>
@endsection
@section('script')
<script>

 $(document).ready(function(){
    formCliente();
 });

 function deleteCliente(nome, id){
    $( "div#deleteModal" ).find( "#nome" ).html(nome);
    $( "div#deleteModal" ).find( "#idCliente" ).val(id);
    $('#deleteModal').modal('show');
}

function formClienteAtt(nome,email,cpf,rg,telefone,endereco,id){
 
 let form = "<form method='POST' action='/cliente/"+id+"' id='formCliente'>";
 form+='@csrf';
 form+='{{method_field("PUT")}}';
         form+="<div class='form-group'>";
             form+= "<div class='form-row'>";
                 form+="<div class='col'>";
                     form+="<label for='#nome'>Nome</label>";
                     form+="<input type='text' required='' value='"+nome+"' name='nome' id='nome' class='form-control'>";
                 form+="</div>";
             form+="</div>";
             form+= "<div class='form-row'>";
                 form+="<div class='col'>";
                     form+="<label for='#email'>E-mail</label>";
                     form+="<input type='email' required='' value='"+email+"' name='email' id='email' class='form-control'>";
                 form+="</div>";
             form+="</div>";
             form+= "<div class='form-row'>";
                 form+="<div class='col'>";
                     form+="<label for='#cpf'>CPF</label>";
                     form+="<input type='text' required='' value='"+cpf+"' name='cpf' id='cpf' class='form-control'>";
                 form+="</div>";
             form+="</div>";
             form+= "<div class='form-row'>";
                 form+="<div class='col'>";
                     form+="<label for='#rg'>RG</label>";
                     form+="<input type='text' required='' value='"+rg+"' name='rg' id='rg' class='form-control'>";
                 form+="</div>";
             form+="</div>";
             form+= "<div class='form-row'>";
                 form+="<div class='col'>";
                     form+="<label for='#telefone'>Telefone</label>";
                     form+="<input type='text' required='' value='"+telefone+"' name='telefone' id='telefone' class='form-control'>";
                 form+="</div>";
             form+="</div>";
             form+= "<div class='form-row'>";
                 form+="<div class='col'>";
                     form+="<label for='#endereco'>Endereço</label>";
                     form+="<input type='text' required='' name='endereco' value='"+endereco+"' id='endereco' class='form-control'>";
                 form+="</div>";
             form+="</div>";
             form+="<div class='form-row'>";
                 form+="<button type='submit' class='btn btn-primary btn-block mt-4'>Salvar</button>";
             form+="</div>";
         form+="</div>";
     form+="</form>";	
 $( "div#modalCadastro" ).find( ".modal-title" ).html('Atualizar Cliente');
 $( "div#modalCadastro" ).find( ".modal-body" ).html(form);    
 $('#modalCadastro').modal('show');        
}


function formCliente(){
 
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
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="voltarMenu()">fechar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- modal deletar -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                   <h5 class="modal-title" id="exampleModalLabel">Excluir</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Tem certeza que deseja apagar o cliente: <strong id='nome'></strong>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <form action="/cliente/{$id}" method="POST">
                            @csrf
                            {{method_field('DELETE')}}
                            <input type="hidden" name="id" id='idCliente'>
                            <button type="submit" class="btn btn-danger">Apagar</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
@endsection