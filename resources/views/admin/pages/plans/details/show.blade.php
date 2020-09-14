@extends('adminlte::page')

@section('title', 'Detalhes do plano')

@section('content_header')
    <h1>Informações do detalhe do plano</h1>
@stop

@section('content')
<div class="card">
  <div class="card-header">
  <h3 class="card-title">Plano: {{$plan->name}}</h3>

    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
        <i class="fas fa-minus"></i>
      </button>

    </div>
  </div>
  <div class="card-body">

   <div class="row">
    <div class="col-12">
      <h4>Informações:</h4>
      <p class="text-sm">Detalhe do plano
        <b class="d-block">{{$detail->name}}</b>
      </p>

      <p class="text-sm">Plano
        <b class="d-block">{{$plan->name}}</b>
      </p>

      </p>
    </div>
  </div>
  <div class="col-12">
  <form action="{{route('plans.details.destroy', [$plan->id, $detail->id])}}" method="POST">
     @csrf
     @method('DELETE')
     <button onclick="return confirm('Deseja realmente excluir ?');" type="submit" class="btn btn-danger float-right"><i class="fas fa-trash"></i> Excluir</button>
  </form>

  </div>
  </div>
</div>
@stop

@section('js')

@stop
