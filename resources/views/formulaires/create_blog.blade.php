@extends('layouts.layoutUser')

@section('content')
<div class="container">
    <p class="text-center mx-5 card p-3 rounded mt-5" style="font-family: Cairo, sans-serif; font-size: 1.7em">
      Vous êtes sur le point de vouloir créer un blog. Suivez toutes les procédures et tous les détails. Pour annuler, veuillez juste sortir de la page.
    </p>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5">
            <div class="card">
                <div class="card-header">
                    <div class="text-center">
                        <img src="{{asset('img/logo.png')}}" class="img-fluid rounded-circe"  style="height:70px;widht:70px">
                    </div>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('blogs.store') }}">
                        @csrf
                       @if(!Auth::user())
                        <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="choix[]" value="1"  class="custom-control-input" id="defaultUnchecked" onclick="myFunction()" @if(is_array(old('choix')) && in_array(1, old('choix'))) checked @endif>
                                <label class="custom-control-label" for="defaultUnchecked">Je ne suis pas encore inscrit !</label>
                        </div>
                        @endif
                        <div id="text" style="visibility:hidden;height:0px">
                                <p><h2 class="orange text-center rounded">Informations personnelles</h2></p>
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
                                               <label for="" class="col-form-label text-md-right">{{ __('Mot de passe') }}</label>
                                               <input id="password" type="password" class="form-control @error('pwd') is-invalid @enderror" name="pwd" value="{{ old('pwd') }}"  autocomplete="pwd" autofocus>
                                               <span id='icon' onclick="affichePassword()" class="fas fa-fw fa-eye field-icon"></span>
                                               @error('pwd')
                                                   <span class="invalid-feedback" role="alert">
                                                       <strong>{{ $message }}</strong>
                                                   </span>
                                               @enderror
                                           </div>
                                        </div>
                                        <div class="col-lg-6">
                                           <div class="form-group">
                                               <label for="pwd_confirmation" class="col-form-label text-md-right">{{ __('Confirmer mot de passe') }}</label>
                                               <input id="pwd_confirmation" type="password" class="form-control @error('pwd_confirmation') is-invalid @enderror"  name="pwd_confirmation" autocomplete="pwd_confirmation" value="{{ old('pwd_confirmation') }}" autofocus>

                                               @error('pwd_confirmation')
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
                                    <p class="text-muted">Connectez-vous et completez votre profile une fois cette procedure terminée.</p>
                                    {{-- <hr class="red "> --}}
                        </div>
                        <p><h2 class="orange text-center rounded">Informations du blog</h2></p>
                        <div class="form-group" id="emailFirst">
                                <label for="email2" class="col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                                <input id="email2" type="email" class="form-control @error('email2') is-invalid @enderror" name="email2" value="{{ old('email2') }}"  autocomplete="email2" autofocus>

                                @error('email2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                            <label for="titre" class="col-form-label text-md-right">{{ __('Donnez un titre a votre blog') }}</label>
                            <input id="titre" type="text" class="form-control @error('titre') is-invalid @enderror" name="titre" value="{{ old('titre') }}"  autocomplete="titre" autofocus>

                            @error('titre')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <label for="sectAct" class="col-form-label text-md-right">{{ __('Secteur d\'activité') }}</label>
                        <select id='sectAct' class="browser-default custom-select custom-select-md mb-3" name="secteur" @error ('secteur') is-invalid @enderror>
                            <option disabled selected>Choisissez votre secteur d'activité</option>
                            <optgroup label="Agriculture">
                                <option value="Agriculture-Arboriculture">Arboriculture</option>
                                <option value="Agriculture-Cultures maraicheres">Cultures maraicheres</option>
                                <option value="Agriculture-Viticulture">Viticulture</option>
                            </optgroup>
                            <optgroup label="Elevage">
                                <option value="Elevage-Aulacodiculture">Aulacodiculture</option>
                                <option value="Elevage-Bovin">Bovin</option>
                                <option value="Elevage-Caprin">Caprin</option>
                                <option value="Elevage-Cuniculture">Cuniculture</option>
                                <option value="Elevage-Heliculture">Heliculture</option>
                                <option value="Elevage-Ovin">Ovin</option>
                                <option value="Elevage-Pisciculture">Pisciculture</option>
                                <option value="Elevage-Porciculture">Porciculture</option>
                            </optgroup>
                            <optgroup label="Agro-industries">
                              <option value="Transformation-Agroindustries">Industrie de transformation</option>
                            </optgroup>
                            <optgroup label="Autres">
                                <option value="Autres">Autres</option>
                            </optgroup>
                          </select>
                          @error ('secteur')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                          @enderror

                          <script>
                              // Material Select Initialization
                                $(document).ready(function() {
                                $('.mdb-select').materialSelect();
                                });
                            </script>

                        <div class="form-group">
                                <label for="exampleFormControlTextarea3">Decrivez en quelques mots votre blog</label>
                                <textarea name="description" class="form-control text-justify @error ('description') is-invalid @enderror" id="exampleFormControlTextarea3" placeholder="Insérer une description" rows="7">{!! isset ($emploi) ?  $emploi->description : old('description')  !!}</textarea>
                                @error ('description')
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </div>
                                @enderror
                        </div>
                        <div class="form-group mb-0">
                            <div class="text-center">
                                <button type="submit" class="btn btn-warning">
                                    {{ __('Créer') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
