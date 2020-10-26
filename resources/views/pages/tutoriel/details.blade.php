@extends('layouts.layoutUser', ['page' => 'Details'])

@section('content')

<section class="mt-">
    <div class="container">
      <p class="font-weight-bold my-5 mx-5 text-center wow fadeIn Up  h3">Détails sur : Comment produire les poules de bonnes qualités</p>

        <div class="row">
            <div class="col-md-8">
  <!--Section: Content-->
  <section>
    <!-- Section description -->

    <div class="row text-center text-md-left">
    
        <h5 class="font-weight-normal mb-3">What payment services do you support?</h5>
        <p class="text-muted">We accept all major credit cards.</p>
 

        <h5 class="font-weight-normal mb-3">Can I update my card details?</h5>
        <p class="text-muted">Yes. Go to the billing section of your dashboard and update your payment information.</p>
  

    
        <h5 class="font-weight-normal mb-3">Is this a secure site for purchases?</h5>
        <p class="text-muted">Absolutely! We work with top payment companies which guarantees your safety and security. All billing information is stored on our payment processing partner which has the most stringent level of certification available in the payments industry.</p>
  

        <h5 class="font-weight-normal mb-3">Can I cancel my subscription?</h5>
        <p class="text-muted">You can cancel your subscription anytime in your account. Once the subscription is cancelled, you will not be charged next month. You will continue to have access to your account until your current subscription expires.</p>
     

     
        <h5 class="font-weight-normal mb-3">How long are your contracts?</h5>
        <p class="text-muted">Currently, we only offer monthly subscription. You can upgrade or cancel your monthly account at any time with no further obligation.</p>
   

      
        <h5 class="font-weight-normal mb-3">Can I request refund?</h5>
        <p class="text-muted">Unfortunately, not. We do not issue full or partial refunds for any reason.</p>
      
    </div>

	</section>
            </div>
            <div class="col-md-4">
                <div class="col-md-12 mb-4 ">
                    <div class="col-md-12 mb-4 p-2 mb-1" style="background-color:rgb(0,166,80);">
                        <h3 class="font-weight-bolder text-white text-center ">Publicité
                        </h3>
                    </div>
                <div class="col-md-12 p-0 m-0" style="height: 150px;">
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(45).jpg"
                                alt="First slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(46).jpg"
                                alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(47).jpg"
                                alt="Third slide">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                 </div>
                </div>

                <div class="col-md-12 mb-4 p-2 mb-1 text-center">
                    <a href="" class="font-weight-bolder text-white text-center btn-primary btn-lg ">TELECHARGER LE FICHIER <i class="fas fa-download"></i>
                    </a>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection
