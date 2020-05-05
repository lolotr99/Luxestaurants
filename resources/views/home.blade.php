@extends('layouts.master')
@section('content')
    <div class="container-fluid">
    <section class="row ">
        <div class="col p-0">
            <div id="carouselExampleIndicators" class="carousel slide " data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>

                </ol>
                <div class="carousel-inner p-0 h-100">
                    <div class="carousel-item active  p-0 h-100">
                        <img class="d-block w-100" src="img/mantel4.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item p-0">
                       <img class="d-block w-100" src="img/mantel4.jpg" alt="Second slide">
                    </div>

                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

        </div>
    </section>
    <hr>
    <section class="row">
        <div class="col-sm-7">
            <h3 aria-hidden="true" class="font-weight-bold">SÍGUENOS EN NUESTRAS</h3>
            <h1>REDES SOCIALES</h1>
            <p>¿Quieres ser el primero en conocer todas las novedades y estar informado sobre nosotros?  ¡Pues dale a seguir y forma parte de la comunidad Luxestaurants!</p>
        </div>
        <div class="col-sm-5 mt-5 text-center">
            <div class="row">
                <div class="col-sm-4 border-right">
                    <h2>Facebook</h2>
                    <img src="img/icons8-facebook-rodeado-de-círculo-48.png" alt="facebook"><br>
                    <a href="https://www.facebook.com" target="_blank" class="btn btn-primary mt-2" >SEGUIR</a>
                </div>
                <div class="col-sm-4 border-right">
                    <h2>Instagram</h2>
                    <img src="img/icons8-instagram-48.png" alt="instagram"><br>
                    <a href="https://www.instagram.com" target="_blank" class="btn btn-primary mt-2" >SEGUIR</a>
                </div>
                <div class="col-sm-4">
                    <h2>Twitter</h2>
                    <img src="img/icons8-twitter-48.png" alt="twitter"><br>
                    <a href="https://www.twitter.com" target="_blank" class="btn btn-primary mt-2" >SEGUIR</a>
                </div>
            </div>
        </div>
    </section>
    <hr>


    <a class="estiloEnlaces" href="#">
        <section class="row"  style="background-image: url('img/mantel4.jpg');">
            <div class=" col-sm-12 text-center pt-5 text-center">
                <h1 style="color: #2E1E1F;">Descubre más sobre nosotros</h1>
            </div>
        </section>
    </a>
    </div>
@endsection