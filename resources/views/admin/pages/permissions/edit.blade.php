
@extends('adminlte::page')

@section('title', 'Alterar Permissão')

@section('content_header')
    <h1>Alterar Permissão</h1>
@stop

@section('content')
    <div class="card-body" style="display: block;">
        <form action="{{route('permissions.update', $permission->id)}}" method="POST">
        @method('PUT')
        @include('admin.pages.permissions._partials._form', ['submit' => 'Alterar'])
        </form>
    </div>
@stop
