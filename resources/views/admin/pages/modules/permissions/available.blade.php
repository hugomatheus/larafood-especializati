@extends('adminlte::page')

@section('title', "Vincular permissões do módulo {{$module->name}}")

@section('content_header')
    <h1>Vincular permissões do módulo - {{$module->name}}</h1>
    @include('admin.includes._alerts')
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
              <a href="{{route('modules.index')}}" class="btn btn-success">Módulos</a>
                <h3 class="card-title"></h3>
                <div class="card-tools">
                    <form action="{{route('modules.permissions.available', $module->id)}}" method="POST">
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
                <form action="{{route('modules.permissions.attach', $module->id)}}" method="POST">
                    @csrf
                        <table class="table table-hover text-nowrap">
                          <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                            </tr>
                          </thead>
                          <tbody>
                                @foreach ($permissions as $permission)
                                    <tr>
                                        <td><input type="checkbox" name="permissions[]" value="{{$permission->id}}"></td>
                                        <td>{{$permission->name}}</td>
                                     </tr>
                                @endforeach
                          </tbody>

                        </table>
                        <div class="card-footer clearfix">
                          <ul class="pagination pagination-sm m-0 float-left">
                            @if (isset($filters))
                            {!! $permissions->appends($filters)->links() !!}
                            @else
                              {!! $permissions->links() !!}
                            @endif

                          </ul>
                          <div class="row">
                            <div class="col-12">
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

