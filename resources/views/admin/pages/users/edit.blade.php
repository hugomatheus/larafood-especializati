
@extends('adminlte::page')

@section('title', 'Alterar usuário')

@section('content_header')
    <h1>Alterar usuário</h1>
@stop

@section('content')
    <div class="card-body" style="display: block;">
        <form action="{{route('users.update', $user->id)}}" method="POST">
        @method('PUT')
        @include('admin.pages.users._partials._form', ['submit' => 'Alterar'])
        </form>
    </div>
@stop
