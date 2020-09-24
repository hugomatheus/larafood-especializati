@extends('adminlte::page')

@section('title', "Vincular categorias ao produto {{$product->title}}")

@section('content_header')
    <h1>Vincular categorias ao produto {{$product->title}}</h1>
    @include('admin.includes._alerts')
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
              <a href="{{route('products.index')}}" class="btn btn-success">Produtos</a>
                <h3 class="card-title"></h3>
                <div class="card-tools">
                    <form action="{{route('products.categories.available', $product->id)}}" method="POST">
                        @csrf
                        <div class="input-group input-group-sm">
                        <input type="text" name="filter" class="form-control float-right" value="{{$filters['filter'] ?? ''}}">
                            <div class="input-group-append">
                              <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>

                </div>
              </div>
              <div class="include-form">
                <div class="card-body table-responsive p-0">
                <form action="{{route('products.categories.attach', $product->id)}}" method="POST">
                    @csrf
                        <table class="table table-hover text-nowrap">
                          <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                            </tr>
                          </thead>
                          <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td><input type="checkbox" name="categories[]" value="{{$category->id}}"></td>
                                        <td>{{$category->name}}</td>
                                     </tr>
                                @endforeach
                          </tbody>

                        </table>
                        <div class="card-footer clearfix">
                          <ul class="pagination pagination-sm m-0 float-left">
                            @if (isset($filters))
                            {!! $categories->appends($filters)->links() !!}
                            @else
                              {!! $categories->links() !!}
                            @endif

                          </ul>
                          <div class="row">
                            <div class="col-12">
                                <a href="{{route('products.categories', $product->id)}}" class="btn btn-secondary float-left">Voltar</a>
                                <input type="submit" value="Vincular" class="btn btn-success float-right">
                            </div>

                          </div>
                        </div>
                   </form>
                </div>
              </div>

            </div>
          </div>
        </div>

      </div>
@stop

