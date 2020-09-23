
@extends('adminlte::page')

@section('title', 'Alterar categoria')

@section('content_header')
    <h1>Alterar categoria</h1>
@stop

@section('content')
    <div class="card-body" style="display: block;">
        <form action="{{route('categories.update', $category->id)}}" method="POST">
        @method('PUT')
        @include('admin.pages.categories._partials._form', ['submit' => 'Alterar'])
        </form>
    </div>
@stop
