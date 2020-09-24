@extends('adminlte::page')

@section('title', 'Detalhes da empresa')

@section('content_header')
    <h1>Informações da empresa</h1>
@stop

@section('content')
<div class="card">
  <div class="card-header">
    <div class="user-block">
        <img class="img-circle" src="{{url("storage/".$tenant->logo)}}" alt="Empresa Image">
        <span class="username">{{$tenant->name}}</span>
      </div>

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
            <p class="text-sm">Nome:
                <b class="d-block">{{$tenant->name}}</b>
            </p>

            <p class="text-sm">Plano:
            <b class="d-block">{{$tenant->plan->name}}</b>
            </p>
            <p class="text-sm">E-mail:
            <b class="d-block">{{$tenant->email}}</b>
            </p>
            <p class="text-sm">CNPJ:
            <b class="d-block">{{$tenant->cnpj}}</b>
            </p>
            <p class="text-sm">Ativo:
            <b class="d-block">{{$tenant->active === 'Y' ? 'Sim' : 'Não'}}</b>
            </p>
        </div>
        <div class="col-12">
            <h4>Assinatura:</h4>
            <p class="text-sm">Data Assinatura:
                <b class="d-block">{{$tenant->subscription}}</b>
            </p>

            <p class="text-sm">Data Expira:
            <b class="d-block">{{$tenant->expires_at}}</b>
            </p>
            <p class="text-sm">Identificador:
            <b class="d-block">{{$tenant->subscription_id}}</b>
            </p>
            <p class="text-sm">Ativo (?):
            <b class="d-block">{{ $tenant->subscription_active ? 'Sim' : 'Não' }}</b>
            </p>
            <p class="text-sm">Cancelou (?):
            <b class="d-block"> {{ $tenant->subscription_suspended ? 'Sim' : 'Não' }}</b>
            </p>
        </div>
  </div>
  <div class="col-12">
  <form action="{{route('tenants.destroy', $tenant->id)}}" method="POST">
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
