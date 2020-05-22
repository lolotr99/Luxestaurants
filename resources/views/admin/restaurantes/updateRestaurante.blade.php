@extends('layouts.master')
@section('content')
    <div class="container text-secondary">
        <div class="card mx-auto my-5">
            <div class="card-header">
                <h2>Editar Restaurante</h2>
            </div>
            <div class="card-body mt-3">
                <form action="{{url('/postUpdateRestaurante')}}" method="post">
                    {{csrf_field()}}
                    <input type="hidden" value="{{$restaurante->id}}" name="ocultoId" id="ocultoId">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="ciudad">Ciudad</label>
                            <select name="ciudad" id="ciudad" class="form-control" size="1">
                                <option value='A Coruña' {{ ("A Coruña" == $restaurante->ciudad ? "selected":"") }}>A Coruña</option>
                                <option value='Álava' {{ ("Álava" == $restaurante->ciudad ? "selected":"") }}> Álava</option>
                                <option value='Albacete' {{ ("Albacete" == $restaurante->ciudad ? "selected":"") }}>Albacete</option>
                                <option value='Alicante' {{ ("Alicante" == $restaurante->ciudad ? "selected":"") }}>Alicante</option>
                                <option value='Almería' {{ ("Almería" == $restaurante->ciudad ? "selected":"") }}>Almería</option>
                                <option value='Asturias' {{ ("Asturias" == $restaurante->ciudad ? "selected":"") }}>Asturias</option>
                                <option value='Ávila' {{ ("Ávila" == $restaurante->ciudad ? "selected":"") }}>Ávila</option>
                                <option value='Badajoz' {{ ("Badajoz" == $restaurante->ciudad ? "selected":"") }}>Badajoz</option>
                                <option value='Barcelona' {{ ("Barcelona" == $restaurante->ciudad ? "selected":"") }}>Barcelona</option>
                                <option value='Burgos' {{ ("Burgos" == $restaurante->ciudad ? "selected":"") }}>Burgos</option>
                                <option value='Cáceres' {{ ("Cáceres" == $restaurante->ciudad ? "selected":"") }}>Cáceres</option>
                                <option value='Cádiz' {{ ("Cádiz" == $restaurante->ciudad ? "selected":"") }}>Cádiz</option>
                                <option value='Cantabria' {{ ("Cantabria" == $restaurante->ciudad ? "selected":"") }}>Cantabria</option>
                                <option value='Castellón' {{ ("Castellón" == $restaurante->ciudad ? "selected":"") }}>Castellón</option>
                                <option value='Ceuta' {{ ("Ceuta" == $restaurante->ciudad ? "selected":"") }}>Ceuta</option>
                                <option value='Ciudad Real' {{ ("Ciudad Real" == $restaurante->ciudad ? "selected":"") }}>Ciudad Real</option>
                                <option value='Córdoba' {{ ("Córdoba" == $restaurante->ciudad ? "selected":"") }}>Córdoba</option>
                                <option value='Cuenca' {{ ("Cuenca" == $restaurante->ciudad ? "selected":"") }}>Cuenca</option>
                                <option value='Girona' {{ ("Girona" == $restaurante->ciudad ? "selected":"") }}>Girona</option>
                                <option value='Las Palmas' {{ ("Las Palmas" == $restaurante->ciudad ? "selected":"") }}>Las Palmas</option>
                                <option value='Granada' {{ ("Granada" == $restaurante->ciudad ? "selected":"") }}>Granada</option>
                                <option value='Guadalajara' {{ ("Guadalajara" == $restaurante->ciudad ? "selected":"") }}>Guadalajara</option>
                                <option value='Guipúzcoa' {{ ("Guipúzcoa" == $restaurante->ciudad ? "selected":"") }}>Guipúzcoa</option>
                                <option value='Huelva' {{ ("Huelva" == $restaurante->ciudad ? "selected":"") }}>Huelva</option>
                                <option value='Huesca' {{ ("Huesca" == $restaurante->ciudad ? "selected":"") }}>Huesca</option>
                                <option value='Jaén' {{ ("Jaén" == $restaurante->ciudad ? "selected":"") }}>Jaén</option>
                                <option value='La Rioja' {{ ("La Rioja" == $restaurante->ciudad ? "selected":"") }}>La Rioja</option>
                                <option value='León' {{ ("León" == $restaurante->ciudad ? "selected":"") }}>León</option>
                                <option value='Lleida' {{ ("Lleida" == $restaurante->ciudad ? "selected":"") }}>Lleida</option>
                                <option value='Lugo' {{ ("Lugo" == $restaurante->ciudad ? "selected":"") }}>Lugo</option>
                                <option value='Madrid' {{ ("Madrid" == $restaurante->ciudad ? "selected":"") }}>Madrid</option>
                                <option value='Málaga' {{ ("Málaga" == $restaurante->ciudad ? "selected":"") }}>Málaga</option>
                                <option value='Mallorca' {{ ("Mallorca" == $restaurante->ciudad ? "selected":"") }}>Mallorca</option>
                                <option value='Melilla' {{ ("Melilla" == $restaurante->ciudad ? "selected":"") }}>Melilla</option>
                                <option value='Murcia' {{ ("Murcia" == $restaurante->ciudad ? "selected":"") }}>Murcia</option>
                                <option value='Navarra' {{ ("Navarra" == $restaurante->ciudad ? "selected":"") }}>Navarra</option>
                                <option value='Orense' {{ ("Orense" == $restaurante->ciudad ? "selected":"") }}>Orense</option>
                                <option value='Palencia' {{ ("Palencia" == $restaurante->ciudad ? "selected":"") }}>Palencia</option>
                                <option value='Pontevedra' {{ ("Pontevedra" == $restaurante->ciudad ? "selected":"") }}>Pontevedra</option>
                                <option value='Salamanca' {{ ("Salamanca" == $restaurante->ciudad ? "selected":"") }}>Salamanca</option>
                                <option value='Segovia' {{ ("Segovia" == $restaurante->ciudad ? "selected":"") }}>Segovia</option>
                                <option value='Sevilla' {{ ("Sevilla" == $restaurante->ciudad ? "selected":"") }}>Sevilla</option>
                                <option value='Soria' {{ ("Soria" == $restaurante->ciudad ? "selected":"") }}>Soria</option>
                                <option value='Tarragona' {{ ("Tarragona" == $restaurante->ciudad ? "selected":"") }}>Tarragona</option>
                                <option value='Tenerife' {{ ("Tenerife" == $restaurante->ciudad ? "selected":"") }}>Tenerife</option>
                                <option value='Teruel' {{ ("Teruel" == $restaurante->ciudad ? "selected":"") }}>Teruel</option>
                                <option value='Toledo' {{ ("Toledo" == $restaurante->ciudad ? "selected":"") }}>Toledo</option>
                                <option value='Valencia' {{ ("Valencia" == $restaurante->ciudad ? "selected":"") }}>Valencia</option>
                                <option value='Valladolid' {{ ("Valladolid" == $restaurante->ciudad ? "selected":"") }}>Valladolid</option>
                                <option value='Vizcaya' {{ ("Vizcaya" == $restaurante->ciudad ? "selected":"") }}>Vizcaya</option>
                                <option value='Zamora' {{ ("Zamora" == $restaurante->ciudad ? "selected":"") }}>Zamora</option>
                                <option value='Zaragoza' {{ ("Zaragoza" == $restaurante->ciudad ? "selected":"") }}>Zaragoza</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="zona">Zona</label>
                            <input type="text" name="zona" value="{{$restaurante->zona}}" class="form-control" required id="zona">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="numeromesas">Nº de mesas</label>
                            <input type="number" class="form-control" value="{{$restaurante->numeromesas}}" id="numeromesas" name="numeromesas">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="telefono">Nº de Teléfono</label>
                            <input type="tel" name="telefono" value="{{$restaurante->telefono}}" class="form-control" required id="telefono">
                        </div>
                    </div>
                    <div class="form-row">
                            <label for="mapa">Elige nueva ubicación del restaurante</label>
                            <input type="text" id="mapa" name="mapa" class="form-control">

                            <div style="width: 100%">
                                <iframe id="updateMapa" class="mt-3" width="785" height="400" src="{{$restaurante->mapa}}" frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
                                    <a href="https://www.mapsdirections.info/marcar-radio-circulo-mapa/">Calculadora de radio del mapa</a>
                                </iframe>
                            </div>
                        <input type="hidden" id="mapaOriginal" value="{{$restaurante->mapa}}">
                        <input type="hidden" id="direccion" name="direccion" value="{{$restaurante->mapa}}">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Guardar Restaurante</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection