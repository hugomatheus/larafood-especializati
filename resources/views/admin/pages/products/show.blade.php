@extends('adminlte::page')

@section('title', 'Detalhes da produto')

@section('content_header')
    <h1>Informações da produto</h1>
@stop

@section('content')
<div class="card">
  <div class="card-header">
    <div class="user-block">
        <img class="img-circle" src="{{url("storage/".$product->image)}}" alt="User Image">
        <span class="username">{{$product->title}}</span>
        <span class="description">R$ {{number_format($product->price, 2, ',', '.')}}</span>
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
        <p class="text-sm">Título:
            <b class="d-block">{{$product->title}}</b>
        </p>

        <p class="text-sm">Descrição:
          <b class="d-block">{{$product->description}}</b>
        </p>
    </div>
  </div>
  <div class="col-12">
  <form action="{{route('products.destroy', $product->id)}}" method="POST">
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
