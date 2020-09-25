
@extends('adminlte::page')

@section('title', 'Cadastrar nova empresa')

@section('content_header')
    <h1>Cadastrar nova empresa</h1>
@stop

@section('content')
<div class="card-body" style="display: block;">
    <form action="{{route('tenants.store')}}" method="POST" enctype="multipart/form-data">
        @include('admin.pages.tenants._partials._form', ['submit' => 'Cadastrar'])
    </form>
</div>
@stop
