
@extends('adminlte::page')

@section('title', 'Alterar produto')

@section('content_header')
    <h1>Alterar produto</h1>
@stop

@section('content')
    <div class="card-body" style="display: block;">
        <form action="{{route('products.update', $product->id)}}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @include('admin.pages.products._partials._form', ['submit' => 'Alterar'])
        </form>
    </div>
@stop
