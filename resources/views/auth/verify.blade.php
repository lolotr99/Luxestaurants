@extends('layouts.master')
@section('content')
    <div class="container-fluid text-secondary">
        <div class="row mt-5 mb-5 justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Verifica tu correo electrónico') }}</div>

                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('Se ha enviado un enlace de verificación a tu correo electrónico') }}
                            </div>
                        @endif

                        {{ __('Antes de continuar, revise su correo electrónico para obtener un enlace de verificación.') }}
                        {{ __('Si no has recibido el email') }},
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Haga clic aquí para solicitar otro') }}</button>.
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
