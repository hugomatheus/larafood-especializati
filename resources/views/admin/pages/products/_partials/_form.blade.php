  @csrf
  <div class="card card-secondary">
      <div class="card-header">
        <h3 class="card-title">DADOS DO PRODUTO</h3>
      </div>
        <div class="card-body">
          @include('admin.includes._alerts')
          <div class="form-group">
            <label for="title">Título</label>
            <input type="text" id="title" name="title" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"  value="{{$product->title ?? old('title')}}">
             @if ($errors->has('name'))
                <div class="invalid-feedback">
                    {{ $errors->first('name') }}
                </div>
             @endif
          </div>
          <div class="form-group">
            <label for="image">Image</label>
            <input type="file" id="image" name="image" class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}"  value="{{$product->image ?? old('image')}}">
             @if ($errors->has('image'))
                <div class="invalid-feedback">
                    {{ $errors->first('image') }}
                </div>
             @endif
          </div>
          <div class="form-group">
            <label for="image">Preço</label>
            <input type="text" id="price" name="price" class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}"  value="{{$product->price ?? old('price')}}">
             @if ($errors->has('price'))
                <div class="invalid-feedback">
                    {{ $errors->first('price') }}
                </div>
             @endif
          </div>
          <div class="form-group">
            <label for="description">Descrição</label>
            <textarea id="description" name="description" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" rows="4">{{$product->description ?? old('description')}}</textarea>
             @if ($errors->has('description'))
                <div class="invalid-feedback">
                    {{ $errors->first('description') }}
                </div>
             @endif
          </div>

          <div class="row">
            <div class="col-12">
            <a href="{{route('products.index')}}" class="btn btn-secondary">Cancelar</a>
              <input type="submit" value="{{$submit}}" class="btn btn-success float-right">
            </div>
          </div>
        </div>
   </div>
