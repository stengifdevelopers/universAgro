@extends('layouts.layoutUser', ['page' => 'Tutoriels'])

@section('content')

<section class="mt-">
    <div class="container">
      <p class="font-weight-bold my-5 mx-5 text-center wow fadeIn Up  h3">ESPACE TUTORIELS</p>

      <div class="row" syle="margin-top: 123px">

        <div class="col-md-4">
<!-- Card Dark -->
<div class="card">

    <!-- Card image -->
    <div class="view overlay">
      <img class="card-img-top" src="{{asset('img/tutoriels.png')}}"
        alt="Card image cap">
      <a>
        <div class="mask rgba-white-slight"></div>
      </a>
    </div>

    <!-- Card content -->
    <div class="card-body elegant-color white-text rounded-bottom">

      <!-- Social shares button -->
      <a class="activator waves-effect mr-4"><i class="fas fa-share-alt white-text"></i></a>
      <!-- Title -->
      <h4 class="card-title mr-4">Comment cultiver le maïs à l'Ouest</h4>
      <hr class="hr-light">
      <!-- Text -->
      <p class="card-text white-text mb-4">Some quick example text to build on the card title and make up the bulk
        of the card's content.</p>
      <!-- Link -->
      <a href="{{ route('details') }}" class="white-text d-flex justify-content-end">
        <h5>Lire  <i class="fas fa-angle-double-right"></i></h5>
      </a>

    </div>

              <!-- Card footer -->
  <div class="rounded-bottom mdb-color elegant-color text-center pt-3">
    <ul class="list-unstyled list-inline font-small">
      <li class="list-inline-item pr-2 white-text"><i class="far fa-clock pr-1"></i>05/10/2015</li>
      <li class="list-inline-item pr-2"><a href="#" class="white-text"><i
            class="far fa-comments pr-1"></i>12</a></li>
      <li class="list-inline-item pr-2"><a href="#" class="white-text"><i class="fab fa-facebook-f pr-1">
          </i>21</a></li>
      <li class="list-inline-item"><a href="#" class="white-text"><i class="fab fa-twitter pr-1"> </i>5</a></li>
    </ul>
  </div>

  </div>
  <!-- Card Dark -->

</div>

<div class="col-md-4">
    <!-- Card Dark -->
    <div class="card">
    
        <!-- Card image -->
        <div class="view overlay">
          <img class="card-img-top" src="{{asset('img/tutos.png')}}"
            alt="Card image cap">
          <a>
            <div class="mask rgba-white-slight"></div>
          </a>
        </div>
    
        <!-- Card content -->
        <div class="card-body elegant-color white-text rounded-bottom">
    
          <!-- Social shares button -->
          <a class="activator waves-effect mr-4"><i class="fas fa-share-alt white-text"></i></a>
          <!-- Title -->
          <h4 class="card-title mr-4">Comment cultiver le maïs à l'Ouest</h4>
          <hr class="hr-light">
          <!-- Text -->
          <p class="card-text white-text mb-4">Some quick example text to build on the card title and make up the bulk
            of the card's content.</p>
          <!-- Link -->
          <a href="{{ route('details') }}" class="white-text d-flex justify-content-end">
            <h5>Lire  <i class="fas fa-angle-double-right"></i></h5>
          </a>
    
        </div>

          <!-- Card footer -->
  <div class="rounded-bottom mdb-color elegant-color text-center pt-3">
    <ul class="list-unstyled list-inline font-small">
      <li class="list-inline-item pr-2 white-text"><i class="far fa-clock pr-1"></i>05/10/2015</li>
      <li class="list-inline-item pr-2"><a href="#" class="white-text"><i
            class="far fa-comments pr-1"></i>12</a></li>
      <li class="list-inline-item pr-2"><a href="#" class="white-text"><i class="fab fa-facebook-f pr-1">
          </i>21</a></li>
      <li class="list-inline-item"><a href="#" class="white-text"><i class="fab fa-twitter pr-1"> </i>5</a></li>
    </ul>
  </div>
    
      </div>
      <!-- Card Dark -->
    
    </div>

    <div class="col-md-4">
        <!-- Card Dark -->
        <div class="card">
        
            <!-- Card image -->
            <div class="view overlay">
              <img class="card-img-top" src="{{asset('img/tutoriels.png')}}"
                alt="Card image cap">
              <a>
                <div class="mask rgba-white-slight"></div>
              </a>
            </div>
        
            <!-- Card content -->
            <div class="card-body elegant-color white-text rounded-bottom">
        
              <!-- Social shares button -->
              <a class="activator waves-effect mr-4"><i class="fas fa-share-alt white-text"></i></a>
              <!-- Title -->
              <h4 class="card-title mr-4">Comment cultiver le maïs à l'Ouest</h4>
              <hr class="hr-light">
              <!-- Text -->
              <p class="card-text white-text mb-4">Some quick example text to build on the card title and make up the bulk
                of the card's content.</p>
              <!-- Link -->
              <a href="{{ route('details') }}" class="white-text d-flex justify-content-end">
                <h5>Lire  <i class="fas fa-angle-double-right"></i></h5>
              </a>
        
            </div>
                <!-- Card footer -->
  <div class="rounded-bottom mdb-color elegant-color text-center pt-3">
    <ul class="list-unstyled list-inline font-small">
      <li class="list-inline-item pr-2 white-text"><i class="far fa-clock pr-1"></i>05/10/2015</li>
      <li class="list-inline-item pr-2"><a href="#" class="white-text"><i
            class="far fa-comments pr-1"></i>12</a></li>
      <li class="list-inline-item pr-2"><a href="#" class="white-text"><i class="fab fa-facebook-f pr-1">
          </i>21</a></li>
      <li class="list-inline-item"><a href="#" class="white-text"><i class="fab fa-twitter pr-1"> </i>5</a></li>
    </ul>
  </div>
          </div>
          <!-- Card Dark -->
        
        </div>


      </div>

    </div>
</section>
@endsection
