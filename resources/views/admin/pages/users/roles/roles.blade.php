@extends('adminlte::page')

@section('title', "Cargos do usuário $user->name")

@section('content_header')
    <h1>Cargos do usuário - {{$user->name}}</h1>
    @include('admin.includes._alerts')
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
              <a href="{{route('users.roles.available', $user->id)}}" data-toggle="tooltip" title="Vincular os cargos que ainda não foram associadas" class="btn btn-success">Vincular novos cargos</a>
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
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{$role->name}}</td>
                            <td class="project-actions text-right">

                                <a class="btn btn-danger btn-sm" href="{{route('users.roles.detach', [$user->id, $role->id])}}" data-toggle="tooltip" title="desvincular cargo">
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
                  {!! $roles->appends($filters)->links() !!}
                  @else
                    {!! $roles->links() !!}
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
