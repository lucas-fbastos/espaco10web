@extends('layouts.app')

@section('content')

<div class="container-fluid ">
   <div class="row">
       <div id="slides" class="carousel slide col-12 p-0" data-ride="carousel">
           <div class="carousel-inner">
               <div class="carousel-item active item" 
                    style="background-image:url('{{ URL::to(`/`) }}/imgs/bg2.jpg')">  
                </div>

                <div class="carousel-item item"
                     style="background-image: url('{{ URL::to(`/`) }}/imgs/bg.jpg')">
                </div>       
            </div>
        </div>
        <div id="overlay">
            <h4 class="display-4 text-center titleX text-light title-overlay text-blend">
                Espaço 10
            </h4>
            <p class=" text-center title-overlay text-blend text-light titleP">
                Temporada Brasília / Caldas Novas
            </p>
        </div>
    </div>
    <div class="row">
       
        <div class=" col-12 col-md-8 offset-md-2">
            <div class="container">
                <h1 class="h1 text-center"> 
                    <i class="fas fa-search mt-5"></i>   
                    Confira aqui nossas acomodações!
                </h1>
                <p class="lead mt-3">
                    Possuímos imóveis na cidade de Caldas Novas (GO) e também em Brasília (DF). Nossos imóveis
                    contam com acesso a internet e sinal de tv inclusos - confira maiores detalhes abaixo. 
                </p>
                <small>Imóveis disponíveis para a modalidade de temporada</small>
            </div>
        </div>
        <hr>
    </div>
</div>
<div class="container mt-5">
    <div class="row ">
        <?php $i = 0;?>
        @foreach($imoveis as $imovel)
            <?php $i++; ?>
            <div class="col-12 mb-4" >
                <a class="linkA" href="/{{$imovel->id}}">
                    <div class="card  anuncioC cardSombra">
                        <div class="row">
                            <div class=" col-12 col-md-8">
                                <div  class="carousel slide h-100 w-100" id="carousel{{$i}}" data-ride="carousel">
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
                            </div>
                            <div class="d-none d-sm-block col-4">
                                <div class="card-body ">
                                    <p class=" card-title titleP text-center">
                                        <strong>{{$imovel->titulo}}</strong>
                                        <hr>
                                    </p>
                                    <div class=" mx-auto text-center">
                                        @if($imovel->status == "Livre")
                                            <span class="badge badge-primary text-capitalize ">Livre</span>
                                        @else
                                            <span class="badge badge-warning text-capitalize ">Ocupado</span> 
                                        @endif
                                        @if($imovel->capacidade != "")
                                            <span class="badge badge-primary text-capitalize">{{$imovel->capacidade}}&nbsp;Pessoa(s)</span>
                                        @endif
                                        @if($imovel->piscina ==1)
                                            <span class="badge badge-primary">Piscina</span>
                                        @endif
                                        @if($imovel->cobertura ==1)
                                            <span class="badge badge-primary">Cobertura</span>
                                        @endif
                                        @if($imovel->portaria ==1)
                                            <span class="badge badge-primary">Portaria</span>
                                        @endif
                                        @if($imovel->areaLazer ==1)
                                            <span class="badge badge-primary">Área de Lazer</span>
                                        @endif
                                    </div>
                                    <p class="card-text mt-4 text-degrade">
                                        {{substr($imovel->descricao,0,150)}}
                                        @if(strlen($imovel->descricao) > 150)
                                            ... 
                                        @endif
                                    </p>
                                    <a href="/{{$imovel->id}}">Mostrar mais</a> 
                                </div>
                            </div>
                            <div class="d-block d-sm-none">
                                    <div class="card-body ">
                                        <p class=" card-title titleP text-center">
                                            <strong>{{$imovel->titulo}}</strong>
                                            <hr>
                                        </p>
                                    <div class=" mx-auto text-center">
                                        @if($imovel->status == "1")
                                            <span class="badge badge-primary text-capitalize ">Livre</span>
                                        @else
                                            <span class="badge badge-warning text-capitalize ">Ocupado</span> 
                                        @endif
                                        @if($imovel->capacidade != "")
                                            <span class="badge badge-primary text-capitalize">{{$imovel->capacidade}}&nbsp;Pessoa(s)</span>
                                        @endif
                                        @if($imovel->piscina ==1)
                                            <span class="badge badge-primary">Piscina</span>
                                        @endif
                                        @if($imovel->cobertura ==1)
                                            <span class="badge badge-primary">Cobertura</span>
                                        @endif
                                        @if($imovel->portaria ==1)
                                            <span class="badge badge-primary">Portaria</span>
                                        @endif
                                        @if($imovel->areaLazer ==1)
                                            <span class="badge badge-primary">Área de Lazer</span>
                                        @endif
                                    </div>
                                        <p class="card-text mt-4 text-degrade">
                                            {{substr($imovel->descricao,0,100)}}
                                            @if(strlen($imovel->descricao) > 100)
                                                ... 
                                            @endif
                                        </p>
                                    <a href="/{{$imovel->id}}">Mostrar mais</a> 
                                    </div>
                               
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
        <div class="col-6 offset-3">
            {{$imoveis->links()}}
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-8 offset-2">
            <h1 class="h1 text-center"> 
                Entre em Contato!
            </h1>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row m-3 shadow-4">
        <div class=" col-12 col-md-3 col-lg-3 card d-none d-sm-none d-md-flex m-0">
            <img class="card-img-top mt-4" src="{{ URL::to(`/`) }}/imgs/phone-new-message.png" style="height: 50%" alt="Card image">
            <div class="card-body">
                    <h6 class="card-title mt-4">
                            <i class="fas fa-phone"></i>
                            (99) 9 9999-9999  
                    </h6> 
                    <h6 class="card-text">
                            <i class="far fa-envelope"></i>
                            contato@espaco10.com 
                    </h6>
            </div>
        </div>
        <div class=" col-12 col-md-3 col-lg-3 card d-xs-flex d-sm-flex d-md-none card-sm m-0">
            <div class="container py-1">
                <div class="row mt-3">
                    <div class="col-6 offset-3">
                        <img class="card-img-top" src="{{ URL::to(`/`) }}/imgs/phone-new-message.png"  style="height: 100%" alt="Card image">
                    </div>
                    <div class="col-12 text-center ">
                        <p class="card-title">
                                <p class="card-title mt-4">
                                        <i class="fas fa-phone"></i>
                                        (99) 9 9999-9999  
                                </P> 
                                <P class="card-text">
                                        <i class="far fa-envelope"></i>
                                        contato@espaco10.com 
                                </P>
                        </p> 
                    </div>    
                </div>
            </div>    
        </div>
        <article class="col-12 col-sm-12 col-lg-9 col-md-9 mt-4 ">
            <p>
                <span class="text-marker letra">L</span>orem ipsum dolor sit amet, consectetur 
                adipiscing elit. Proin elementum odio a quam condimentum, non dignissim tellus 
                dignissim. Suspendisse dapibus lectus at risus feugiat, scelerisque finibus mauris
                imperdiet. Suspendisse et hendrerit felis. Phasellus sed gravida felis. Interdum et
                malesuada fames ac ante ipsum primis in faucibus. Proin faucibus enim vitae nulla 
                rutrum congue. Quisque lobortis metus metus.
            </p>
            <p>
                Donec at dictum nibh. Nulla est neque, finibus quis tellus scelerisque, placerat luctus
                urna. Donec id turpis nec orci facilisis auctor sed sed mi. Fusce quis elit tincidunt, 
                ornare diam eu, porta lacus. Sed non volutpat lectus. Nam pellentesque lorem eu nibh 
                vulputate hendrerit. Curabitur sed facilisis nisl. Morbi vel elit tempus, malesuada 
                nunc nec, aliquet purus. Quisque enim risus, mattis gravida dignissim id, fringilla 
                eget leo. Nullam et nisi in diam lacinia hendrerit. Etiam nunc lacus, euismod ut 
                posuere id, sollicitudin eget elit. Morbi augue turpis, varius euismod ipsum mollis, 
                fringilla euismod risus.
            </p>
        </article>
    </div>
</div>
<a href="https://api.whatsapp.com/send?phone=556192991626&text=Ol%C3%A1%20vi%20o%20anuncio%20pelo%20site%20e%20gostaria%20de%20agendar%20uma%20data%21" class="float" target="_blank">
    <i class="fab fa-whatsapp my-float"></i>
</a>
<div class="container-fluid mt-5  bg-dark">
        <div class="row ">
            <div class="social-media mx-auto">
                <a class=" text-secondary icons-text"  href="#">
                        <i class=" icon fab fa-facebook-f"></i>
                </a>
                <a class="  text-secondary icons-text"  href="#">
                        <i class=" icon fab fa-whatsapp"></i>
                </a>
                <a class=" text-secondary icons-text"  href="#">
                        <i class=" icon fab fa-instagram"></i>
                </a>
            </div>
        </div>
        <div class="row pb-3">
            <div class="mx-auto">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-lg btn-outline-light">Contato</button>
                    <button type="button" class="btn btn-lg btn-outline-light">Imóveis</button>
                    <button type="button" class="btn btn-lg btn-outline-light">Sobre</button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-center">
                <small class="text-secondary">Brasília DF - <?php echo date("Y"); ?></small>
                <br>
                <small class="text-secondary">Desenvolvido por: Lucas FB</small>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script type="text/javascript">

    $('.cardSombra').mouseover(function() {
        $(this).removeClass('animated reduce');
        $(this).addClass('animated grow shadow-lg '); 
     }); 
     $('.cardSombra').mouseout(function() {
         $(this).removeClass('animated shadow ');
      $(this).addClass('animated reduce  ');
     });
    $('.cardSombra').blur(
       function(){ $(this).removeClass('shadow '); }
     );
    $(document).on('click', 'body .dropdown-menu', function (e) {
        e.stopPropagation();
    });
    $('#errorSpan').click(function () {
        $(this).toggle();
    });
    $( document ).ready(function() {
        $('#home-bttn').addClass('active');
    });
    $('#btnNav').click(function(){
        $('#imagemNav').toggleClass('imageNavActive');
        
    });
   var $w = $(window);
   
   

$w.on("scroll", function(){
   if( $w.scrollTop() > 300 ) {
      $('#anuncios').addClass('animated bounce');
   }
});
</script>
@endsection
