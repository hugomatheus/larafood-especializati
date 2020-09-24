
@extends('adminlte::page')

@section('title', 'Cadastrar novo usuário')

@section('content_header')
    <h1>Cadastrar novo usuário</h1>
@stop

@section('content')
<div class="card-body" style="display: block;">
    <form action="{{route('users.store')}}" method="POST">
        @include('admin.pages.users._partials._form', ['submit' => 'Cadastrar'])
    </form>
</div>
@stop
