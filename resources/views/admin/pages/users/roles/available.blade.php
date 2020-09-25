@extends('adminlte::page')

@section('title', "Vincular cargos ao usuário {{$user->name}}")

@section('content_header')
    <h1>Vincular cargos ao usuário - {{$user->name}}</h1>
    @include('admin.includes._alerts')
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
              <a href="{{route('users.index')}}" class="btn btn-success">Usuários</a>
                <h3 class="card-title"></h3>
                <div class="card-tools">
                    <form action="{{route('users.roles.available', $user->id)}}" method="POST">
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
                <form action="{{route('users.roles.attach', $user->id)}}" method="POST">
                    @csrf
                        <table class="table table-hover text-nowrap">
                          <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                            </tr>
                          </thead>
                          <tbody>
                                @foreach ($roles as $role)
                                    <tr>
                                        <td><input type="checkbox" name="roles[]" value="{{$role->id}}"></td>
                                        <td>{{$role->name}}</td>
                                     </tr>
                                @endforeach
                          </tbody>

                        </table>
                        <div class="card-footer clearfix">
                          <ul class="pagination pagination-sm m-0 float-left">
                            @if (isset($filters))
                            {!! $roles->appends($filters)->links() !!}
                            @else
                              {!! $roles->links() !!}
                            @endif

                          </ul>
                          <div class="row">
                            <div class="col-12">
                                <a href="{{route('users.roles', $user->id)}}" class="btn btn-secondary float-left">Voltar</a>
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

