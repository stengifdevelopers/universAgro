@extends('layouts.layoutUser', ['page' => 'Apropos'])

@section('content')

<div class="container ">

    <!-- Section -->
    <section>
      <h3 class="font-weight-bold text-center dark-grey-text pb-2 mt-4">A propos de Univers Agro Cameroun</h3>
      <h3 class="font-weight-bolder text-center dark-grey-text mt-2">Nos Services</h3>
      <hr class="w-header my-4">
      <p class="lead text-center text-muted pt-2 mb-5">Join thousands of satisfied customers using our template
        globally.</p>

      <div class="row d-flex justify-content-center">

        <div class="col-md-6 col-lg-5 col-xl-4">
          <h5 class="font-weight-normal border-top border-light pt-4 mb-4"><a class="dark-grey-text" href="#">Website
              Design</a></h5>
          <p class="text-muted mb-5 pb-md-3">Written enquire painful to offices forming it. Then so does over sent
            dull. Likewise offended humour mrs
            fat trifling answered. On ye position greatest so desirous enable performance based.</p>
        </div>

        <div class="col-md-6 col-lg-5 col-xl-4">
          <h5 class="font-weight-normal border-top border-secondary pt-4 mb-4"><a class="dark-grey-text"
              href="#">Application Development</a></h5>
          <p class="text-muted mb-5 pb-md-3">Written enquire painful to offices forming it. Then so does over sent
            dull. Likewise offended humour mrs
            fat trifling answered. On ye position greatest so desirous enable performance based.</p>
        </div>

        <div class="w-100"></div>

        <div class="col-md-6 col-lg-5 col-xl-4">
          <h5 class="font-weight-normal border-top border-light pt-4 mb-4"><a class="dark-grey-text" href="#">Branding
              Package</a></h5>
          <p class="text-muted mb-5">Written enquire painful to offices forming it. Then so does over sent dull.
            Likewise offended humour mrs
            fat trifling answered. On ye position greatest so desirous enable performance based.</p>
        </div>

        <div class="col-md-6 col-lg-5 col-xl-4">
          <h5 class="font-weight-normal border-top border-light pt-4 mb-4"><a class="dark-grey-text"
              href="#">Advertisement</a></h5>
          <p class="text-muted mb-5">Written enquire painful to offices forming it. Then so does over sent dull.
            Likewise offended humour mrs
            fat trifling answered. On ye position greatest so desirous enable performance based.</p>
        </div>

      </div>
    </section>
    <!-- Section -->

  </div>

<div class="container mt-5">


    <!--Section: Content-->
    <section class="team-section text-center dark-grey-text">

      <!-- Section heading -->
      <h3 class="font-weight-bold mb-4 pb-2"> Notre équipe </h3>
      <!-- Section description -->
      <p class="text-center w-responsive mx-auto mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
        Fugit, error amet numquam iure provident voluptate esse quasi, veritatis totam voluptas nostrum quisquam
        eum porro a pariatur veniam.</p>

        <!--Grid row-->
      <div class="row text-center">

        <!--Grid column-->
        <div class="col-md-4 mb-4">

          <div class="testimonial">
            <!--Avatar-->
            <div class="avatar mx-auto">
              <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(1).jpg" class="rounded-circle z-depth-1 img-fluid">
            </div>
            <!--Content-->
            <h4 class="font-weight-bold dark-grey-text mt-4">Anna Deynah</h4>
            <h6 class="font-weight-bold blue-text my-3">Web Designer</h6>
            <p class="font-weight-normal dark-grey-text">
              <i class="fas fa-quote-left pr-2"></i>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod
              eos id officiis hic tenetur quae quaerat ad velit ab hic tenetur.</p>
            <!--Review-->
            <div class="orange-text">
              <i class="fas fa-star"> </i>
              <i class="fas fa-star"> </i>
              <i class="fas fa-star"> </i>
              <i class="fas fa-star"> </i>
              <i class="fas fa-star-half-alt"> </i>
            </div>
          </div>

        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-4 mb-4">

          <div class="testimonial">
            <!--Avatar-->
            <div class="avatar mx-auto">
              <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(8).jpg" class="rounded-circle z-depth-1 img-fluid">
            </div>
            <!--Content-->
            <h4 class="font-weight-bold dark-grey-text mt-4">John Doe</h4>
            <h6 class="font-weight-bold blue-text my-3">Web Developer</h6>
            <p class="font-weight-normal dark-grey-text">
              <i class="fas fa-quote-left pr-2"></i>Ut enim ad minima veniam, quis nostrum exercitationem ullam
              corporis suscipit laboriosam, nisi ut aliquid commodi.</p>
            <!--Review-->
            <div class="orange-text">
              <i class="fas fa-star"> </i>
              <i class="fas fa-star"> </i>
              <i class="fas fa-star"> </i>
              <i class="fas fa-star"> </i>
              <i class="fas fa-star"> </i>
            </div>
          </div>

        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-4 mb-4">

          <div class="testimonial">
            <!--Avatar-->
            <div class="avatar mx-auto">
              <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(10).jpg" class="rounded-circle z-depth-1 img-fluid">
            </div>
            <!--Content-->
            <h4 class="font-weight-bold dark-grey-text mt-4">Maria Kate</h4>
            <h6 class="font-weight-bold blue-text my-3">Photographer</h6>
            <p class="font-weight-normal dark-grey-text">
              <i class="fas fa-quote-left pr-2"></i>At vero eos et accusamus et iusto odio dignissimos ducimus qui
              blanditiis praesentium voluptatum deleniti atque corrupti.</p>
            <!--Review-->
            <div class="orange-text">
              <i class="fas fa-star"> </i>
              <i class="fas fa-star"> </i>
              <i class="fas fa-star"> </i>
              <i class="fas fa-star"> </i>
              <i class="far fa-star"> </i>
            </div>
          </div>

        </div>
        <!--Grid column-->

      </div>
      <!--Grid row-->

    </section>
    <!--Section: Content-->


  </div>

@endsection
