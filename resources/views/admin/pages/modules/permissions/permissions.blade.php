@extends('adminlte::page')

@section('title', "Permissões do módulo $module->name")

@section('content_header')
    <h1>Permissões do módulo - {{$module->name}}</h1>
    @include('admin.includes._alerts')
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
              {{-- <a href="{{route('admin.acl.modules.permissions.create', $module->id)}}" data-toggle="tooltip" title="Lista com todas as permissões associadas ou não associadas" class="btn btn-success">Sincronizar Permissões</a> --}}
              <a href="{{route('modules.permissions.available', $module->id)}}" data-toggle="tooltip" title="Vincular as permissões que ainda não foram associadas" class="btn btn-success">Vincular permissões</a>
                <h3 class="card-title"></h3>
                <div class="card-tools">
                    {{-- <form action="{{route('admin.acl.modules.permissions.search', $module->id)}}" method="POST">
                        @csrf
                        <div class="input-group input-group-sm">
                            <input type="text" name="filter" class="form-control float-right">
                            <div class="input-group-append">
                              <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form> --}}

                </div>
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>Nome</th>
                      <th style="width: 150px">Ação</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($permissions as $permission)
                        <tr>
                            <td>{{$permission->name}}</td>
                            <td class="project-actions text-right">

                                {{-- <a class="btn btn-danger btn-sm" href="{{route('admin.acl.modules.permissions.destroy', [$module->id, $permission->id])}}" data-toggle="tooltip" title="delete!" onclick='event.preventDefault();if(confirm("Deseja realmente desassociar a permissão ?")){document.getElementById("form-delete-{{$permission->id}}").submit();}'>
                                <i class="fas fa-trash"></i>
                                </a>
                            <form id="form-delete-{{$permission->id}}" style="display: none" action="{{route('admin.acl.modules.permissions.destroy', [$module->id, $permission->id])}}" method="POST">
                                @csrf
                                @method('DELETE')
                            </form> --}}

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
