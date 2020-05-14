@extends('layouts.master')
@section('content')
    <div class="container text-secondary">
        <div class="row">
            @include('flash::message')
        </div>
        <div class="row">
            <section class="col-sm-9 text-justify pt-5">
                <div class="row">
                    <h1 class="text-title">Asi empezo</h1>
                </div>
                <div class="row">
                    <p>Aquí va el texto descriptivo de la empresa </p>
                </div>
            </section>
            <aside class="col-sm-3 pt-5">
                <div class="row">
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
                                    <input type="text" id="phone" required name="phone" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="md-form mb-0">
                                    <label for="subject">Asunto *</label>
                                    <input type="text" id="subject" required name="subject" class="form-control">
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