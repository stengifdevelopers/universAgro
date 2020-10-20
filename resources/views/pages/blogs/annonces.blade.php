@extends('layouts.layoutBlog', ['page' => 'Blogs'])

@section('content')

<div class="container mt-4">
    @if (count($annonces)==0)
        <p class="text-warning text-center font-weight-bold my-3">
            Aucune annonce disponible !!
        </p>
    @endif
    <div class="col-md-12 col-lg-12 mb-2">
         @foreach ($annonces as $annonce)
           <div class="col-lg-12">
            <div class="row">
                <div class="col-md-4 col-lg-4 align-items-center d-flex justify-content-center">
                    <?php if($annonce->typ_fichier == 'Image') { ?>
                        <a href="{{asset($annonce->fichier)}}" target="_blank">
                            <img src="{{asset($annonce->fichier_path)}}" class="img-fluid  d-block w-100" alt="<?=$annonce->fichier?>">
                        </a>
                      <?php } ?>
                      <?php if ($annonce->typ_fichier == 'Video'): ?>
                        <video  preload='auto' controls width="300" height="120" >
                          <source src="{{asset($annonce->fichier_path)}}" type="video/mp4">
                          <source src="{{asset($annonce->fichier_path)}}" type="video/mpeg">
                          <source src="{{asset($annonce->fichier_path)}}" type="video/avi">
                          <source src="{{asset($annonce->fichier_path)}}" type="video/3gp">
                        </video>
                      <?php endif ?>
    
                      <?php if ($annonce->typ_fichier == 'Fichier'): ?>
                            <a href="{{asset($annonce->fichier_path)}}" target="_blank"><img src="img/Files.png" class="w-50 img-fluid"></a>
                      <?php endif ?>
                    {{-- <img  src="{{asset('img/utilities/verture.png')}}" class="img-fluid  d-block w-100" alt="zoom" style="height: 200px"> --}}
                </div>
                <div class="col-md-8 col-lg-8 text-left p-2">
                <h3 class="grey-text  font-weight-bold mb-2">{{$annonce->titre}}</h3>
                    <hr class=" mb-2 grey">
                    <p class=" text-muted h5 text-justify">
                        {{$annonce->contenu}}
                    </p>
                    @if ($annonce->type_announce==1)
                        <p class=" black-text h5 mt-3"><span class="font-weight-bold"><u>Localisation</u>:</span> {{$annonce->localisation}} </p>
                        <p class=" black-text h5"><span class="font-weight-bold"><u>Superficie</u>:</span> {{$annonce->superficie}} </p>
                        <p class=" black-text h5"><span class="font-weight-bold"><u>Prix</u>:</span> {{$annonce->price}} FCFA</p>
                    @endif
                    @if ($annonce->type_announce==0)
                      @if ($annonce->source)
                          <p class=" black-text text-left"><span class="font-weight-bold blue-text">Source: </span> {{$annonce->source}} </p>
                      @endif 
                      @if ($annonce->editeur)
                          <p class=" black-text float-right"><span class="font-weight-bold blue-text">Editeur: </span> {{$annonce->editeur}} </p><br>
                      @endif
                       @endif
                    <p class="text-right text-muted mt-4 font-weight-bold"><span class="black-text"> Posté le:</span>{{$annonce->created_at->format('d M Y à H:m:s')}}</p>
                </div>  
            </div>
        </div>
        <hr class=" mb-4"  style="height: 1px;   background-color: rgb(0,166,80);"> <br>

        @endforeach
    </div>
    
	</div>

@endsection