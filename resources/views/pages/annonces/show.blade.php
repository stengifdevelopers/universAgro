@extends('layouts.layoutUser', ['page' => 'Annonces'])

@section('content')

<hr class="orange pb-2 pt-0 mt-0" >
</header>
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
<section class="mt-">
 <div class="container">
 <p class="size3"><a href="{{route('accueil')}}"><span class="green-text font-weight-bold">Univers Agro 237</span> </a> <i class="fas fa-angle-right"></i> <a href="{{route('annonces')}}"><span class="green-text font-weight-bold"> Projet </span> </a> <i class="fas fa-angle-right"></i> <span class="text-grey">{{$annonces->titre}} </span></p>
   <hr>
 <p class="font-weight-bold mx-5 text-center size6">{{$annonces->titre}}</p>
   <div class="row mb-4">
     <div class="col-lg-4">
      <p class="font-weight-bold"><i class="far fa-calendar-alt"></i> {{$annonces->created_at->format('d M Y à H:m:s')}}</p>
    </div>
    <div class="col-lg-7 text-right">
     <p class="font-weight-bold size2">
       <span class="green-text font-weight-bold"><i class="far fa-eye"></i> 25</span>
       J'aime <i class="far fa-thumbs-up"></i> <span class="green-text font-weight-bold"> 25</span>
       Je n'aime <i class="far fa-thumbs-down"></i> <span class="green-text font-weight-bold"> 25</span>
     </p>
   </div>
 </div>
 <div class="text-center">
  <?php if($annonces->typ_fichier == 'Image') { ?>
    <a href="{{asset($annonces->fichier_path)}}" target="_blank">
        <img src="{{asset($annonces->fichier_path)}}" class="img-fluid w-100 animated wow fadeIn" style="max-height:60vh" alt="image_<?=$annonces->fichier?>">
    </a>
  <?php } ?>
  <?php if ($annonces->typ_fichier == 'Video'): ?>
    <video  preload='auto' controls width="300" height="120" >
      <source src="{{asset($annonces->fichier_path)}}" type="video/mp4">
      <source src="{{asset($annonces->fichier_path)}}" type="video/mpeg">
      <source src="{{asset($annonces->fichier_path)}}" type="video/avi">
      <source src="{{asset($annonces->fichier_path)}}" type="video/3gp">
    </video>
  <?php endif ?>

  <?php if ($annonces->typ_fichier == 'Fichier'): ?>
        <a href="{{asset($annonces->fichier_path)}}" target="_blank"><img src="img/Files.png" class="img-fluid w-100 animated wow fadeIn text-center"></a>
  <?php endif ?>
   {{-- <img src="{{asset('img\Ban_blog.jpg')}}" class="img-fluid w-100 animated wow fadeIn"> --}}
 </div>
 <div class="mt-5">
   <p class="text-justify size2 mt-5 animated wow fadeIn" data-wow-delay="0.6s">
    {{$annonces->contenu}}
   </p>
</div>
<p class="font-weight-bold green-text mt-4"> Articles Similaires</p>
<hr>
@if (count($similar)==0)
   <p class="text-warning text-center font-weight-bold my-3">
       Aucune annonce similaire disponible !!
   </p>
@endif
@foreach ($similar as $imilars)
<div class="col-lg-8 mb-3">
  @foreach ($annonces as $item)
   <div class="card mb-3 wow fadeIn Up" >
      <div class="row no-gutters">
        <div class="col-md-5">
          <?php if($item->typ_fichier == 'Image') { ?>
              <a href="{{asset($item->fichier_path)}}" target="_blank">
                  <img src="{{asset($item->fichier_path)}}" class="card-img img-fluid h-100" alt="image_<?=$item->fichier?>">
              </a>
            <?php } ?>
            <?php if ($item->typ_fichier == 'Video'): ?>
              <video  preload='auto' controls width="300" height="120" >
                <source src="{{asset($item->fichier_path)}}" type="video/mp4">
                <source src="{{asset($item->fichier_path)}}" type="video/mpeg">
                <source src="{{asset($item->fichier_path)}}" type="video/avi">
                <source src="{{asset($item->fichier_path)}}" type="video/3gp">
              </video>
            <?php endif ?>

            <?php if ($item->typ_fichier == 'Fichier'): ?>
                  <a href="{{asset($item->fichier_path)}}" target="_blank"><img src="img/Files.png" class="card-img img-fluid h-100"></a>
            <?php endif ?>
          {{-- <img src="{{asset('img\utilities\vignette_case_tuto.jpg')}}" class="card-img img-fluid h-100" alt="..."> --}}
        </div>
        <div class="col-md-7">
          <div class="card-body h-100 pb-5">
          <h4 class="card-title text-uppercase  font-weight-bold">{{$item->titre}}</h4>
            <p class="card-text  text-justify" style="font-size: 1.2em">
              @php
              $description=$item->contenu;
             if (strlen($description  )>70) 
                 {
                 $description=substr($description, 0, 70);
                 $dernier_mot=strrpos($description," ");
                 $description=substr($description,0,$dernier_mot)."...";
                 }
            @endphp 
                {{$description}}
            </p>
            <p class="card-text "><small class="black-text font-weight-bold "><span class="grey-text"> <i class="fas fa-business-time"></i> Posté le:</span> {{$item->created_at->format('d M Y à H:m:s')}}</small></p>
            <span class="float-right mr-3 "><a href="{{route('announce_details', $item)}}" ><button class="btn btn-sm btn-warning text-uppercase font-weight-bold"><i class="fas fa-arrow-right"></i> Consulter</button></a></span>
          </div>
        </div>
      </div>
   </div>
  @endforeach
  </div> 
@endforeach

</div>
</section>

@endsection