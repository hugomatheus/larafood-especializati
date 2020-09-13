@if ($errors->any())
  <div class="card card-danger">
      <div class="card-header">
      <h3 class="card-title">Aviso</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i>
          </button>

        </div>
      </div>
      <div class="card-body">
          @foreach ($errors->all() as $error)
              <p style="color:red">{{$error}}</p>
          @endforeach

      </div>
   </div>

@endif

@if (session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>

@endif

@if (session('error'))
    <div class="alert alert-error">
        {{session('error')}}
    </div>

@endif

@if (session('warning'))
    <div class="alert alert-warning">
        {{session('warning')}}
    </div>

@endif
