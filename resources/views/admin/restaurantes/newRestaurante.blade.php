@extends('layouts.master')
@section('content')
    <div class="container text-secondary">
        <div class="card mx-auto my-5">
            <div class="card-header">
                <h2>Nuevo Restaurante</h2>
            </div>
            <div class="card-body mt-3">
                <form action="{{url('/postNewRestaurante')}}" method="post">
                    {{csrf_field()}}
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="ciudad">Ciudad</label>
                            <select name="ciudad" id="ciudad" class="form-control" size="1">
                                <option value='A Coruña'>A Coruña</option>
                                <option value='Álava'> Álava</option>
                                <option value='Albacete'>Albacete</option>
                                <option value='Alicante'>Alicante</option>
                                <option value='Almería'>Almería</option>
                                <option value='Asturias'>Asturias</option>
                                <option value='Ávila'>Ávila</option>
                                <option value='Badajoz'>Badajoz</option>
                                <option value='Barcelona'>Barcelona</option>
                                <option value='Burgos'>Burgos</option>
                                <option value='Cáceres'>Cáceres</option>
                                <option value='Cádiz'>Cádiz</option>
                                <option value='Cantabria'>Cantabria</option>
                                <option value='Castellón' >Castellón</option>
                                <option value='Ceuta'>Ceuta</option>
                                <option value='Ciudad Real'>Ciudad Real</option>
                                <option value='Córdoba'>Córdoba</option>
                                <option value='Cuenca'>Cuenca</option>
                                <option value='Girona' >Girona</option>
                                <option value='Las Palmas'>Las Palmas</option>
                                <option value='Granada'>Granada</option>
                                <option value='Guadalajara'>Guadalajara</option>
                                <option value='Guipúzcoa'>Guipúzcoa</option>
                                <option value='Huelva' >Huelva</option>
                                <option value='Huesca' >Huesca</option>
                                <option value='Jaén'>Jaén</option>
                                <option value='La Rioja'>La Rioja</option>
                                <option value='León' >León</option>
                                <option value='Lleida'>Lleida</option>
                                <option value='Lugo' >Lugo</option>
                                <option value='Madrid' >Madrid</option>
                                <option value='Málaga' >Málaga</option>
                                <option value='Mallorca' >Mallorca</option>
                                <option value='Melilla' >Melilla</option>
                                <option value='Murcia' >Murcia</option>
                                <option value='Navarra' >Navarra</option>
                                <option value='Orense' >Orense</option>
                                <option value='Palencia' >Palencia</option>
                                <option value='Pontevedra' >Pontevedra</option>
                                <option value='Salamanca' >Salamanca</option>
                                <option value='Segovia' >Segovia</option>
                                <option value='Sevilla' >Sevilla</option>
                                <option value='Soria' >Soria</option>
                                <option value='Tarragona' >Tarragona</option>
                                <option value='Tenerife' >Tenerife</option>
                                <option value='Teruel' >Teruel</option>
                                <option value='Toledo'>Toledo</option>
                                <option value='Valencia' >Valencia</option>
                                <option value='Valladolid' >Valladolid</option>
                                <option value='Vizcaya'>Vizcaya</option>
                                <option value='Zamora' >Zamora</option>
                                <option value='Zaragoza'>Zaragoza</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="zona">Zona</label>
                            <input type="text" name="zona" class="form-control" required id="zona">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="numeromesas">Nº de mesas</label>
                            <input type="number" class="form-control"  id="numeromesas" name="numeromesas">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="telefono">Nº de Teléfono</label>
                            <input type="tel" name="telefono" class="form-control" required id="telefono">
                        </div>
                    </div>
                    <div class="form-row">
                        <label for="mapa">Elige nueva ubicación del restaurante</label>
                        <input type="text" id="newMapa" name="newMapa" class="form-control">

                        <div style="width: 100%">
                            <iframe id="createMapa" class="mt-3" width="785" height="400" src="https://maps.google.com/maps?width=100%&height=600&hl=es&q=Madrid&ie=UTF8&t=&z=13&iwloc=A&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
                                <a href="https://www.mapsdirections.info/marcar-radio-circulo-mapa/">Calculadora de radio del mapa</a>
                            </iframe>
                        </div>
                        <input type="hidden" id="direccionMapa" name="direccionMapa" value="https://maps.google.com/maps?width=100%&height=600&hl=es&q=Madrid&ie=UTF8&t=&z=13&iwloc=A&output=embed">

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Guardar Restaurante</button>
                        <a class="btn btn-secundary" href="{{url('/control')}}">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
