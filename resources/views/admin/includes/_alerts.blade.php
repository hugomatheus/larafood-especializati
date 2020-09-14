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
    <div class="card card-success" style="margin: 12px 6px 0" >
        <div class="card-header">
            <svg width="2em" height="2em" style="margin-right: 5px;" viewBox="0 0 16 16" class="bi bi-check-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                <path fill-rule="evenodd" d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z"/>
            </svg>
            {{session('success')}}

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fas fa-times"></i>
            </button>

          </div>
        </div>
     </div>
@endif

@if (session('error'))
    <div class="card card-danger" style="margin: 12px 6px 0" >
        <div class="card-header">
            <svg width="2em" height="2em" style="margin-right: 5px;" viewBox="0 0 16 16" class="bi bi-x-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
            </svg>
            {{session('error')}}

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fas fa-times"></i>
            </button>

          </div>
        </div>
     </div>
@endif

@if (session('warning'))
    <div class="card card-warning" style="margin: 12px 6px 0" >
        <div class="card-header">
            <svg width="2em" height="2em" style="margin-right: 5px;" viewBox="0 0 16 16" class="bi bi-exclamation-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
            </svg>
            {{session('warning')}}

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
      </div>
    </div>
@endif
