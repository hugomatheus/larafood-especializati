
@extends('adminlte::page')

@section('title', 'Alterar detalhe do plano')

@section('content_header')
<h1>Alterar detalhe do plano</h1>
@stop

@section('content')
<div class="card-body" style="display: block;">
<form action="{{route('plans.details.update', [$plan->id, $detail->id])}}" method="POST">
      @method('PUT')
      @include('admin.pages.plans.details._partials._form', ['submit' => 'Alterar'])
  </form>


</div>
@stop
