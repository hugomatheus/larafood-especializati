@extends('adminlte::page')

@section('title', "Módulos do plano $plan->name")

@section('content_header')
    <h1>Módulos do plano - {{$plan->name}}</h1>
    @include('admin.includes._alerts')
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
              <a href="{{route('plans.modules.available', $plan->id)}}" data-toggle="tooltip" title="Vincular os módulos que ainda não foram associadas" class="btn btn-success">Vincular novos módulos</a>
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
                    @foreach ($modules as $module)
                        <tr>
                            <td>{{$module->name}}</td>
                            <td class="project-actions text-right">

                                <a class="btn btn-danger btn-sm" href="{{route('plans.modules.detach', [$plan->id, $module->id])}}" data-toggle="tooltip" title="desvincular módulo">
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
