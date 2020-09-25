
@extends('adminlte::page')

@section('title', 'Alterar cargo')

@section('content_header')
    <h1>Alterar cargo</h1>
@stop

@section('content')
    <div class="card-body" style="display: block;">
        <form action="{{route('roles.update', $role->id)}}" method="POST">
        @method('PUT')
        @include('admin.pages.roles._partials._form', ['submit' => 'Alterar'])
        </form>
    </div>
@stop
