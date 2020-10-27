<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>AgroCam237 {{ page_title($page ?? 'Accueil') }}</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/css/compiled.css')}}" rel="stylesheet">
  <link href="{{asset('assets/css/video.css')}}" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <!-- <link href="assets/css/mdb.min.css" rel="stylesheet"> -->
  <!-- Your custom styles (optional) -->
  <link href="{{asset('css/style.css')}}" rel="stylesheet">
</head>
<body>

  <header>
   <div class="blue-grey lighten-5">
     <div class="mx-5">
         <div class="row d-flex align-items-center justify-content-center pt-3">
           <div class="col-lg-8">
             <div class="row ">
                <a href="{{ route('accueil') }}"><img src="" class="w-25 h-25 img-fluid" ></a>
               <p class="d-flex align-items-center justify-content-center"><span class="green-text font-weight-bold">Ce Blog est généré par le portail AgroCam237</span></p>
             </div>
           </div>
           <div class="col-lg-4">
             <div class="row d-flex justify-content-end">
                @guest
                <p><i class="fas fa-user-plus"></i> <a href="{{ route('inscription.index') }}"><button class="btn btn-rounded btn-sm btn-white"><span class="black-text font-weight-bold">Inscription</span></button></a></p>
                <p class="ml-2"><i class="fas fa-user"></i> <a href="{{ route('login') }}"><button class="btn btn-rounded btn-sm btn-success"><span class="white-text font-weight-bold">Se connecter</span></button></a></p>
                @else
                <span class="nav-item dropdown mb-2">
                <a id="navbarDropdown" class="nav-link dropdown-toggle"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  <span class=" font-weight-bold">
                    <img class="img-profile rounded-circle" width="30px" height="30px" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
                    {{ Auth::user()->name }}</span> <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('index') }}" target="_blank">
                    <i class="fas fa-user fa-sm fa-fw mr-2 grey-text"></i>
                    {{ __('Mon Profil') }}
                  </a>
                  <a class="dropdown-item" href="{{ route('index') }}" target="_blank">
                    <i class="fas fa-cogs fa-sm fa-fw mr-2 grey-text"></i>
                    {{ __('Mon Panel') }}
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 grey-text"></i>
                  {{ __('Déconnexion') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
                </div>
                </span>
                @endguest
             </div>
           </div>
        </div>
     </div>
   </div>
</header>
<div class="view  ">
	<img  src="{{asset('img/utilities/Ban_Anonces.jpg')}}" class="img-fluid  d-block w-100 mb-0" alt="zoom" >
	<div class="mask  waves-effect waves-light justify-content-center d-flex align-items-center">
		<div class="row ">
			<div class="col-md-12 text-center">
				<h2 class="white-text h2-responsive font-weight-bold " style="font-family: Matura MT Script Capitals, sans-serif">AGRICULTEUR DE DEMAIN</h2>
			</div>
			<div class="col-md-12">
				<hr class=" mb-4 "  style="height: 6px; width:200px;  background-color: white;">
			</div>
		</div>
	</div>
</div>
{{-- @php
     if(session('blog_id') == null) return redirect()->route('accueil');
@endphp --}}
<ul class="nav justify-content-center blue-grey lighten-5 ">
  <li class="nav-item pt-2" >
		<a class="nav-link" href="{{route('accueil')}}"><h6 class=" black-text font-weight-bold">AGROCAM237</h6></a>
	</li>
	<li class="nav-item active_hover pt-2 {{ set_route_active('home_blog') }}" >
		<a class="nav-link" href="{{route('home_blog', session('blog_id'))}}"><h6 class=" black-text font-weight-bold">ACCEUIL</h6></a>
	</li>
	<li class="nav-item active_hover pt-2 {{ set_route_active( 'articles_blog') }} <?php  if($page =='Detail Article') echo 'actived' ?>">
		<a class="nav-link" href="{{route('articles_blog', session('blog_id'))}}"><h6 class=" black-text font-weight-bold">ARTICLES</h6></a>
	</li>
	<li class="nav-item active_hover pt-2 {{ set_route_active('projects_blog') }}">
		<a class="nav-link" href="{{route('projects_blog', session('blog_id'))}}"><h6 class=" black-text font-weight-bold">PROJETS</h6></a>
  </li>
  <li class="nav-item active_hover pt-2 {{ set_route_active('annonces_blog') }}">
		<a class="nav-link" href="{{route('annonces_blog', session('blog_id'))}}"><h6 class=" black-text font-weight-bold">MES ANNONCES</h6></a>
	</li>
	<li class="nav-item active_hover pt-2 {{ set_route_active('offers_blog') }}">
		<a class="nav-link" href="{{route('offers_blog', session('blog_id'))}}"><h6 class=" black-text font-weight-bold">MES OFFRES</h6></a>
	</li>
	<li class="nav-item active_hover pt-2 {{ set_route_active('contact_blog') }}">
		<a class="nav-link" href="{{route('contact_blog', session('blog_id'))}}"><h6 class=" black-text font-weight-bold">CONTACTS</h6></a>
	</li>
</ul>

@yield('content')

<footer class="page-footer font-small blue-grey lighten-5  mt-5" >
<div class="container">
    <!-- Grid row -->
    <div class="row d-flex align-items-center ">
    <div class="col-md-7 col-lg-8 text-black-50" style="font-size: 1.3em">
        <p class="text-center text-md-left mt-2">Copyright © 2020
        <a href="">
            <strong class="text-black-50"> AgroCam237.</strong>
        </a> Tous droits reservés.
        </p>
    </div>
    <div class="col-md-5 col-lg-4 ml-lg-0">
        <div class="text-center text-md-right">
        <ul class="list-unstyled list-inline">
            <li class="list-inline-item">
                <p class="mt-4 green-text" style="font-size: 1.3em">Desingned by <a href="https://www.orelextech.com"><span class="green-text">ORELEXTECH</span></a></p>
            </li>
        </ul>
        </div>
    </div>
    </div>
</div>
</footer>
    <!--/.Footer-->
    <script type="text/javascript" src="{{asset('assets/js/jquery-3.4.1.min.js')}}"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="{{asset('assets/js/popper.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/compiled.min62df.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/dataTables.bootstrap4.min.js')}}"></script>
    <!-- Bootstrap core JavaScript -->
    <!-- <script type="text/javascript" src="{{asset('assets/js/bootstrap.min.js')}}"></script> -->
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="{{asset('assets/js/mdb.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/video.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/functions.js')}}"></script>

    <!-- Initializations -->
    <script type="text/javascript">
        // Animations initialization
        new WOW().init();
        // popovers Initialization
        $(function () {
    $('[data-toggle="popover"]').popover()
    });
    $(function () {
    $('.example-popover').popover({
    container: 'body'
    })
    })
    </script>
  </body>
</html>
