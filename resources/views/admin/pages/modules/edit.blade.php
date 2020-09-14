
@extends('adminlte::page')

@section('title', 'Alterar Módulo')

@section('content_header')
    <h1>Alterar Módulo</h1>
@stop

@section('content')
<div class="card-body" style="display: block;">
<form action="{{route('modules.update', $module->id)}}" method="POST">
      @method('PUT')
      @include('admin.pages.modules._partials._form', ['submit' => 'Alterar'])
  </form>


</div>
@stop
