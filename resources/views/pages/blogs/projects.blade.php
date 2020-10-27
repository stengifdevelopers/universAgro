@extends('layouts.layoutBlog', ['page' => 'Project-Blogs'])

@section('content')

<div class=" justify-content-center container mt-4">
	@if (count($projects)==0)
	<p class="text-warning text-center font-weight-bold my-3">
		Aucun projet disponible !!
	</p>
	@endif
	<div class="row justify-content-center">
		
			
		<div class="col-md-10 col-lg-10 ">

			@foreach($projects as $project)
				<div class="col-md-12 text-left" >
					<h4 class="font-weight-bold   mt-2 mb-2" style="color: rgb(0,166,80) ">{{$project->libelle}}
					</h4>
				<p class="text-muted font-weight-bold "><i class="fas fa-calendar-alt"></i> {{$project->created_at->format('d M Y à H:m:s')}}</p>
				</div>
				<div class="col-md-12 mb-4">
					<div class="text-center">
						<img src="{{asset($project->image_path)}}" class="img-fluid w-100 animated wow fadeIn" style="max-height: 50vh" alt="{{$project->image}}">
					</div>
					<p class="black-text text-justify h5 mt-4">
						{{$project->description}}
					</p>
				</div>
				<p class="green-text font-weight-bold">Pièces Jointes</p>
   <hr>
   @if (count($project->fichier)==0)
   <p class="text-warning text-center font-weight-bold my-2">
       Aucun pièce jointe pour ce projet !!
   </p>
   @endif
   <p class="text-justify text-muted size3 animated wow fadeIn">
       <div class="row">
        @foreach ($project->fichier as $fichier)
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
@endforeach

		</div>

		<div >
			<!--Carousel Wrapper-->
			<div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">

				<!--Controls-->
				<div class="controls-top">
					<a class="btn-floating" href="#multi-item-example" data-slide="prev"><i class="fas fa-chevron-left"></i></a>
					<a class="btn-floating" href="#multi-item-example" data-slide="next"><i
						class="fas fa-chevron-right"></i></a>
					</div>
					<!--/.Controls-->

					<!--Indicators-->
					<ol class="carousel-indicators">
						<li data-target="#multi-item-example" data-slide-to="0" class="active"></li>
						<li data-target="#multi-item-example" data-slide-to="1"></li>
						<li data-target="#multi-item-example" data-slide-to="2"></li>
					</ol>
					<!--/.Indicators-->

					<!--Slides-->
					<div class="carousel-inner" role="listbox">

						<!--First slide-->
						<div class="carousel-item active">

							<div class="col-md-4">
								<div class="card mb-2">
									<img class="card-img-top"
									src="assets/img/images/cacao.png"
									alt="Card image cap">
								</div>
							</div>

							<div class="col-md-4">
								<div class="card mb-2">
									<img class="card-img-top"
									src="assets/img/images/cacao.png"
									alt="Card image cap">
								</div>
							</div>

							<div class="col-md-4">
								<div class="card mb-2">
									<img class="card-img-top"
									src="assets/img/images/cacao.png"
									alt="Card image cap">
								</div>
							</div>

						</div>
						<!--/.First slide-->

						<!--Second slide-->
						<div class="carousel-item">

							<div class="col-md-4">
								<div class="card mb-2">
									<img class="card-img-top"
									src="assets/img/images/cacao.png"
									alt="Card image cap">
								</div>
							</div>

							<div class="col-md-4">
								<div class="card mb-2">
									<img class="card-img-top"
									src="assets/img/images/cacao.png"
									alt="Card image cap">
								</div>
							</div>

							<div class="col-md-4">
								<div class="card mb-2">
									<img class="card-img-top"
									src="assets/img/images/cacao.png"
									alt="Card image cap">
								</div>
							</div>

						</div>
						<!--/.Second slide-->

						<!--Third slide-->
						<div class="carousel-item">

							<div class="col-md-4">
								<div class="card mb-2">
									<img class="card-img-top"
									src="assets/img/images/cacao.png"
									alt="Card image cap">
								</div>
							</div>

							<div class="col-md-4">
								<div class="card mb-2">
									<img class="card-img-top"
									src="assets/img/images/cacao.png"
									alt="Card image cap">
								</div>
							</div>

							<div class="col-md-4">
								<div class="card mb-2">
									<img class="card-img-top"
									src="assets/img/images/cacao.png"
									alt="Card image cap">
								</div>
							</div>

						</div>
						<!--/.Third slide-->

					</div>
					<!--/.Slides-->

				</div>
				<!--/.Carousel Wrapper-->
			</div>

		</div>
	</div>

@endsection
