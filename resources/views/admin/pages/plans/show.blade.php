@extends('adminlte::page')

@section('title', 'Detalhes do plano')

@section('content_header')
    <h1>Detalhes do plano</h1>
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
      <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
          <span class="info-box-icon bg-info"><i class="fas fa-users"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Clientes</span>
            <span class="info-box-number">1,410</span>
          </div>
        </div>
      </div>
   </div>
   <div class="row">
    <div class="col-12">
      <h4>Informações:</h4>
      <p class="text-sm">Plano
        <b class="d-block">{{$plan->name}}</b>
      </p>
      <p class="text-sm">Preço atual
        <b class="d-block">R$ {{number_format($plan->price, 2, ',', '.')}}</b>
      </p>
      <p class="text-sm">Descrição
        <b class="d-block">{{$plan->description}}</b>
      </p>
    </div>
  </div>
  <div class="col-12">
  {{-- <form action="{{route('plans.destroy', ['plan' => $plan->id])}}" method="POST">
     @csrf
     @method('DELETE')
     <button onclick="return confirm('Deseja realmente excluir ?');" type="submit" class="btn btn-danger float-right"><i class="fas fa-trash"></i> Excluir</button>
  </form> --}}

  </div>
  </div>
</div>
@stop

@section('js')

@stop
