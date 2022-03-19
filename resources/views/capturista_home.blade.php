

@extends('plantilla_capturista')

@section('capturiasta')
<h1>hla mundo</h1>
{{Auth::user()->perfil}}
@endsection
@extends('layouts.app')