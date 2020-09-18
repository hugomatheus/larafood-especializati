@extends('adminlte::page')

@section('title', "Módulos vinculados a permissão $permission->name")

@section('content_header')
    <h1>Módulos vinculados a permissão - {{$permission->name}}</h1>
    @include('admin.includes._alerts')
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
              <a href="{{route('permissions.index', $permission->id)}}" data-toggle="tooltip" title="Lista de permissões" class="btn btn-success">Permissões</a>
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
                    @foreach ($modules as $module)
                        <tr>
                            <td>{{$module->name}}</td>
                            <td class="project-actions text-right">

                                {{-- <a class="btn btn-danger btn-sm" href="{{route('modules.permissions.detach', [$module->id, $permission->id])}}" data-toggle="tooltip" title="desvincular permissão">
                                    <i class="fas fa-trash"></i>
                                </a> --}}

                            </td>
                        </tr>
                    @endforeach

                  </tbody>
                </table>
              </div>
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  @if (isset($filters))
                  {!! $modules->appends($filters)->links() !!}
                  @else
                    {!! $modules->links() !!}
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
