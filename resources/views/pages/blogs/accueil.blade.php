@extends('layouts.layoutBlog', ['page' => 'Blogs'])

@section('content')

<div class=" justify-content-center container mt-4">
	<div class="row">
		<div class="col-md-8 col-lg-8 ">
			<div class="col-md-12 text-left" >
				<h4 class="font-weight-bold  hover mt-2 mb-2" style="color: rgb(0,166,80) ">LA RECOLTE DE CACAO DU MOIS DE MARS
				</h4>
				<p class="black-text font-weight-bolder "><i class="fas fa-calendar-alt"></i>  02 mars 2020 200:52</p>
			</div>
			<div class="col-md-12 mb-4">
				<img  src="assets/img/images/cacao.png" class="img-fluid  d-block w-100 mb-2" alt="zoom" style="height: 300px">
				<p class="black-text text-justify h5 mt-4">  Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n'a pas fait que survivre cinq siècles, mais s'est aussi adapté à la bureautique informatique, sans que son contenu n'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.</p>
			</div>

			<div class="col-md-12 text-left" >
				<h4 class="font-weight-bold   mt-2 mb-2" style="color: rgb(0,166,80) ">LA RECOLTE DE CACAO DU MOIS DE MARS
				</h4>
				<p class="black-text font-weight-bolder "><i class="fas fa-calendar-alt"></i>  02 mars 2020 200:52</p>
			</div>
			<div class="col-md-12 mb-2">
				<img  src="assets/img/images/cacao.png" class="img-fluid  d-block w-100 mb-2" alt="zoom" style="height: 300px">
				<p class="black-text text-justify h5 mt-4">  Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n'a pas fait que survivre cinq siècles, mais s'est aussi adapté à la bureautique informatique, sans que son contenu n'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.</p>
			</div>
		</div>

		<div class="col-md-4  mt-0" >
			<div class="col-md-12 green rounded" >
				<h4 class="font-weight-bold text-white text-center  py-2">A PROPOS
				</h4>
			</div>
			<div class="card mb-5">
				<div class="card-header white text-center">
				  <span class="font-weight-bold  text-muted">Informations du propriétaire </span>
                </div>
                @foreach ($datas as $item)
                    <div class="card-body">
                        <div class="text-center mb-3">
                            <?php if ($item->profile_path): ?>
                                <a href=""><img src="{{asset($item->profile_path)}}" width="100px" class="img-fluid" style="border-radius: 45px" alt="{{$item->profile_path}}"></a>
                            <?php else: ?>
                                <a href=""><img src="{{asset('img/utilities/default.png')}}" width="100px" class="img-fluid" style="border-radius: 45px" alt="default.png"></a>
                            <?php endif ?>
                        </div>
                        <p><span class="font-weight-bold">User name:</span> {{$item->name}}</p>
                        <p><span class="font-weight-bold">Fonction:</span> {{$item->fonction}}</p>
                        <p><span class="font-weight-bold">Phone:</span> {{$item->phone}}</p>
                        <hr>
                        <div class="container text-center">
                            <a href=""><button class="btn-warning btn btn-sm text-white btn">View Profile</button></a>
                        </div>
                    </div>
                @endforeach
                
			</div>

			<div class="col-md-12 mb-4 p-2 mb-2">
                <h3><u>Biographie</u></h3>
				<p class="black-text text-justify h6 mt-4">  
                    {{-- {{$item->description}} --}}
                </p>
			</div>

			<div class="col-md-12 mb-4 p-2 mb-2" style="background-color:rgb(0,166,80);">
				<h4 class="font-weight-bold text-white text-center ">SUIVEZ NOUS
				</h4>
			</div>

			<div class="col-md-12 mb-4 p-2 mb-2 grey lighten-4 pt-2 px-4 pb-6" >
				<h4 class="font-weight-bold  text-center " style="color: rgb(247,176,28) ">PUBLICITE
				</h4>
				<div id="carouselExampleSlidesOnly" class="carousel slide px-4 pb-4" data-ride="carousel">
					<div class="carousel-inner">
						<div class="carousel-item active">
							<img class="d-block w-100 " height="300px"  src="assets/img/images/Ban_Anonces.jpg">
						</div>
						<div class="carousel-item">
							<img class="d-block w-100" height="300px"  src="assets/img/images/Ban_Anonces.jpg">
						</div>
						<div class="carousel-item">
							<img class="d-block w-100" height="300px"  src="assets/img/images/Ban_Anonces.jpg">
						</div>
					</div>
				</div>
			</div>



		</div>
	</div>
</div>

@endsection
