
@extends('adminlte::page')

@section('title', 'Cadastrar nova categoria')

@section('content_header')
    <h1>Cadastrar nova categoria</h1>
@stop

@section('content')
<div class="card-body" style="display: block;">
    <form action="{{route('categories.store')}}" method="POST">
        @include('admin.pages.categories._partials._form', ['submit' => 'Cadastrar'])
    </form>
</div>
@stop
