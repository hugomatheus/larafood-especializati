
@extends('adminlte::page')

@section('title', 'Cadastrar novo Módulo')

@section('content_header')
    <h1>Cadastrar novo Módulo</h1>
@stop

@section('content')
<div class="card-body" style="display: block;">
    <form action="{{route('modules.store')}}" method="POST">
        @include('admin.pages.modules._partials._form', ['submit' => 'Cadastrar'])
    </form>
</div>
@stop
