@extends('adminlte::page')

@section('title', 'Usuários')

@section('content_header')
    <h1>Usuários</h1>
    @include('admin.includes._alerts')
@stop
@section('content')
    <div class="container-fluid">

        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <a href="{{route('users.create')}}" class="btn btn-success">Cadastrar</a>
                <h3 class="card-title"></h3>
                <div class="card-tools">
                    <form action="{{route('users.search')}}" method="POST">
                        @csrf
                        {{-- <div class="form-row">
                            <div class="col">
                              <input name="filter.name" type="text" class="form-control" placeholder="Nome">
                            </div>
                            <div class="col-6">
                              <input name="filter.email" type="text" class="form-control" placeholder="E-mail">
                            </div>
                            <div class="col">
                              <input name="filter.tenant" type="text" class="form-control" placeholder="Empresa">
                            </div>
                            <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                          </div> --}}
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
                      <th>E-mail</th>
                      <th style="width: 100px">Ações</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td class="project-actions text-right">

                                <a class="btn btn-secondary btn-sm" href="{{route('users.roles', $user->id)}}" data-toggle="tooltip" title="Associação de cargos">
                                    <i class="fas fa-user-tag"></i>
                                </a>
                                <a class="btn btn-primary btn-sm" href="{{route('users.show', $user->id)}}" data-toggle="tooltip" title="Visualizar">
                                    <i class="far fa-file-alt"></i>
                                </a>
                                <a class="btn btn-info btn-sm" href="{{route('users.edit', $user->id)}}" data-toggle="tooltip" title="Editar">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <a class="btn btn-danger btn-sm" href="{{route('users.destroy', $user->id)}}" data-toggle="tooltip" title="deletar" onclick='event.preventDefault();if(confirm("Deseja realmente excluir ?")){document.getElementById("form-delete-{{$user->id}}").submit();}'>
                                    <i class="fas fa-trash"></i>
                                </a>
                                <form id="form-delete-{{$user->id}}" style="display: none" action="{{route('users.destroy', $user->id)}}" method="POST">
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
                        {!! $users->appends($filters)->links() !!}
                    @else
                        {!! $users->links() !!}
                    @endif

               </ul>
              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>

    </div>
@stop



