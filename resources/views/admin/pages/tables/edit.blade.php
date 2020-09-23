
@extends('adminlte::page')

@section('title', 'Alterar mesa')

@section('content_header')
    <h1>Alterar mesa</h1>
@stop

@section('content')
    <div class="card-body" style="display: block;">
        <form action="{{route('tables.update', $table->id)}}" method="POST">
        @method('PUT')
        @include('admin.pages.tables._partials._form', ['submit' => 'Alterar'])
        </form>
    </div>
@stop
