
@extends('adminlte::page')

@section('title', 'Cadastrar novo produto')

@section('content_header')
    <h1>Cadastrar novo produto</h1>
@stop

@section('content')
<div class="card-body" style="display: block;">
    <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
        @include('admin.pages.products._partials._form', ['submit' => 'Cadastrar'])
    </form>
</div>
@stop
