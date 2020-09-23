@extends('adminlte::page')

@section('title', 'Categorias')

@section('content_header')
    <h1>Categorias</h1>
    @include('admin.includes._alerts')
@stop
@section('content')
    <div class="container-fluid">

        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <a href="{{route('categories.create')}}" class="btn btn-success">Cadastrar</a>
                <h3 class="card-title"></h3>
                <div class="card-tools">
                    <form action="{{route('categories.search')}}" method="POST">
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
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>Nome</th>
                      <th style="width: 100px">Ações</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{$category->name}}</td>
                            <td class="project-actions text-right">

                                <a class="btn btn-primary btn-sm" href="{{route('categories.show', $category->id)}}" data-toggle="tooltip" title="Visualizar">
                                    <i class="far fa-file-alt"></i>
                                </a>
                                <a class="btn btn-info btn-sm" href="{{route('categories.edit', $category->id)}}" data-toggle="tooltip" title="Editar">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <a class="btn btn-danger btn-sm" href="{{route('categories.destroy', $category->id)}}" data-toggle="tooltip" title="deletar" onclick='event.preventDefault();if(confirm("Deseja realmente excluir ?")){document.getElementById("form-delete-{{$category->id}}").submit();}'>
                                    <i class="fas fa-trash"></i>
                                </a>
                                <form id="form-delete-{{$category->id}}" style="display: none" action="{{route('categories.destroy', $category->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                </form>
                          </td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
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
            <!-- /.card -->
          </div>
        </div>

    </div>
@stop



