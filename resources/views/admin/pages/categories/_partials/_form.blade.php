  @csrf
  <div class="card card-secondary">
      <div class="card-header">
        <h3 class="card-title">DADOS DA CATEOGORIA</h3>
      </div>
        <div class="card-body">
          @include('admin.includes._alerts')
          <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" id="name" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"  value="{{$category->name ?? old('name')}}">
             @if ($errors->has('name'))
                <div class="invalid-feedback">
                    {{ $errors->first('name') }}
                </div>
             @endif
          </div>
          <div class="form-group">
            <label for="description">Descrição</label>
            <textarea id="description" name="description" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" rows="4">{{$category->description ?? old('description')}}</textarea>
             @if ($errors->has('description'))
                <div class="invalid-feedback">
                    {{ $errors->first('description') }}
                </div>
             @endif
          </div>

          <div class="row">
            <div class="col-12">
            <a href="{{route('categories.index')}}" class="btn btn-secondary">Cancelar</a>
              <input type="submit" value="{{$submit}}" class="btn btn-success float-right">
            </div>
          </div>
        </div>
   </div>
