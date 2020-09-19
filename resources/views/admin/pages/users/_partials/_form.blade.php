  @csrf
  <div class="card card-secondary">
      <div class="card-header">
        <h3 class="card-title">DADOS DO USUÁRIO</h3>
      </div>
        <div class="card-body">
          @include('admin.includes._alerts')
          <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" id="name" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"  value="{{$user->name ?? old('name')}}">
             @if ($errors->has('name'))
                <div class="invalid-feedback">
                    {{ $errors->first('name') }}
                </div>
             @endif
          </div>
          <div class="form-group">
            <label for="email">E-mail</label>
            <input type="text" id="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" value="{{$user->email ?? old('email')}}" >
             @if ($errors->has('email'))
                <div class="invalid-feedback">
                    {{ $errors->first('email') }}
                </div>
             @endif
          </div>
          <div class="form-group">
            <label for="email">Senha</label>
            <input type="password" id="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" value="{{$user->password ?? old('password')}}" >
             @if ($errors->has('password'))
                <div class="invalid-feedback">
                    {{ $errors->first('password') }}
                </div>
             @endif
          </div>

          <div class="row">
            <div class="col-12">
            <a href="{{route('users.index')}}" class="btn btn-secondary">Cancelar</a>
              <input type="submit" value="{{$submit}}" class="btn btn-success float-right">
            </div>
          </div>
        </div>
   </div>
