@extends('adminlte::page')

@section('title', 'Detalhes do módulo')

@section('content_header')
    <h1>Informações do módulo</h1>
@stop

@section('content')
<div class="card">
  <div class="card-header">
  <h3 class="card-title">Módulo: {{$module->name}}</h3>

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
        <p class="text-sm">Módulo:
            <b class="d-block">{{$module->name}}</b>
        </p>

        <p class="text-sm">Descrição:
          <b class="d-block">{{$module->description}}</b>
        </p>
    </div>
  </div>
  <div class="col-12">
  <form action="{{route('modules.destroy', $module->id)}}" method="POST">
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
