@extends('layouts.master')
@section('content')
    <div class="container text-secondary">
        <div class="row mt-5 mb-5">
            <div class="col-md-6 mx-auto text-center">
                <div class="card mt-5">
                    <h1 class="text-title">¡¡LO SENTIMOS!! </h1>
                    <h2>Actualmente no podemos habilitarte un sitio en nuestro restaurante porque estamos llenos. Inténtalo en otro momento</h2>
                    <div class="card-body">
                        <a href="{{url('/')}}" class="btn btn-primary btn-lg"><i class="fa fa-home"></i>Volver al inicio</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
