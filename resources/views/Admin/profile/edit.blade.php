@extends('layouts.layoutAdmin')


@section('content')

{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> --}}
<style>
  .decor{
      text-decoration: orangered;
  }
</style>
<div class="container bootstrap snippet">
    <div class="row">
    <div class="col-sm-10"><h4><a  href="{{route('index')}}"><span class="decor">Home</span></a> / <a class="decor" href="{{route('profile.index')}}">Profile</a> / <a class="decor" href="#">Edit Profile</a></h4></div>
    	<div class="col-sm-2"><a href="/users" class="pull-right"><img title="profile image" class="rounded-circle img-fluid" src="http://www.gravatar.com/avatar/28fd20ccec6865e2d5f0e1f4446eb7bf?s=100"></a></div>
    </div>
    <div class="row">
  		<div class="col-lg-3"><!--left col-->


      <div class="text-center">
        <?php if ($profile->profile_path): ?>
            <a href="{{$profile->profile_path}}"><img src="{{asset($profile->profile_path)}}"  class="w-100  rounded-circle img-fluid img-thumbnail" style="height: 250px" alt="{{$profile->image}}"></a>
        <?php else: ?>
            <a href=""><img src="{{asset('img/utilities/default.png')}}"  class="w-100  rounded-circle img-fluid img-thumbnail" style="height: 250px" alt="default.png"></a>
        <?php endif ?>
       {{-- http://ssl.gstatic.com/accounts/ui/avatar_2x.png   --}}
    </div>


          {{-- <div class="panel panel-default">
            <div class="panel-heading">Website <i class="fa fa-link fa-1x"></i></div>
            <div class="panel-body"><a href="http://bootnipets.com">bootnipets.com</a></div>
          </div>
       --}}
        </div><!--/col-3-->
    	<div class="col-lg-9">
          <div class="tab-content">
            <div class="tab-pane active" id="home">
                  <form action="{{route('profile.update', $profile->id)}}" method="POST" enctype="multipart/form-data" >
                    @method('PATCH')
                    @csrf
                    <div class="row">
                      <div class="col-lg-6">
                          <div class="form-group">
                              <label for="first_name"><h5>Nom</h5></label>
                              <input type="text" class="form-control @error ('name') is-invalid @enderror" name="name" value="{{ isset ($user) ? $user->name : old('name') }} " id="first_name"  title="enter your name if any.">
                              @error ('name')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                              @enderror
                          </div>
                      </div>
                      <div class="col-lg-6">
                          <div class="form-group">
                            <label for="last_name"><h5>Pseudo</h5></label>
                              <input type="text" name="pseudo" class="form-control @error ('pseudo') is-invalid @enderror" value="{{ isset ($user) ? $user->pseudo : old('pseudo') }} " name="pseudo" id="last_name" title="enter your pseudo if any.">
                              @error ('pseudo')
                              <div class="invalid-feedback">
                                  {{$message}}
                              </div>
                              @enderror
                            </div>
                      </div>
                      <div class="col-lg-6 mb-2">
                        <label for="phone" class="h5">Numéro télephone</label>
                        <div class="input-group input-group-seamless" data-children-count="1">
                            <div class="input-group-prepend">
                            <div class="input-group-text" data-children-count="0">
                                <i class="fas fa-phone-volume"></i>
                            </div>
                            </div>
                            <input type="number" value="{{ isset ($profile) ? $profile->phone : old('phone') }}" class="form-control @error ('phone') is-invalid @enderror" id="phone" name="phone" data-kwimpalastatus="alive" data-kwimpalaid="1582069334786-8">
                            @error ('phone')
                             <div class="invalid-feedback">
                                {{$message}}
                             </div>
                            @enderror
                        </div>
                      </div>
                      <div class="col-lg-6 mb-2">
                        <label for="socialGoogle" class="h5">Adresse Email</label>
                        <div class="input-group input-group-seamless" data-children-count="1">
                          <div class="input-group-prepend">
                            <div class="input-group-text" data-children-count="0">
                              <i class="fab fa-google-plus-g"></i>
                            </div>
                          </div>
                          <input type="email" name="email" value="{{ isset ($user) ? $user->email : old('email') }}" class="form-control @error ('email') is-invalid @enderror" id="socialGoogle" data-kwimpalastatus="alive" data-kwimpalaid="1582069334786-9">
                          @error ('email')
                          <div class="invalid-feedback">
                              {{$message}}
                          </div>
                        @enderror
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                            <label for="region"><h5>Région</h5></label>
                            <input type="text" value="{{ isset ($profile) ? $profile->region : old('region') }}" class="form-control" name="region" id="region"  title="enter your region if any.">
                            @error ('region')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                          @enderror
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                            <label for="departement"><h5>Département</h5></label>
                            <input type="text" class="form-control" value="{{ isset ($profile) ? $profile->departement : old('departement') }}" name="departement" id="departement"  title="enter your subdivision if any.">
                            @error ('departement')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                          @enderror
                        </div>
                      </div>
                      <div class="form-group col-lg-6">
                        <label for="ville" class="h5">Ville</label>
                        <div class="input-group input-group-seamless" data-children-count="1">
                          <div class="input-group-prepend">
                            <div class="input-group-text" data-children-count="0">
                                <i class="fas fa-warehouse"></i>
                            </div>
                          </div>
                          <input type="text" value="{{ isset ($profile) ? $profile->ville : old('ville') }}" class="form-control" id="ville" name="ville" data-kwimpalastatus="alive" data-kwimpalaid="1582069334786-8">
                          @error ('ville')
                          <div class="invalid-feedback">
                              {{$message}}
                          </div>
                        @enderror
                        </div>
                      </div>
                      <div class="form-group col-lg-6">
                        <label for="whatsapp" class="h5">Profession</label>
                        <div class="input-group input-group-seamless" data-children-count="1">
                          <div class="input-group-prepend">
                            <div class="input-group-text" data-children-count="0">
                                <i class="fas fa-briefcase"></i>
                            </div>
                          </div>
                          <input type="text" value="{{ isset ($user) ? $user->fonction : old('fonction') }}" name="fonction" class="form-control @error ('fonction') is-invalid @enderror" id="whatsapp" data-kwimpalastatus="alive" data-kwimpalaid="1582069334786-8">
                          @error ('fonction')
                          <div class="invalid-feedback">
                              {{$message}}
                          </div>
                        @enderror
                        </div>
                      </div>
                        <div class="form-group col-lg-6 ">
                          <label for="socialSlack" class="h5">Lien Facebook</label>
                          <div class="input-group input-group-seamless" data-children-count="1">
                            <div class="input-group-prepend">
                              <div class="input-group-text" data-children-count="0">
                                <i class="fab fa-facebook-f"></i>
                              </div>
                            </div>
                            <input type="text" name="facebook" value="{{ isset ($profile) ? $profile->facebook : old('facebook') }}" class="form-control @error ('facebook') is-invalid @enderror" id="socialSlack" data-kwimpalastatus="alive" data-kwimpalaid="1582069334786-7">
                            @error ('facebook')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                          @enderror
                        </div>
                        </div>
                        <div class="form-group col-lg-6">
                          <label for="whatsapp" class="h5">Numéro WhatsApp</label>
                          <div class="input-group input-group-seamless" data-children-count="1">
                            <div class="input-group-prepend">
                              <div class="input-group-text" data-children-count="0">
                                <i class="fab fa-whatsapp"></i>
                              </div>
                            </div>
                            <input type="number" name="whatsapp" value="{{ isset ($profile) ? $profile->whatsapp : old('whatsapp') }}" class="form-control" id="whatsapp" data-kwimpalastatus="alive" data-kwimpalaid="1582069334786-8">
                            @error ('whatsapp')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                          @enderror
                        </div>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="whatsapp" class="h5">Lien du site web</label>
                            <div class="input-group input-group-seamless" data-children-count="1">
                                <div class="input-group-prepend">
                                <div class="input-group-text" data-children-count="0">
                                    <i class="fas fa-globe"></i>
                                </div>
                                </div>
                                <input type="text" name="url" value="{{ isset ($profile) ? $profile->url : old('url') }}" class="form-control @error ('url') is-invalid @enderror" id="whatsapp" data-kwimpalastatus="alive" data-kwimpalaid="1582069334786-9">
                                @error ('url')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                              @enderror
                            </div>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="tof" class="h5">Photo de profil</label>
                            <input type="file" name="image" value="{{ isset ($profile) ? $profile->image : old('image') }}" id="tof" class="text-center center-block file-upload">
                        </div>
                        <div class="form-group col-lg-12">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea3">Biographie</label>
                                <textarea name="description" class="form-control text-justify @error ('description') is-invalid @enderror" id="exampleFormControlTextarea3" placeholder="Insérer une description" rows="7">{!! isset ($profile) ?  $profile->description : old('description')  !!}</textarea>
                                @error ('description')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                                </div>
                        </div>
                        <div class="col-lg-12 mb-5">
                            <div class="text-center mt-5">
                                <button class="btn btn-block btn-success">
                                    <i class="far fa-hdd"></i> Enregistrer
                                </button>
                            </div>
                      </div>
                    </div>
              	</form>
          </div><!--/tab-content-->
        </div><!--/col-9-->
    </div></div></div>
    @endsection
