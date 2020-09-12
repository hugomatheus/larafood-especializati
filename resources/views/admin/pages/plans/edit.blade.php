
@extends('adminlte::page')

@section('title', 'Alterar Plano')

@section('content_header')
    <h1>Alterar Plano</h1>
@stop

@section('content')
<div class="card-body" style="display: block;">
<form action="{{route('plans.update', $plan->id)}}" method="POST">
      @method('PUT')
      @include('admin.pages.plans._partials._form', ['submit' => 'Alterar'])
  </form>


</div>
@stop
