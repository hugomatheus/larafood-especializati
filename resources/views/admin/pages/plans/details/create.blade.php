
@extends('adminlte::page')

@section('title', "Cadastrar detalhe do plano: {{$plan->name}}")

@section('content_header')
    <h1>Cadastrar novo detalhe do plano:  {{$plan->name}}</h1>
@stop

@section('content')
<div class="card-body" style="display: block;">
    <form action="{{route('plans.details.store', $plan->id)}}" method="POST">
        @include('admin.pages.plans.details._partials._form', ['submit' => 'Cadastrar'])
    </form>
</div>
@stop
