@extends('layouts.layoutUser')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5">
            {{-- <div class="text-center mt-5">
                <span>
                    Authentification requise ...
                </span>
            </div> --}}
            <div class="card">
                <div class="card-header">
                    <div class="text-center">
                        <img src="{{asset('img/Logo_header.png')}}" class="img-fluid rounded-circe">
                    </div>
                </div>

                <div class="card-body">
                @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('inscription.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                               <div class="form-group">
                                    <label for="nom" class="col-form-label text-md-right">{{ __('Nom') }}</label>
                                    <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ old('nom') }}"  autocomplete="nom" autofocus>

                                    @error('nom')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                    <div class="form-group">
                                         <label for="pseudo" class="col-form-label text-md-right">{{ __('Pseudo') }}</label>
                                         <input id="pseudo" type="text" class="form-control @error('pseudo') is-invalid @enderror" name="pseudo" value="{{ old('pseudo') }}"  autocomplete="pseudo" autofocus>

                                         @error('pseudo')
                                             <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                         @enderror
                                     </div>
                             </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                              <div class="form-group">
                                   <label for="pwd" class="col-form-label text-md-right">{{ __('Mot de passe') }}</label>
                                   <input id="pwd" type="password" class="form-control @error('pwd') is-invalid @enderror" name="pwd" value="{{ old('pwd') }}"  autocomplete="pwd" autofocus>

                                   @error('pwd')
                                       <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                       </span>
                                   @enderror
                               </div>
                            </div>
                            <div class="col-lg-6">
                               <div class="form-group">
                                   <label for="pwdC" class="col-form-label text-md-right">{{ __('Confirmer mot de passe') }}</label>
                                   <input id="pwdC" type="password" class="form-control @error('pwdC') is-invalid @enderror" name="pwd_confirmation" autocomplete="pwd" autofocus>

                                   @error('pwdC')
                                       <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                       </span>
                                   @enderror
                               </div>
                            </div>
                          </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="email" class="col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                        <label for="fonction" class="col-form-label text-md-right">{{ __('Profession') }}</label>
                                        <input id="fonction" type="text" class="form-control @error('fonction') is-invalid @enderror" name="fonction" value="{{ old('fonction') }}"  autocomplete="fonction" autofocus>

                                        @error('fonction')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                        </div>
                    
                        <div class="form-group row">
                          
                        </div>
                        <p class="text-center text-default">Après la création de votre compte, veuillez completer votre profil  !!</p>  
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-warning">
                                    {{ __('S\'inscrire') }}
                                </button>
                                    <a class="bt btn-link" href="{{ route('blogs.index') }}">
                                        {{ __('Déja inscrit? Créer mon blog') }}
                                    </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
