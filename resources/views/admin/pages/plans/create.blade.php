
@extends('adminlte::page')

@section('title', 'Cadastrar novo Plano')

@section('content_header')
    <h1>Cadastrar novo Plano</h1>
@stop

@section('content')
<div class="card-body" style="display: block;">
    <form action="{{route('plans.store')}}" method="POST">
        @include('admin.pages.plans._partials._form', ['submit' => 'Cadastrar'])
    </form>
</div>
@stop
