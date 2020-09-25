
@extends('adminlte::page')

@section('title', 'Cadastrar novo cargo')

@section('content_header')
    <h1>Cadastrar novo cargo</h1>
@stop

@section('content')
<div class="card-body" style="display: block;">
    <form action="{{route('roles.store')}}" method="POST">
        @include('admin.pages.roles._partials._form', ['submit' => 'Cadastrar'])
    </form>
</div>
@stop
