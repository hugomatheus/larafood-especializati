
@extends('adminlte::page')

@section('title', 'Cadastrar nova permissão')

@section('content_header')
    <h1>Cadastrar nova Permissão</h1>
@stop

@section('content')
<div class="card-body" style="display: block;">
    <form action="{{route('permissions.store')}}" method="POST">
        @include('admin.pages.permissions._partials._form', ['submit' => 'Cadastrar'])
    </form>
</div>
@stop
