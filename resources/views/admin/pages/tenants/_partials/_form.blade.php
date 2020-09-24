@csrf

<div class="card card-secondary">
  <div class="card-header">
    <h3 class="card-title">DADOS CADASTRAIS DA EMPRESA</h3>
  </div>

    <div class="card-body">

      <div class="form-group col-md-2" style="padding-left: 0;">
        <label for="zip-code">CNPJ</label>
        <div class="input-group mb-3">
          <input type="text" name="cnpj" class="form-control cpfCnpj-mask {{ $errors->has('cnpj') ? 'is-invalid' : '' }}" id="cnpj" value="{{$tenant->cnpj ?? old('cnpj')}}">
          @if ($errors->has('cnpj'))
            <div class="invalid-feedback">
              {{$errors->first('cnpj')}}
            </div>
          @endif
        </div>
      </div>
      <div class="form-group">
        <label for="name">Nome</label>
        <input type="text" id="name" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{$tenant->name ?? old('name')}}">
        @if ($errors->has('name'))
          <div class="invalid-feedback">
            {{$errors->first('name')}}
          </div>
        @endif
      </div>
      <div class="form-group">
        <label for="name">E-mail</label>
        <input type="text" id="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" value="{{$tenant->email ?? old('email')}}">
        @if ($errors->has('email'))
          <div class="invalid-feedback">
            {{$errors->first('email')}}
          </div>
        @endif
      </div>
      <div class="form-group">
        <label for="logo">Logo</label>
        <div class="input-group">
          <input type="file" name="logo" class="form-control {{ $errors->has('logo') ? 'is-invalid' : '' }}" id="logo">

          @if ($errors->has('logo'))
            <div class="invalid-feedback">
              {{$errors->first('logo')}}
            </div>
          @endif
        </div>
      </div>
      <div class="form-group">
        <label>* Ativo?</label>
        <select name="active" class="form-control">
            <option value="Y" @if(isset($tenant) && $tenant->active == 'Y') selected @endif >SIM</option>
            <option value="N" @if(isset($tenant) && $tenant->active == 'N') selected @endif>Não</option>
        </select>
       </div>
      <div class="form-group">
        <label>* Plano</label>
        <select name="plan_id" class="form-control">
            @foreach ($plans as $plan)
                <option value="{{$plan->id}}" @if(isset($tenant) && $tenant->plan_id == $plan->id) selected @endif >{{$plan->name}}</option>
            @endforeach
            
        </select>
       </div>

    <div class="card">
        <div class="card-body">
          <h5 class="card-title">ASSINATURA</h5>
        </div>
        <div class="card-body">

                <div class="form-group">
                    <label>Data Assinatura (início):</label>
                    <input type="date" name="subscription" class="form-control" placeholder="Data Assinatura (início):" value="{{ $tenant->subscription ?? old('subscription') }}">
                </div>
                <div class="form-group">
                    <label>Expira (final):</label>
                    <input type="date" name="expires_at" class="form-control" placeholder="Expira:" value="{{ $tenant->expires_at ?? old('expires_at') }}">
                </div>
                <div class="form-group">
                    <label>Identificador:</label>
                    <input type="text" name="subscription_id" class="form-control" placeholder="Identificador:" value="{{ $tenant->subscription_id ?? old('subscription_id') }}">
                </div>
                <div class="form-group">
                    <label>* Assinatura Ativa?</label>
                    <select name="subscription_active" class="form-control">
                        <option value="1" @if(isset($tenant) && $tenant->subscription_active) selected @endif >SIM</option>
                        <option value="0" @if(isset($tenant) && !$tenant->subscription_active) selected @endif>Não</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>* Assinatura Cancelada?</label>
                    <select name="subscription_suspended" class="form-control">
                        <option value="1" @if(isset($tenant) && $tenant->subscription_suspended) selected @endif >SIM</option>
                        <option value="0" @if(isset($tenant) && !$tenant->subscription_suspended) selected @endif>Não</option>
                    </select>
                </div>

        </div>


    </div>





    <div class="row">
      <div class="col-12">
        <a href="{{route('tenants.index')}}" class="btn btn-secondary">Cancelar</a>
        <input type="submit" value="{{$submit}}" class="btn btn-success float-right">
      </div>
    </div>


</div>

