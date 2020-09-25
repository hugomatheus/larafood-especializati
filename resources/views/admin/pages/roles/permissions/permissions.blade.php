@extends('adminlte::page')

@section('title', "Permissões vinculados ao cargo $role->name")

@section('content_header')
    <h1>Permissões vinculados ao cargo {{$role->name}}</h1>
    @include('admin.includes._alerts')
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
              <a href="{{route('roles.permissions.available', $role->id)}}" data-toggle="tooltip" title="Lista de cargos" class="btn btn-success">Vincular novas permissões</a>
                <h3 class="card-title"></h3>
                <div class="card-tools"></div>
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>Nome</th>
                      <th style="width: 100px"></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($permissions as $permission)
                        <tr>
                            <td>{{$permission->name}}</td>
                            <td class="project-actions text-right">

                                <a class="btn btn-danger btn-sm" href="{{route('roles.permissions.detach', [$role->id, $permission->id])}}" data-toggle="tooltip" title="desvincular permissão">
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
                  {!! $permissions->appends($filters)->links() !!}
                  @else
                    {!! $permissions->links() !!}
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
