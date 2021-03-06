@extends('layouts.master')
@section('content')
    <div class="container text-secondary">
        <div class="row">
            @include('flash::message')
        </div>
        <div class="row">
            <section class="col-sm-9 text-justify pt-5">
                <div class="row">
                    <h1 class="text-title">Así empezó</h1>
                </div>
                <div class="row">
                    <p>Luxestaurantes ofrece desde 2020 un servicio de restauración exclusivo, con el único objetivo de responder a altos estándares de calidad.
                        La carta de Luxestaurants abarca una amplia gama de platos, cuyos ingredientes proceden de lugares exóticos de diversos países del mundo.
                        Nuestros cocineros poseen altas cualidades para preparar todos y cada uno de nuestros platos. ¡Disfruta de la experiencia en Luxestaurants!</p>
                </div>
            </section>
            <aside class="col-sm-3 pt-5">
                <div class="row ml-3 mt-3">
                    <img class="" src="img/logo1.png">
                </div>
            </aside>
        </div>

        <section class="mb-4">

            <h2 class="h1-responsive text-title text-center my-4">Estamos disponibles para escucharte</h2>
            <p class="text-center w-responsive mx-auto mb-5">
                Cualquier opinión, duda o sugerencia que desees hacernos, somos todo oídos. Puedes realizar tus consultas a través del siguiente formulario, te atenderemos a la mayor brevedad.
            </p>

            <div class="row">
                <div class="col-md-12 mb-md-0 mb-5">
                    <form class="form" action="{{url('/contacto')}}" method="post">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="md-form mb-0">
                                    <label for="nombre">Nombre *</label>
                                    <input type="text" id="nombre" required name="nombre" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="md-form mb-0">
                                    <label for="apellidos">Apellidos *</label>
                                    <input type="text" id="apellidos" required name="apellidos" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="md-form mb-0">
                                    <label for="email">Email *</label>
                                    <input type="email" id="email" required name="email" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="md-form mb-0">
                                    <label for="phone">Telefono *</label>
                                    <input type="tel" id="phone" required  maxlength="9" name="phone" pattern='[0-9]{9}' class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="md-form mb-0">
                                    <label for="subject">Asunto *</label>
                                    <input type="text" id="subject" required maxlength="350" name="subject" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="md-form">
                                    <label for="message">Mensaje *</label>
                                    <textarea type="text" id="message" required name="message" rows="2" class="form-control md-textarea"></textarea>
                                </div>

                            </div>
                        </div>
                        <div class="text-center text-md-left mt-3">
                            <input class="btn btn-secundary" type="submit" value="Enviar">
                        </div>
                    </form>
                </div>
            </div>
        </section>
</div>
@endsection
