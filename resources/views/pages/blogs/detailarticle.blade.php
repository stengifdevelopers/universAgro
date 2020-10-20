@extends('layouts.layoutBlog', ['page' => 'Detail Article'])

@section('content')

<div class="container">
 <p class=" size3 mt-5">
     <a href="{{route('accueil')}}"><span class="green-text font-weight-bold">AgroCam237</span> </a>
     <i class="fas fa-angle-right"></i>
     <a href="{{route('articles_blog', session('blog_id'))}}"><span class="green-text font-weight-bold"> Articles </span> </a>
 <i class="fas fa-angle-right"></i> <span class="text-grey">{{$detail->nom}}</span>
 </p>
 <hr class="hr-bold">
 <div class="row mt-3">
     <div class="col-lg-5"> 
        <div class="view">
             <img class="card-img-top img-fluid w-100" style="max-height: 330px" src="{{asset($detail->fichier_path)}}" alt="{{$detail->fichier}}"> </a>
             <a>
                 <div class="mask rgba-white-slight d-flex align-items-center justify-content-end">
                     {{-- <span class="red py-2 px-3 white-text font-weight-bold" style="opacity: 0.8">-20 %</span> --}}
                 </div>
             </a> 
         </div>
     </div>
     <div class="col-lg-7">
         <p class="orange-text font-weight-bold" style="font-size: 1.5em">{{$detail->nom}} </p>
         <p class="text-justify">
            {{$detail->description}}
         </p>
         <hr class="green">
         <p for="price" class="font-weight-bold" style="font-size: 1.4em">Prix: <span class="green-text font-weight-bold">
            <?php if ($detail->prixRabais!=0): ?>
                <span class="text-center green-text font-weight-bold"> {{$detail->prixRabais}} FCFA</span>
                <span class="text-center text-muted font-weight-bold ml-3"><del>{{$detail->prix}} FCFA</del></span>
            <?php else: ?>
                <span class="text-center green-text font-weight-bold"> {{$detail->prix}} FCFA</span>
            <?php endif ?>
            </span>
         </p>
         <form action="" class="form-inline" method="POST">
            <div class="form-group">
                <input type="hidden"  value="600"  readonly class="form-control white   mx-sm-3 w-50" style="border-color: ghostwhite; font-size: 1.4em">
            </div>
            <div class="form-group">
                <label for="qté" class="font-weight-bold" style="font-size: 1.4em">Quantité:</label>
                <span></span>
                <input type="number" min="1" id="qté" value="1" class="form-control white font-weight-bold green-text mx-sm-3 w-25" style="font-size: 1.4em">
            </div>
        </form>
        <hr class="green">
        <div class="justify-content-center d-flex align-items-center">
            <button class="btn btn-amber btn-sm disabled">Acheter</button>
            <button class="btn btn-outline-black disabled btn-sm">Ajouter au panier</button>
        </div>
     </div>
 </div>
 <p class="text-center mt-3">NB: Pour des raison techniques, il n'est pas possible de passer vos commendes via la plateforme.
     Allez à l'espace contact et contactez votre commerçant
 </p>
 <p class="green-text font-weight-bold h5 mt-5">Articles récents</p>
 <hr class="hr-bold">
 <?php if (count($shop)==0) { ?> 
    <p class="text-center mt-5 font-weight-bold text-warning">Aucun article disponible !!</p> 
 <?php } ?> 
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
                    <a href="{{route('detailarticle_blog', $item)}}"><h5 class="card-title orange-text font-weight-bold text-center" style="height:50px">{{$item->nom}}</h5></a>
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
