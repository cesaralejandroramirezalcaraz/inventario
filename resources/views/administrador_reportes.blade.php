

@extends('plantilla_administrador')

@section('administrador')

<div class="container">
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8 shadow p-3 mb-5 bg-white rounded">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <h5 class="card-header">Descarga masiva</h5>
                        <div class="card-body">
                          <h5 class="card-title"></h5>
                          <p class="card-text">la descarga masiva Permitirá la descarga de todo lo que este en la base de datos</p>
                          <br>
                          <br>
                          <a href="{{route('masivo')}}" class="btn btn-primary">Destargar</a>
                        </div>
                      </div>
                </div>
                <div class="col">
                    <div class="card">
                        <h5 class="card-header">Descarga por fechas </h5>
                        <div class="card-body">
                          <h5 class="card-title"></h5>
                          <p class="card-text">la descarga por fechas permite seleccionar un rango de fechas para la descarga 
                            considerando la fecha de registro.
                            </p>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                              Descargar
                            </button>
                        </div>
                      </div>
                </div>
            </div>
        </div>
        <div class="col-sm-2"></div>
    </div>
</div>


<!-- Button trigger modal -->


<!-- Modal -->
<form method="post" action="{{ Route('fecha') }}">
  {{ csrf_field() }}
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Rango de fechas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col">
            <div class="form-group" id="contFec">
              <label>Fecha 1</label>
              <input required type="date" class="form-control" id="fechaPublicacion" name="fecha1">
              <span class="text-danger span" id="fecha_publicacion_errors"></span>
          </div>
          
          </div>
          <div class="col">
            <div class="form-group" id="contFec">
              <label>Fecha 2</label>
              <input required type="date" class="form-control" id="fechaPublicacion" name="fecha2">
              <span class="text-danger span" id="fecha_publicacion_errors"></span>
          </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Descargar</button>
      </div>
    </div>
  </div>
</div>
</form>
@endsection
@extends('layouts.app')