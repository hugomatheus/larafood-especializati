@extends('adminlte::page')

@section('title', "Detalhes do plano: {$plan->name}")

@section('content_header')
    {{-- <h1>{{ ucfirst(trans('messages.plan')) }}</h1> --}}
    <h1>Detalhes do plano: {{$plan->name}}</h1>

@stop
@section('content')
    <div class="container-fluid">

        <div class="row">
          <div class="col-12">
            <div class="card">

              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nome</th>
                      <th  style="width: 100px">Ações</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($details as $detail)
                        <tr>
                            <td>{{$detail->id}}</td>
                            <td>{{$detail->name}}</td>
                            <td class="project-actions text-right">

                                <a class="btn btn-info btn-sm" href="{{route('plans.details.edit', [$plan->id, $detail->id])}}" data-toggle="tooltip" title="Editar">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <a class="btn btn-danger btn-sm" href="{{route('plans.details.destroy', [$plan->id, $detail->id])}}" data-toggle="tooltip" title="deletar" onclick='event.preventDefault();if(confirm("Deseja realmente excluir ?")){document.getElementById("form-delete-{{$detail->id}}").submit();}'>
                                    <i class="fas fa-trash"></i>
                                </a>
                                <form id="form-delete-{{$detail->id}}" style="display: none" action="{{route('plans.details.destroy', [$plan->id, $detail->id])}}" method="POST">
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
                        {!! $details->appends($filters)->links() !!}
                    @else
                        {!! $details->links() !!}
                    @endif

               </ul>
              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>

    </div>
@stop



