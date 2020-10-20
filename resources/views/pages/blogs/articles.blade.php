@extends('layouts.layoutBlog', ['page' => 'Blogs'])

@section('content')

<div class="container my-5">
    <div class="green pb-1 px-5 rounded">
    <form action="" method="POST">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-8 justify-content-sm-center justify-content-lg-center">
              <div class="row pt-3 ">
                <div class="form-group mr-3">
                    <select class="browser-default custom-select" style="border-color: darkorange; ">
                        <option selected>Choisir une categorie</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class="form-group ">
                    <select class="browser-default custom-select" style="border-color: darkorange; ">
                        <option selected>Choisir un ordre</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>

              </div>
            </div>
            <div class="col-lg-4">
              <div class="row d-flex justify-content-end align-items-center justify-content-sm-center">
                    <input class="form-control form-control-md  mr-3 w-75" type="text" placeholder="Recherche un mot" aria-label="Search" style="border-color: darkorange; ">
                    <i class="far btn-link text-decoration-none fa-search" aria-hidden="true"></i>
              </div>
            </div>
         </div>
    </form>
    </div>
    @if (count($shop)==0)
    <p class="text-warning text-center font-weight-bold mt-5">
        Aucun article disponible dans la boutique !!
    </p>
    @endif
    <div class="row mt-5">
    @foreach ($shop as $item)
     <div class="col-lg-3 wow fadeIn mb-3">
            <div class="card">
                <div class="view">
                <img src="{{asset($item->fichier_path)}}" class="card-img-top img-fluid" style="max-height: 20vh" alt="{{$item->fichier}}">
                    <a href="{{route('detailarticle_blog', $item)}}">
                        <div class="mask rgba-white-slight d-flex align-items-center justify-content-end">
                            @php if($item->pourcentRed != 0 )
                              echo '<span class="red py-2 px-3 white-text font-weight-bold" style="opacity: 0.8"> -'.$item->pourcentRed.' %</span>';
                            @endphp
                        </div>
                    </a>
                </div>
               
                    <div class="card-body text-center">
                        <a href="{{route('detailarticle_blog', $item)}}">
                            <h5 class="card-title orange-text font-weight-bold text-center" style="height:30px">
                               @php
                               $description=$item->nom;
                              if (strlen($description  )>20) 
                                  {
                                  $description=substr($description, 0, 19);
                                  $dernier_mot=strrpos($description," ");
                                  $description=substr($description,0,$dernier_mot)."...";
                                  }
                             @endphp 
                                 {{$description}}
                            </h5>
                           </a>
                        <hr>
                        <div class="d-flex justify-content-lg-center">
                            <?php if ($item->prixRabais!=0): ?>
                                <span class="text-center green-text font-weight-bold"> {{$item->prixRabais}} FCFA</span>
                                <span class="text-center text-muted font-weight-bold ml-3"><del>{{$item->prix}} FCFA</del></span>
                            <?php else: ?>
                                <span class="text-center green-text font-weight-bold"> {{$item->prix}} FCFA</span>
                            <?php endif ?>
                        </div>
                    </div>
            </div>
       </div>
    @endforeach
    </div>
</div>

@endsection
