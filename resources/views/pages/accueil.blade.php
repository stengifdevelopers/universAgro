@extends('layouts.layoutUser', ['page' => 'Accueil'])

@section('content')
<div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100 img-fluid" src="{{asset('img\utilities\Slide_principal.jpg')}}"
          alt="First slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100 img-fluid" src="{{asset('img\utilities\Slide_principal.jpg')}}"
          alt="Second slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100 img-fluid" src="{{asset('img\utilities\Slide_principal.jpg')}}"
          alt="Third slide">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>
<div class="container">
    <div class="row mt-5">
        <div class="col-lg-8 mb-3">
         <div class="grey rounded lighten-3 mb-4">
             <p class="text-warning py-2 ml-3 text-uppercase  font-weight-bold">Tutoriels
                 <span class="float-right mr-3"><a href="">Voir plus</a></span>
             </p>
         </div>
         <div class="card mb-3 wow fadeIn Up" >
            <div class="row no-gutters">
              <div class="col-md-5">
                <img src="{{asset('img\utilities\vignette_case_tuto.jpg')}}" class="card-img img-fluid h-100" alt="...">
              </div>
              <div class="col-md-7">
                <div class="card-body green h-100 pb-5">
                  <h4 class="card-title text-uppercase text-white font-weight-bold">Elevage des Bovins</h4>
                  <p class="card-text text-white text-justify" style="font-size: 1.2em">This lead-in to additional content. This content is a little bit longer.</p>
                  <p class="card-text "><small class="text-white"><i class="fas fa-business-time"></i> Posté le: 20 May 2020</small></p>
                  <span class="float-right mr-3 "><a href="" ><span class="text-white text-uppercase font-weight-bold"><i class="fas fa-arrow-right"></i> Afficher</span></a></span>
                </div>
              </div>
            </div>
         </div>
         <div class="grey rounded lighten-3 mb-4 wow fadeIn Up">
            <p class="text-warning py-2 ml-3 text-uppercase  font-weight-bold">projets
            <span class="float-right mr-3"><a href="{{route('projects')}}">Voir plus</a></span>
            </p>
        </div>
        @foreach ($projets as $projet)
        <div class="card mb-3 wow fadeIn Up" >
            <div class="row no-gutters">
                <div class="col-md-5">
                <img src="{{asset($projet->image_path)}}" class="card-img img-fluid h-100" style="font-size: cover; max-height: 250px" alt="{{$projet->image}}">
                </div>
                <div class="col-md-7">
                <div class="card-body pb-5" style="background-color: #b06c21; height: 100% ">
                <h4 class="card-title text-uppercase text-white font-weight-bold">
                    @php
                    $description=$projet->libelle;
                  if (strlen($description  )>50) 
                      {
                      $description=substr($description, 0, 50);
                      $dernier_mot=strrpos($description," ");
                      $description=substr($description,0,$dernier_mot)."...";
                      }
                  @endphp 
                      {{$description }}
                </h4>
                    <p class="card-text text-white text-justify" style="font-size: 1.2em">
                        @php
                            $description=$projet->description;
                        if (strlen($description  )>80)
                            {
                            $description=substr($description, 0, 80);
                            $dernier_mot=strrpos($description," ");
                            $description=substr($description,0,$dernier_mot)."...";
                            }
                        @endphp
                            {{$description}}
                    </p>
                    <p class="card-text "><small class="text-white"><i class="fas fa-business-time"></i> Posté le: {{$projet->created_at->format('d M Y à H:m:s')}}</small></p>
                     <span class="float-right mr-3 "><a href="{{route('show', $projet)}}" ><span class="text-white text-uppercase font-weight-bold"><i class="fas fa-arrow-right"></i> Afficher</span></a></span>
                </div>
                </div>
            </div>
        </div>
        @endforeach
        <div class="grey rounded lighten-3 mb-4 wow fadeIn Up">
            <p class="text-warning py-2 ml-3 text-uppercase  font-weight-bold">boutiques
                <span class="float-right mr-3"><a href="{{route('articles')}}">Voir plus</a></span>
            </p>
        </div>
        <div class="row">
            @foreach ($articles as $shop)
            <div class="col-lg-4 col-md-6 mb-3 wow fadeIn Up">
                <div class="card">
                    <div class="view">
                        <img src="{{asset($shop->fichier_path)}}" class="card-img-top img-fluid" style="height: 20vh" alt="{{$shop->fichier}}">

                    {{-- <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/food.jpg" alt="Card image cap"> --}}
                    <a href="{{route('article_details', $shop)}}">
                        <div class="mask rgba-white-slight d-flex align-items-center justify-content-end">
                            @php if($shop->pourcentRed != 0 )
                              echo '<span class="red py-2 px-3 white-text font-weight-bold" style="opacity: 0.8"> -'.$shop->pourcentRed.' %</span>';
                            @endphp
                        </div>
                    </a>
                    </div>
                    <div class="card-body text-center">
                    <a href="{{route('article_details', $shop)}}">
                     <h5 class="card-title orange-text font-weight-bold text-center" style="height:35px">
                        @php
                        $description=$shop->nom;
                       if (strlen($description  )>20)
                           {
                           $description=substr($description, 0, 19);
                           $dernier_mot=strrpos($description," ");
                           $description=substr($description,0,$dernier_mot)."...";
                           }
                      @endphp
                          {{$description}}
                     </h5>
                    </a>
                    <hr>
                    <div class="d-flex justify-content-center">
                        <?php if ($shop->prixRabais!=0): ?>
                            <span class="text-center green-text font-weight-bold"> {{$shop->prixRabais}} FCFA</span>
                            <span class="text-center text-muted font-weight-bold ml-3"><del>{{$shop->prix}} FCFA</del></span>
                        <?php else: ?>
                            <span class="text-center green-text font-weight-bold"> {{$shop->prix}} FCFA</span>
                        <?php endif ?>
                    </div>
                    </div>
                    {{-- <div class="rounded-bottom mdb-color lighten-3 text-center pt-3">
                    <ul class="list-unstyled list-inline font-small">
                        <li class="list-inline-item pr-2 white-text"><i class="far fa-clock pr-1"></i>05/10/2015</li>
                        <li class="list-inline-item pr-2"><a href="#" class="white-text"><i
                            class="far fa-comments pr-1"></i>12</a></li>
                    </ul>
                    </div> --}}
                </div>
            </div>
            @endforeach
        </div>
        </div>
        <div class="col-lg-4">
            <div class="green rounded mb-4">
                <p class="text-white py-2 ml-3 text-uppercase text-center font-weight-bold">ANNONCES
                </p>
            </div>
            @foreach ($annonces as $annonce)
            <div class="card mb-3 wow fadeIn Up">
                <div class="view overlay">
                    <?php if($annonce->typ_fichier == 'Image') { ?>
                        <a href="{{asset($annonce->fichier_path)}}" target="_blank">
                            <img src="{{asset($annonce->fichier_path)}}" class="card-img-top img-fluid h-100" alt="image_<?=$annonce->fichier?>">
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
                            <a href="{{asset($annonce->fichier_path)}}" target="_blank"><img src="img/Files.png" class="card-img-top img-fluid h-100"></a>
                      <?php endif ?>
                <a>
                    <div class="mask rgba-white-slight"></div>
                </a>
                </div>
                <div class="card-body">
                <h5 class="card-title font-weight-bold text-justify">
                    @php
                    $description=$annonce->titre;
                   if (strlen($description  )>80)
                       {
                       $description=substr($description, 0, 80);
                       $dernier_mot=strrpos($description," ");
                       $description=substr($description,0,$dernier_mot)."...";
                       }
                  @endphp
                      {{$description}}
                </h5>
                <a href="{{route('annonces')}}"><small class="pull-right"><i class="fas fa-angle-double-right"></i> View more</small></a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
