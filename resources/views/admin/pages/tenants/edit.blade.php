
@extends('adminlte::page')

@section('title', 'Alterar empresa')

@section('content_header')
    <h1>Alterar empresa</h1>
@stop

@section('content')
    <div class="card-body" style="display: block;">
        <form action="{{route('tenants.update', $tenant->id)}}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @include('admin.pages.tenants._partials._form', ['submit' => 'Alterar'])
        </form>
    </div>
@stop
