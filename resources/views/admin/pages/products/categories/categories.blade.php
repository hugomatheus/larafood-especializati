@extends('adminlte::page')

@section('title', "Categorias do produto $product->title")

@section('content_header')
    <h1>Categorias do produto - {{$product->title}}</h1>
    @include('admin.includes._alerts')
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
              <a href="{{route('products.categories.available', $product->id)}}" data-toggle="tooltip" title="Vincular as categorias que ainda não foram associadas" class="btn btn-success">Vincular novas categorias</a>
                <h3 class="card-title"></h3>
                <div class="card-tools"></div>
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>Nome</th>
                      <th style="width: 100px">Ação</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{$category->name}}</td>
                            <td class="project-actions text-right">

                                <a class="btn btn-danger btn-sm" href="{{route('products.categories.detach', [$product->id, $category->id])}}" data-toggle="tooltip" title="desvincular categoria">
                                    <i class="fas fa-trash"></i>
                                </a>

                            </td>
                        </tr>
                    @endforeach

                  </tbody>
                </table>
              </div>
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  @if (isset($filters))
                  {!! $categories->appends($filters)->links() !!}
                  @else
                    {!! $categories->links() !!}
                  @endif

                </ul>
              </div>
            </div>
          </div>
        </div>

      </div>
@stop

@section('js')

@stop
