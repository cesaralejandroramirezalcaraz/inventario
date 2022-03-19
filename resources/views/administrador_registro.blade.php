@extends('plantilla_administrador')

@section('administrador')
    <div class="container">

        @isset($mensaje)
            <div class="alert alert-success alert-dismissible fade show " role="alert">
                <strong>{{ $mensaje }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endisset
        <br>
        <div class="row">
            <div class="col-sm-2">
            </div>
            <div class="col-sm-8 shadow p-3 mb-5 bg-white rounded">
                <p>registro</p>

                <form method="POST" action="{{ Route('producto_admin_alta') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nombre del producto:</label>
                        <input name="nombre" maxlength="30" required type="text" class="form-control"
                            placeholder="Nombre del producto:">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Descripción:</label>
                        <textarea name="des" maxlength="100" required class="form-control" id="exampleFormControlTextarea1"
                            rows="3"></textarea>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Categoria</label>
                                <select name="catalogo" class="form-control" id="exampleFormControlSelect1">
                                    @foreach ($catalogo_productos as $key)
                                        <option value="{{ $key->catalogo_productos_nombre }}">
                                            {{ $key->catalogo_productos_nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Sucursal</label>
                                <select name="sucursal" class="form-control" id="exampleFormControlSelect1">
                                    @foreach ($sucursales as $key)
                                        <option value="{{ $key->sucursal_id }}">{{ $key->sucursal_nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">precio</label>
                                <input name="precio" maxlength="5" required type="number" class="form-control"
                                    placeholder="$">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group" id="contFec">
                                <label>Fecha de compra</label>
                                <input required type="date" class="form-control" id="fechaPublicacion" name="fecha">
                                <span class="text-danger span" id="fecha_publicacion_errors"></span>
                            </div>
                        </div>
                    </div>

                    <br>
                    <button type="submit" class="btn btn-outline-success float-right">Registrar</button>


                </form>
            </div>
            <div class="col-sm-2">
            </div>
        </div>
    </div>
@endsection
@extends('layouts.app')
