@extends('layouts.master')
@section('content')
    <h1 class="text-title">Admin Code Error 400</h1>
    <p class="zoom-area text-secondary">No se puede acceder si no eres administrador</p>
    <section class="error-container">
        <span class="four"><span class="screen-reader-text number"></span></span>
        <span class="zero"><span class="screen-reader-text">0</span></span>
        <span class="zero"><span class="screen-reader-text">0</span></span>
    </section>
    <div class="link-container mb-3">
        <a class="more-link btn-primary" href="{{url('/')}}">Volver a la página principal</a>
    </div>
@endsection