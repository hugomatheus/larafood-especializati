
@extends('adminlte::page')

@section('title', 'Cadastrar nova mesa')

@section('content_header')
    <h1>Cadastrar nova mesa</h1>
@stop

@section('content')
<div class="card-body" style="display: block;">
    <form action="{{route('tables.store')}}" method="POST">
        @include('admin.pages.tables._partials._form', ['submit' => 'Cadastrar'])
    </form>
</div>
@stop
