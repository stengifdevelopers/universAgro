@extends('layouts.layoutUser', ['page' => 'Forum'])

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
<div class="container mt-5">
	<div class="row d-flex">
		<div class="col-md-9 mb-2 " >
			<div class="col-md-12 mb-4">
				<div class="row" style="background-color: #cfd8dc">
					<div class="col-md-6" >
						<h3 class="font-weight-bolder   mt-2 mb-2" style="color: black ">FORUM 
						</h3>
					</div>


				</div>
			</div>

			<div class="col-md-12 mb-4 table-responsive">
				<table id="dtMaterialDesignExample" class="table table-striped" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th class="th-sm">Thèmes
							</th>
							<th class="th-sm">Sujets
							</th>
							<th class="th-sm">Discussions
							</th>

						</tr>
					</thead>
					<tbody>
						<tr>
							<td><span><a href="#"  class="text-primary" style="font-size: 1.2em; font-weight: bold;"><i class="fas fa-comments"></i> Creation d'une site web</a><br>
								<p class="ml-4">Support related to Activello WordPress Theme. Please read Theme Documentation and use forum search before posting anything here. Please provide a URL to your site if possible.</p></span></td>
								<td scope="row"><i class="fas fa-pen-alt"></i> 10</td>
								<td scope="row"><i class="fas fa-user-edit"></i> 20</td>

						</tr>
            <tr>
							<td><span><a href="#"  class="text-primary" style="font-size: 1.2em; font-weight: bold;"><i class="fas fa-comments"></i> Creation d'une site web</a><br>
								<p class="ml-4">Support related to Activello WordPress Theme. Please read Theme Documentation and use forum search before posting anything here. Please provide a URL to your site if possible.</p></span></td>
								<td scope="row"><i class="fas fa-pen-alt"></i> 10</td>
								<td scope="row"><i class="fas fa-user-edit"></i> 20</td>

							</tr>
              <tr>
							<td><span><a href="#"  class="text-primary" style="font-size: 1.2em; font-weight: bold;"><i class="fas fa-comments"></i> Creation d'une site web</a><br>
								<p class="ml-4">Support related to Activello WordPress Theme. Please read Theme Documentation and use forum search before posting anything here. Please provide a URL to your site if possible.</p></span></td>
								<td scope="row"><i class="fas fa-pen-alt"></i> 10</td>
								<td scope="row"><i class="fas fa-user-edit"></i> 20</td>

							</tr>

						</tbody>
					</table>
				</div>


			</div>

			<div class="col-md-3  mt-0" >
				<div class="col-md-12 mb-4 p-2 mb-2" style="background-color:rgb(0,166,80);">
					<h3 class="font-weight-bolder text-white text-center ">Connexion
					</h3>
				</div>

				<div class="col-md-12 mb-2 ">
					<!-- Default form register -->
					<form class="text-center  p-1" action="#!">
						<!-- E-mail -->
						<input type="email" id="defaultRegisterFormEmail" class="form-control mb-2" placeholder="E-mail">

						<!-- Password -->
						<input type="password" id="defaultRegisterFormPassword" class="form-control" placeholder="Password" aria-describedby="defaultRegisterFormPasswordHelpBlock">

						<!-- Sign up button -->
						<button class="btn btn-info mt-2 btn-block" type="submit">Se connecter</button>
						<hr>
						<!-- Terms of service -->
						<p>
							<em>Vous n'avez pas de compte/blog veuillez vous </em> 
							<a href="" target="_blank">inscrire ici</a></p>


						</form>
						<!-- Default form register -->
					</div>

					<div class="col-md-12 mb-4 ">
						<div class="col-md-12 mb-4 p-2 mb-1" style="background-color:rgb(0,166,80);">
							<h3 class="font-weight-bolder text-white text-center ">Publicité
							</h3>
						</div>
					<div class="col-md-12 p-0 m-0" style="height: 120px;">
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

				</div>

			</div>
		</div>
@endsection