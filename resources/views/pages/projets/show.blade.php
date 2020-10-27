@extends('layouts.layoutUser', ['page' => 'Projects'])

@section('content')

<style type="">
 .size2{
   font-size: 1.2em
 }
 .size3{
   font-size: 1.3em
 }
 .size6{
   font-size: 1.6em
 }
</style>
<hr class="orange pb-2 pt-0 mt-0" >
</header>
<section class="mt-">
 <div class="container">
 <p class="size3"><a href="{{route('accueil')}}"><span class="green-text font-weight-bold">AgroCam237</span> </a> <i class="fas fa-angle-right"></i> <a href="{{route('projects')}}"><span class="green-text font-weight-bold"> Projet </span> </a> <i class="fas fa-angle-right"></i> <span class="grey-text text-uppercase">{{$projets->libelle}} </span></p>
   <hr>

 <div class="row mt-5 d-flex align-items-center">
   <div class="col-lg-3">
     <div class="text-center my-3">
        @foreach ($user as $item)


        <?php if ($item->profile_path): ?>
            <img src="{{asset($item->profile_path)}}" class="rounded-circle  img-fluid w-50"  alt="{{$item->image}}">
        <?php else: ?>
            <img src="{{asset('img/utilities/default.png')}}" class="rounded-circle  img-fluid w-50"  alt="default.png">
        <?php endif ?>
     </div>
     <p class="text-center font-weight-bold size2 animated wow fadeIn">Responsable du Projet</p>
     <p class="font-weight-bold green-text text-center size3 animated wow fadeIn">
        {{$item->name}}
     </p>
     <hr>
     <div class="row ">
      <div class="col-lg-12 col-sm-6 col-6 animated wow fadeIn">
       <p>
         <span class="font-weight-bold">Région</span> {{$item->region}} <br>
         <span class="font-weight-bold">Département</span> {{$item->departement}}<br>
         <span class="font-weight-bold">Ville/Localité</span> {{$item->ville}}
       </p>
       <hr>
     </div>
     <div class="col-lg-12 col-sm-6 col-6 animated wow fadeIn">
       <span class="font-weight-bold">E-mail:</span>{{$item->email}} <br>
       <span class="font-weight-bold">Tel:</span>  <?= trim($item->phone) != "" ? $item->phone : "-- --"; ?><br>
       <span class="font-weight-bold green-text"><i class="fab fa-whatsapp"></i> Whatsapp: </span> {{$item->whatsapp}}
       <hr>
     </div>
   </div>

 </div>
 <div class="col-lg-9">
    <p class="font-weight-bold mx-5 text-center  size6">{{$projets->libelle}}</p>
    <div class="row mt-5 mb-4">
      <div class="col-lg-5">
       <p class="font-weight-bold"><i class="far fa-calendar-alt"></i> Posté le: {{$projets->created_at->format('d M Y à H:m:s')}} </p>
     </div>
     <div class="col-lg-6 text-right">
      <p class="font-weight-bold size2">
        <span class="green-text font-weight-bold"><i class="far fa-eye"></i> 25</span>
        J'aime <i class="far fa-thumbs-up"></i> <span class="green-text font-weight-bold"> 25</span>
        Je n'aime <i class="far fa-thumbs-down"></i> <span class="green-text font-weight-bold"> 25</span>
      </p>
    </div>
  </div>
  <div class="text-center">
  <img src="{{asset($projets->image_path)}}" class="img-fluid w-100 animated wow fadeIn" style="max-height: 50vh" alt="{{$projets->image}}">
  </div>
   <p class="text-justify size2 mt-5 animated wow fadeIn" data-wow-delay="0.6s">
    {{$item->description}}
   </p>
 </div>
</div>
<div class="row">
 <div class="col-lg-3">
      <div id="carousel-example-multi" class="carousel slide carousel-multi-item v-2 mt-3" data-ride="carousel">
      <p class="text-center font-weight-bold orange-text size3">Projets Similaire</p>
      <div class="carousel-inner v-2" role="listbox">
        <div class="carousel-item active">
          <div class="col-12 col-md-12">
            <div class="card mb-2">
              <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/img (36).jpg"
                alt="Card image cap">
              <div class="card-body">
                <h4 class="card-title font-weight-bold">Card title</h4>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                  card's content.</p>
                <a class="btn btn-primary btn-md btn-rounded">Button</a>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="col-12 col-md-12">
            <div class="card mb-2">
              <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/img (34).jpg"
                alt="Card image cap">
              <div class="card-body">
                <h4 class="card-title font-weight-bold">Card title</h4>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                  card's content.</p>
                <a class="btn btn-primary btn-md btn-rounded">Button</a>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="col-12 col-md-12">
            <div class="card mb-2">
              <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/img (38).jpg"
                alt="Card image cap">
              <div class="card-body">
                <h4 class="card-title font-weight-bold">Card title</h4>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                  card's content.</p>
                <a class="btn btn-primary btn-md btn-rounded">Button</a>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="col-12 col-md-12">
            <div class="card mb-2">
              <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/img (29).jpg"
                alt="Card image cap">
              <div class="card-body">
                <h4 class="card-title font-weight-bold">Card title</h4>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                  card's content.</p>
                <a class="btn btn-primary btn-md btn-rounded">Button</a>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="col-12 col-md-12">
            <div class="card mb-2">
              <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/img (30).jpg"
                alt="Card image cap">
              <div class="card-body">
                <h4 class="card-title font-weight-bold">Card title</h4>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                  card's content.</p>
                <a class="btn btn-primary btn-md btn-rounded">Button</a>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="col-12 col-md-12">
            <div class="card mb-2">
              <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/img (27).jpg"
                alt="Card image cap">
              <div class="card-body">
                <h4 class="card-title font-weight-bold">Card title</h4>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                  card's content.</p>
                <a class="btn btn-primary btn-md btn-rounded">Button</a>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>
 <div class="col-lg-9">
    <p class="green-text font-weight-bold">Pièces Jointes: </p>
   <hr>
   @if (count($projets->fichier)==0)
   <p class="text-warning text-center font-weight-bold my-2">
       Aucun pièce jointe pour ce projet !!
   </p>
   @endif
   <p class="text-justify text-muted size3 animated wow fadeIn">
       <div class="row">
        @foreach ($projets->fichier as $fichier)
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="d-flex text-center  justify-content-center align-items-center">
                        <?php if($fichier->type == 'Image') { ?>
                            <a href="{{asset($fichier->file_path)}}" title="Ouvrir l'image " target="_blank">
                                <img src="{{asset($fichier->file_path)}}" width="100px" class="img-fluid" alt="image_{{$fichier->nom}}">
                            </a>
                        <?php } ?>
                        <?php if ($fichier->type == 'Video'): ?>
                            <video  preload='auto' controls width="300" height="120" >
                            <source src="{{asset($fichier->file_path)}}" type="video/mp4">
                            <source src="{{asset($fichier->file_path)}}" type="video/mpeg">
                            <source src="{{asset($fichier->file_path)}}" type="video/avi">
                            <source src="{{asset($fichier->file_path)}}" type="video/3gp">
                            </video>
                        <?php endif ?>

                        <?php if ($fichier->type == 'Fichier'): ?>
                                <a href="{{asset($fichier->file_path)}}" title="Ouvrir le document" target="_blank"><img src="{{asset('img/Files.png')}}" width="100px" class="img-fluid"  ></a>
                        <?php endif ?>
                </div>
                <p class="text-muted font-weight-bold text-center">{{$fichier->title}}</p>

            </div>
        @endforeach
       </div>
   </p>
   <hr>
   <p class="black-text font-weight-bold my-4 animated wow fadeIn" style="font-size: 1.4em">Liste des commentaires <span class="badge badge-warning">{{count($comments)}}</span> : </p>
   @if (count($comments)==0)
   <p class="text-warning text-center font-weight-bold my-5">
       Aucun commentaire disponible !!
   </p>
   @endif
   <div style="overflow-y: scroll; overflow-x: hidden; height: <?= count($comments) >= 5 ?"700px":"";  ?>;">
   @foreach ($comments as $comment)
   <div class="media animated wow fadeIn">
    <div class="row">
     <div class="col-lg-3 text-center">
        <?php if ($comment->profile_path): ?>
            <img src="{{asset($comment->profile_path)}}" class="rounded-circle w-50 img-fluid avatar z-depth-1-half mb-3"  alt="{{$comment->image}}">
        <?php else: ?>
            <img src="{{asset('img/utilities/default.png')}}" class="rounded-circle w-50 img-fluid avatar z-depth-1-half mb-3"  alt="default.png">
        <?php endif ?>
      <p>
        <?php if ($comment->role==4): ?>
            <span class="badge-danger badge">Admin</span></p>
        <?php else: ?>
            <span class="badge-primary badge">Member</span></p>
        <?php endif ?>
     </div>
     <div class="col-lg-9">
       <div class="media-body  p-2" style="width: 600px">
       <p class="mt-0 font-weight-bold orange-text"><span class="h4">{{$comment->name}}</span> <span class="float-right green-text"><i class="fas fa-user-tag"></i> {{$comment->fonction}}</span></p>
      <hr class="w-100">
      <p class="text-justify w-responsive w-100">{{$comment->message}}.</p>
      <hr class="w-100">
      <p class="pull-right"><i class="fas fa-clock"></i> <span class="font-weight-bold">Posté le:</span>{{$comment->creation}} </p>
    </div>
     </div>
    </div>
  </div>
  <hr class="grey mb-5">
  @endforeach
</div>
  <p class="black-text font-weight-bold mb-4" style="font-size: 1.4em">Laisser un commentaire:</p>
  <div class="mb-3 card p-5">
  <div class="container ">
        <div class="">
            @include('includes.messageflash')
        </div>
  </div>
    {{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif  --}}
  <form action="{{route('comment')}}" method="POST">
    @csrf
     <input type="hidden" name="projet_id" value="{{$item->id}}">
      @if (!Auth::user())
        <div class="form-group">
            <label for="mailadress"  class="font-weight-bold">Adresse Email</label>
            <input type="email" name="email" class="form-control @error ('email') is-invalid @enderror" id="mailadress" value="{{old('email')}}">
             @error ('email')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
      @endif

      <div class="form-group green-border-focus">
        <label for="messages" class="font-weight-bold">Votre message</label>
        <textarea class="form-control @error ('message') is-invalid @enderror"  id="messages" name="message" length="450" rows="5">{{old('message')}}</textarea>
         @error ('message')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
      </div>
      <p class="text-center"><span class="font-weight-bold">NB:</span> Attention !! Vous devrez être inscrit avant de laisser un commentaire. Si vous n'êtes pas, cliquez sur <a href="">S'incrire</a></p>
      <center>
        <button class="btn btn-orange">Envoyer</button>
      </center>
    </form>
  </div>
</div>
</div>
@endforeach

</div>
</section>

@endsection
