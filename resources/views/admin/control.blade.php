@extends('layouts.master')
@section('content')
<div class="container text-secondary">
    <div class="row mt-5 mb-3">
        <div class="text-title">
            <span><i class="fas fa-users"></i> Usuarios</span>
        </div>
    </div>
    <div class="row mt-5 mb-5">
        <div class="card-deck">
             <div class="card bg-dark hoverEffect">
                 <a class="enlacesSinEstilo text-secondary" href="{{url('/selectUsers')}}">
                    <div class="card-body text-center">
                        <p class="text-secondary">Ver todos los usuarios</p>
                    </div>
                 </a>
             </div>
            <div class="card bg-success hoverEffect">
                <a class="enlacesSinEstilo text-secondary" href="{{url('/newUser')}}">
                    <div class="card-body text-center">
                        <p class="text-secondary">Crear un nuevo usuario</p>
                    </div>
                </a>
            </div>
            <div class="card bg-warning hoverEffect">
                <a class="enlacesSinEstilo text-secondary" href="{{url('/updateUser')}}">
                    <div class="card-body text-center">
                        <p class="text-secondary">Editar un usuario</p>
                    </div>
                </a>
            </div>
            <div class="card bg-danger hoverEffect">
                <a class="enlacesSinEstilo text-secondary" href="{{url('/deleteUser')}}">
                    <div class="card-body text-center">
                        <p class="text-secondary">Eliminar un usuario</p>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <div class="row mt-5 mb-3">
        <div class="text-title">
            <span><i class="fas fa-utensils"></i> Restaurantes</span>
        </div>
    </div>
    <div class="row mt-5 mb-5">
        <div class="card-deck">
            <div class="card bg-dark hoverEffect">
                <a class="enlacesSinEstilo text-secondary" href="{{url('/selectRestaurantes')}}">
                    <div class="card-body text-center">
                        <p class="text-secondary">Ver todos los restaurantes</p>
                    </div>
                </a>
            </div>
            <div class="card bg-success hoverEffect">
                <a class="enlacesSinEstilo text-secondary" href="{{url('/newRestaurante')}}">
                    <div class="card-body text-center">
                        <p class="text-secondary">Crear un nuevo restaurante</p>
                    </div>
                </a>
            </div>
            <div class="card bg-warning hoverEffect">
                <a class="enlacesSinEstilo text-secondary" href="{{url('/updateRestaurante')}}">
                    <div class="card-body text-center">
                        <p class="text-secondary">Editar un restaurante</p>
                    </div>
                </a>
            </div>
            <div class="card bg-danger hoverEffect">
                <a class="enlacesSinEstilo text-secondary" href="{{url('/deleteRestaurante')}}">
                    <div class="card-body text-center">
                        <p class="text-secondary">Eliminar un restaurante</p>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <div class="row mt-5 mb-3">
        <div class="text-title">
            <span><i class="fas fa-pizza-slice"></i> Platos</span>
        </div>
    </div>
    <div class="row mt-5 mb-5">
        <div class="card-deck">
            <div class="card bg-dark hoverEffect">
                <a class="enlacesSinEstilo text-secondary" href="{{url('/selectPlatos')}}">
                    <div class="card-body text-center">
                        <p class="text-secondary">Ver todos los platos</p>
                    </div>
                </a>
            </div>
            <div class="card bg-success hoverEffect">
                <a class="enlacesSinEstilo text-secondary" href="{{url('/newPlato')}}">
                    <div class="card-body text-center">
                        <p class="text-secondary">Crear un nuevo plato</p>
                    </div>
                </a>
            </div>
            <div class="card bg-warning hoverEffect">
                <a class="enlacesSinEstilo text-secondary" href="{{url('/updatePlato')}}">
                    <div class="card-body text-center">
                        <p class="text-secondary">Editar un plato</p>
                    </div>
                </a>
            </div>
            <div class="card bg-danger hoverEffect">
                <a class="enlacesSinEstilo text-secondary" href="{{url('/deletePlato')}}">
                    <div class="card-body text-center">
                        <p class="text-secondary">Eliminar un plato</p>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <div class="row mt-5 mb-3">
        <div class="text-title">
            <span><i class="fas fa-sticky-note"></i> Reservas</span>
        </div>
    </div>
    <div class="row mt-5 mb-5">
        <div class="card-deck">
            <div class="card bg-dark hoverEffect">
                <a class="enlacesSinEstilo text-secondary" href="{{url('/selectReservas')}}">
                    <div class="card-body text-center">
                        <p class="text-secondary">Ver todas las reservas</p>
                    </div>
                </a>
            </div>
            <div class="card bg-success hoverEffect">
                <a class="enlacesSinEstilo text-secondary" href="{{url('/newReserva')}}">
                    <div class="card-body text-center">
                        <p class="text-secondary">Hacer una nueva reserva</p>
                    </div>
                </a>
            </div>
            <div class="card bg-warning hoverEffect">
                <a class="enlacesSinEstilo text-secondary" href="{{url('/updateReserva')}}">
                    <div class="card-body text-center">
                        <p class="text-secondary">Editar una reserva</p>
                    </div>
                </a>
            </div>
            <div class="card bg-danger hoverEffect">
                <a class="enlacesSinEstilo text-secondary" href="{{url('/deleteReserva')}}">
                    <div class="card-body text-center">
                        <p class="text-secondary">Eliminar una reserva</p>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <div class="row mt-5 mb-3">
        <div class="text-title">
            <span><i class="fas fa-star"></i> Valoraciones</span>
        </div>
    </div>
    <div class="row mt-5 mb-5">
        <div class="card-deck">
            <div class="card bg-dark hoverEffect">
                <a class="enlacesSinEstilo text-secondary" href="{{url('/selectValoraciones')}}">
                    <div class="card-body text-center">
                        <p class="text-secondary">Ver todas las valoraciones</p>
                    </div>
                </a>
            </div>
            <div class="card bg-success hoverEffect">
                <a class="enlacesSinEstilo text-secondary" href="{{url('/newValoracion')}}">
                    <div class="card-body text-center">
                        <p class="text-secondary">Hacer una nueva valoración</p>
                    </div>
                </a>
            </div>
            <div class="card bg-warning hoverEffect">
                <a class="enlacesSinEstilo text-secondary" href="{{url('/updateValoracion')}}">
                    <div class="card-body text-center">
                        <p class="text-secondary">Editar una valoración</p>
                    </div>
                </a>
            </div>
            <div class="card bg-danger hoverEffect">
                <a class="enlacesSinEstilo text-secondary" href="{{url('/deleteValoracion')}}">
                    <div class="card-body text-center">
                        <p class="text-secondary">Eliminar una valoración</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection