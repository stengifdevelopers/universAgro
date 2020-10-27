@extends('layouts.layoutUser', ['page' => 'Projects'])

@section('content')
<div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100 img-fluid" src="{{asset('img\utilities\Ban_projets.jpg')}}"
          alt="First slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100 img-fluid" src="{{asset('img\utilities\Ban_projets.jpg')}}"
          alt="Second slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100 img-fluid" src="{{asset('img\utilities\Ban_projets.jpg')}}"
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

<section class="mt-5">
    <div class="container">
        <div class="green pb-1 px-5 rounded mt-4 mb-4">

            <form action="{{ route('findProjet') }}" method="POST">
                @csrf
                <div class="row d-flex align-items-center justify-content-center">
                    <div class="col-md-8 col-md-8 mt-2  ">
                      
                        <div class="form-group ">
                        <input class="form-control form-control-md  mr-3 w-100 mt-2" type="text" name="libelle" placeholder="Saisir un mot clé exemple : elevage, agriculture, poule, tubercules" aria-label="Search" style="border-color: darkorange; ">
                         
                        </div>
                     
                    </div>
                    <div class="col-lg-3 text-left">
                        <input type="submit" class="btn-sm btn btn-primary" value="Recherchez" >
                    </div>
                 </div>
            </form>
            </div>
      <div class="row">
      @foreach ($projets as $item)
        <div class="col-lg-4 col-md-6 mb-3 ">
         <div class="view overlay d-flex align-items-center justify-content-center wow fadeIn">
            <img src="{{asset($item->image_path )}}"  class="w-100 img-fluid" style="height: 35vh">
          <a href="{{route('show', $item)}}">
            <div class="mask rgba-white-slight"></div>
          </a>
         </div>
         <hr class="bg-agro-orange hr-height">
          <p class="text-justify font-weight-bold text-black-50 h4 wow fadeIn" style="height: 55px;" >
            @php
            $description=$item->libelle;
            if (strlen($description  )> 50)
                {
                $description=substr($description, 0,  50);
                $dernier_mot=strrpos($description," ");
                $description=substr($description,0,$dernier_mot)."...";
                }
            @endphp
            {{$description}}
          </p>
          <hr class="bg-agro-orange hr-height">
          <p class="text-justify mb-3 wow fadeIn" style="font-size: 1.2em; height: 100px;">
            @php
            $description=$item->description;
            if (strlen($description  )> 120)
                {
                $description=substr($description, 0,  120);
                $dernier_mot=strrpos($description," ");
                $description=substr($description,0,$dernier_mot)."...";
                }
            @endphp
            {{$description}}
          </p>
          <p class="mt-3 text-right green-text font-weight-bold wow fadeIn"><i class="far fa-calendar-alt"></i> {{$item->created_at->format('d M Y à H:m:s')}}</p>
          <div class="text-center wow fadeIn">
             <a href="{{route('show', $item)}}"><button class="btn btn-sm btn-amber "><i class="fas fa-arrow-right"></i> <span class="font-weight-bold">Afficher</span></button></a>
          </div>
        </div>
      @endforeach
      </div>
    </div>
  </section>
@endsection
