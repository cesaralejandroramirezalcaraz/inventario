

@extends('plantilla_administrador')

@section('administrador')

<div class="container">
    <br>
    <div class=" shadow p-3 mb-5 bg-white rounded">
        <table class="table">
            <thead class="bg-primary text-white">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Sucursal</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Fecha de compra</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Comentario</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i = 1;
                @endphp
                @foreach ($registro as $key)
                    <tr>

                        <td>{{ $key->id }}</td>
                        <td>{{ $key->reg_nombre }}</td>
                        <td>{{ $key->reg_descripcion }}</td>
                        <td>{{ $key->reg_categoria }}</td>
                        @foreach ($sucursales as $item)
                            @if ($key->reg_sucursal_id == $item->sucursal_id)
                                <td> {{ $item->sucursal_nombre }}</td>
                            @endif
                        @endforeach
                        <td>{{ $key->reg_precio }}</td>
                        <td>{{ $key->reg_fecha_compra }}</td>
                        <td>{{ $key->reg_estado }}</td>
                        <td>{{ $key->reg_comentarios }}</td>
                        <td>
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal"
                                data-target="#exampleModal{{ $i }}">Editrar</button>
                        </td>
                        <td>
                            <form method="post" action="{{ Route('delete') }}">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{ $key->id }}">
                                <button type="submit" class="btn btn-outline-danger">borrar</button>

                            </form>
                        </td>
                    </tr>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal{{ $i }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Editar</h5>
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <form method="POST" action="{{ Route('edit') }}">
                                        <input type="hidden" value="{{ $key->id }}" name="id">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Nombre del producto:</label>
                                            <input name="nombre" maxlength="30" value="{{ $key->reg_nombre }}"
                                                readonly type="text" class="form-control"
                                                placeholder="Nombre del producto:">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">Descripción:</label>
                                            <textarea name="des" maxlength="100" readonly class="form-control" id="exampleFormControlTextarea1"
                                                rows="3">{{ $key->reg_descripcion }}</textarea>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="exampleFormControlInput1">Categoria</label>
                                                    <input name="nombre" maxlength="30"
                                                        value="{{ $key->reg_categoria }}" readonly type="text"
                                                        class="form-control" placeholder="Nombre del producto:">
                                                </div>
                                            </div>



                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="exampleFormControlInput1">Sucursal</label>
                                                    <input maxlength="30"
                                                        value="@foreach ($sucursales as $item) @if ($key->reg_sucursal_id == $item->sucursal_id){{ $item->sucursal_nombre }} @endif @endforeach"
                                                        readonly type="text" class="form-control"
                                                        placeholder="Nombre del producto:">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="exampleFormControlInput1">Precio</label>
                                                    <input name="nombre" maxlength="30"
                                                        value="{{ $key->reg_precio }}" readonly type="text"
                                                        class="form-control" placeholder="Nombre del producto:">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="exampleFormControlInput1">Fecha</label>
                                                    <input name="nombre" maxlength="30"
                                                        value="{{ $key->reg_fecha_compra }}" readonly type="text"
                                                        class="form-control" placeholder="Nombre del producto:">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect1">Etado</label>
                                                    <select name="estado" class="form-control"
                                                        id="exampleFormControlSelect1">
                                                        <option value="avierto">abierto</option>
                                                        <option value="cerrado">cerrado</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="exampleFormControlInput1">comentarios</label>
                                                    <input name="comentar" maxlength="100"
                                                        value="{{ $key->reg_comentarios }}" required type="text"
                                                        class="form-control" placeholder="Comentario">
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-danger"
                                        data-dismiss="modal">Cerrar</button>

                                    <button type="submit" class="btn btn-outline-success">Actualizar</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @php
                        $i = $i + 1;
                    @endphp
                @endforeach
            </tbody>

        </table>


    </div>
</div>

@endsection
@extends('layouts.app')