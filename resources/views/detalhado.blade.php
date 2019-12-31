@extends('layouts.app')
@section('content')
    <div class="container">
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
                                <p class="card-text">Capacidade: <strong>{{$imovel->capacidade}}</strong></p>
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
            <div class="card  mt-4 col-8 " >
                <h5 class="display-6 card-title">Descrição do Imóvel</h5>
                <hr  class="mt-2negativo">
                <div class="text-secondary">{!! nl2br($imovel->descricao) !!}</div>
            </div>
        </div>
        <!-- tela pequena -->
        <div class="row mt-2">
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
                                <p class="card-text">Capacidade: <strong>{{$imovel->capacidade}}</strong></p>
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
    </div>
    <footer class="bg-dark font-weight-light text-center container-fluid" style='padding: 10px'>
        <small style="color: white"> Entre em contato e faça sua reserva! <br> Tel: 99999-9999 | Email: contato@espaco10.com
            <br>Made by: @lucas.FB <br>
            <a href="/login">login</a></small>
    </footer>
@endsection
@section('script')
<script>
    

    
</script>

@endsection()