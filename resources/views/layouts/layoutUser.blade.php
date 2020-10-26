<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Univers Agro237 {{ page_title($page ?? 'Accueil') }}</title>
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

 <header>
   <div class="blue-grey lighten-5 ">
     <div class="mx-5">
         <div class="row d-flex align-items-center justify-content-center pt-3">
           <div class="col-lg-8">
             <div class="row d-flex justify-content-center">
               <p class="border_left pr-3 mr-2">Télephone: <span class="green-text">+237 696024400 / 679703844</span></p>
               <p class="">Email: <span class="green-text">stengifservices@gmail.com</span></p>
             </div>
           </div>
           <div class="col-lg-4">
             <div class="row d-flex justify-content-lg-end justify-content-center">
                @guest
                <p><i class="fas fa-user-plus"></i> <a href="{{ route('inscription.index') }}"><button class="btn btn-rounded btn-sm btn-white"><span class="black-text font-weight-bold">Inscription</span></button></a></p>
                <p class="ml-2"><i class="fas fa-user"></i> <a href="{{ route('login') }}"><button class="btn btn-rounded btn-sm btn-success"><span class="white-text font-weight-bold">Se connecter</span></button></a></p>
                @else
                <span class="nav-item dropdown mb-2">
                <a id="navbarDropdown" class="nav-link dropdown-toggle"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  <span class=" font-weight-bold">
                    <?php if (Auth::user()->profile_path): ?>
                        <img src="{{asset(Auth::user()->profile_path)}}" width="30px" height="30px" class="img-profile rounded-circle"  alt="{{Auth::user()->image}}">
                    <?php else: ?>
                        <img src="{{asset('img/utilities/default.png')}}" width="30px" height="30px" class="img-profile rounded-circle"  alt="default.png">
                    <?php endif ?>
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
   <!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-dark black-text py-0">
<div class="container" id="navigations">
  <!-- Navbar brand -->
  <a class="navbar-brand" href="{{ route('accueil') }}"><img src="{{asset('img/Logo_menu.png')}}" class="w-50 h-75 img-fluid" alt="Logo_UA_237"></a>

  <!-- Collapse button -->
  <button class="navbar-toggler btn-outline-warning " type="button" data-toggle="collapse" data-target="#basicExampleNav"
    aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
    <i class="fas fa-align-justify green-text"></i>
  </button>
  <!-- Collapsible content -->
  <div class="collapse navbar-collapse" id="basicExampleNav">
    <!-- Links -->
    <ul class="navbar-nav ml-auto font-weight-bold " style="font-size: 1.3em">
      <li class="nav-item  pb-2 pt-4 text-black-st "  <?php if (isset($page) && $page=='Accueil') { echo' id="en-cours" ';} ?>>
        <a class="nav-link text-black-color-st" href="{{ route('accueil') }}">Accueil
          <span class="sr-only">(current)</span>
        </a>
      </li>
      <li class="nav-item pb-2 pt-4 text-black-st" <?php if (isset($page) && $page=='Shop') { echo' id="en-cours" ';}?> >
        <a class="nav-link   text-black-color-st" href="{{ route('articles') }}">Boutique</a>
      </li>
      <li class="nav-item pb-2 pt-4 text-black-st" <?php if (isset($page) && $page=='Forum') { echo' id="en-cours" ';} ?>>
        <a class="nav-link  text-black-color-st " href="{{ route('forum.index') }}">Forum</a>
      </li>
      <li class="nav-item pb-2 pt-4 text-black-st"  <?php if (isset($page) && $page=='Blogs') { echo' id="en-cours" ';} ?>>
      <a class="nav-link  text-black-color-st" href="{{ route('blogs.index') }}">Blog</a>
      </li>
      <li class="nav-item pb-2 pt-4 text-black-st">
        <a class="nav-link  text-black-color-st" href="{{ route('tutoriel') }}">Tutoriels</a>
      </li>
      <li class="nav-item pb-2 pt-4 text-black-st" <?php if (isset($page) && $page=='Annonces') { echo' id="en-cours" ';} ?>>
        <a class="nav-link  text-black-color-st" href="{{ route('annonces') }}">Annonces</a>
      </li>
      <li class="nav-item pb-2 pt-4 text-black-st" <?php if (isset($page) && $page=='Projects') { echo' id="en-cours" ';} ?>>
        <a class="nav-link  text-black-color-st" href="{{ route('projects') }}">Projets</a>
      </li>
      <li class="nav-item pb-2 pt-4 text-black-st" <?php if (isset($page) && $page=='Offres') { echo' id="en-cours" ';} ?>>
        <a class="nav-link  text-black-color-st" href="{{ route('offers') }}">Emplois</a>
      </li>
      <li class="nav-item pb-2 pt-4 text-black-st">
        <a class="nav-link  text-black-color-st" href="{{ route('apropos') }}">A propos</a>
      </li>
    </ul>
  </div>
</div>
</nav>
</header>

{{-- <div class="container mt-5">
        <div class="">
             @include('includes.messageflash')
        </div>
</div> --}}
@yield('content')

<footer class="page-footer font-small blue-grey lighten-5  mt-5" >
<div class="container">
    <!-- Grid row -->
    <div class="row d-flex align-items-center ">
    <div class="col-md-7 col-lg-8 text-black-50" style="font-size: 1.3em">
        <p class="text-center text-md-left mt-2">Copyright © 2020
        <a href="">
            <strong class="text-black-50"> AgroCameroun237.</strong>
        </a> Tous droits reservés.
        </p>
    </div>
    <div class="col-md-5 col-lg-4 ml-lg-0">
        <div class="text-center text-md-right">
        <ul class="list-unstyled list-inline">
            <li class="list-inline-item">
                <!-- <p class="mt-4 green-text" style="font-size: 1.3em">Desingned by <a href="https://www.orelextech.com"><span class="green-text">Orelex</span></a></p> -->
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
