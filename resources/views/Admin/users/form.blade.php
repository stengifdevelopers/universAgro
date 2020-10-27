@csrf
  <div class="form-group row">
    <div class="col-sm-6 mb-3 mb-sm-0">
        <label for="nom" class="col-form-label text-md-right">{{ __('Nom') }}</label>
        <input id="nom" type="text" class="form-control form-control-user @error('nom') is-invalid @enderror" name="nom" value="{{ isset ($user) ? $user->name : old('nom') }}"  autocomplete="nom" autofocus>
        @error('nom')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col-sm-6">
        <label for="pseudo" class="col-form-label text-md-right">{{ __('Pseudo') }}</label>
        <input id="pseudo" type="text" class="form-control form-control-user @error('pseudo') is-invalid @enderror" name="pseudo" value="{{ isset ($user) ? $user->pseudo : old('pseudo') }} "  autocomplete="pseudo" autofocus>
        @error('pseudo')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-6 mb-3 mb-sm-0">
        <label for="email" class="col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
        <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ isset ($user) ? $user->email : old('email') }}" autocomplete="email" autofocus>
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col-sm-6">
        <label for="fonction" class="col-form-label text-md-right">{{ __('Profession') }}</label>
        <input id="fonction" type="text" class="form-control form-control-user @error('fonction') is-invalid @enderror" name="fonction" value="{{ isset ($user) ? $user->fonction : old('fonction') }}"  autocomplete="fonction" autofocus>
        @error('fonction')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-6 mb-1 mb-sm-0">
        <label for="" class="mt-3">Rôle de l'utilisateur </label>
        <select name="role" id="" class="custom-select custom-select-user  @error ('role') is-invalid @enderror">
            <option disabled selected>Choisir un rôle ...</option>
            <option value="0" {{isset($user) && $user->role=="0" ? 'selected' : ''}}>Utilisateur</option>
            <option value="1" {{isset($user) && $user->role=="1" ? 'selected' : ''}}>Administrateur</option>
            <option value="2" {{isset($user) && $user->role=="2" ? 'selected' : ''}}>Editeur</option>
            <option value="4" {{isset($user) && $user->role=="4" ? 'selected' : ''}}>Super Admin</option>
{{--
            <option value="2" {{isset($user) && $user->role=="2" ? 'selected' : ''}}>{{$user->role}}</option>
            <option value="1" {{isset($user) && $user->role=="1" ? 'selected' : ''}}>{{$user->role}}</option>
        <option value="4" {{isset($user) ?? $user->role=="4" ? 'selected' : ''}}>{{$user->role}}</option> --}}
        </select>
        @error ('role')
        <div class="invalid-feedback">
            {{$message}}
        </div>
       @enderror
    </div>
    <div class="col-sm-6">
    </div>
  </div>
  <hr>
