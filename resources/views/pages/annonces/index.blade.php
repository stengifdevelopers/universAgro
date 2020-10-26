@extends('layouts.layoutUser', ['page' => 'Annonces'])

@section('content')
<div class="view  ">
	<img  src="{{asset('img/utilities/Ban_Anonces.jpg')}}" class="img-fluid  d-block w-100 mb-0" alt="zoom" >
	<div class="mask  waves-effect waves-light justify-content-center d-flex align-items-center">
		<div class="row ">
			<div class="col-md-12 text-center">
				<h2 class="white-text h2-responsive font-weight-bold text-uppercase mx-5" style="font-family:">Retrouvez les annonces appliquées aux secteurs agropastoraux</h2>
			</div>
			<div class="col-md-12">
				<hr class=" mb-4 "  style="height: 6px; width:200px;  background-color: white;">
			</div>
		</div>
	</div>
</div>
<ul class="nav  blue-grey lighten-5 px-5">
	<li class="nav-item pt-2" >
		<a class="nav-link"><h6 class=" black-text font-weight-bold">Annonces: {{count($annonces)}}</h6></a>
	</li>
	<li class="nav-item pt-2">
    <a class="nav-link" ><h6 class=" black-text font-weight-bold">Offres: <span class="green-text">{{count($offers)}}</span></h6></a>
	</li>
	<li class="nav-item pt-2 ">
		<a class="nav-link" ><h6 class=" black-text font-weight-bold">Agri-Actualité: <span class="green-text">{{count($actu)}}</span></h6></a>
    </li>
    <form action="{{ route('findAnnonce') }}" method="POST">
        @csrf
    <div class="nav-item d-flex justify-content-end align-items-end ml-5 pt-2 float-right">
        <div class="form-group ">
            <select name="type_announce" class="browser-default custom-select form-group-md" style="border-color: green; ">
                <option disabled selected>Trier par type</option>
                <option value="0">Actualité</option>
                <option value="1">Offre de service</option>
            </select>
        </div>
        <div class="form-group ml-3">
            <input class="form-control form-control-md  mr-3 w-100" type="text" name="titre" placeholder="Saisir un mot clé" aria-label="Search" style="border-color: darkorange; ">
        </div>

        <div class="form-group ml-3">
            <input type="submit" class="btn-sm btn-primary" value="Recherchez" >
          </div>
    </div>
</form>

</ul>

<div class="container mt-4">
    <div class="row mt-5">
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
                <h4 class="card-title text-uppercase  font-weight-bold">
                    @php
                    $description=$item->titre;
                    if (strlen($description  )>50) 
                        {
                        $description=substr($description, 0, 50);
                        $dernier_mot=strrpos($description," ");
                        $description=substr($description,0,$dernier_mot)."...";
                        }
                   @endphp 
                       {{$description}}
                </h4>
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
       
        <div class="col-lg-4">
            <div class="green rounded mb-4">
                <p class="text-white py-2 ml-3 text-uppercase text-center font-weight-bold">à la une
                </p>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-6">
                    <div class="mb-3 card wow fadeIn Up">
                        <div class="view overlay img-fluid w-100">
                        <img class="card-img-top "
                            src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20%28131%29.jpg" alt="Card image cap">
                        <a>
                            <div class="mask rgba-white-slight"></div>
                        </a>
                        </div>
                        <div class="card-body">
                        <h5 class="card-title font-weight-bold text-justify">Card tiempore ullam veritatis saepe, porro ducimus!</h5>
                        <a href=""><small class="pull-right"><i class="fas fa-angle-double-right"></i> View more</small></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-6">
                    <div class="mb-3 card wow fadeIn Up">
                        <div class="view overlay img-fluid w-100">
                        <img class="card-img-top "
                            src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20%28131%29.jpg" alt="Card image cap">
                        <a>
                            <div class="mask rgba-white-slight"></div>
                        </a>
                        </div>
                        <div class="card-body">
                        <h5 class="card-title font-weight-bold text-justify">Card tiempore ullam veritatis saepe, porro ducimus!</h5>
                        <a href="{{route('announce_details',1)}}"><small class="pull-right"><i class="fas fa-angle-double-right"></i> View more</small></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
