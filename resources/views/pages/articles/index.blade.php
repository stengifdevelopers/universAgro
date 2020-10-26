@extends('layouts.layoutUser', ['page' => 'Shop'])

@section('content')
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
<div class="container my-5">
    <div class="green pb-1 px-5 rounded">

    <form action="{{ route('findArticle') }}" method="POST">
        @csrf
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-6 justify-content-sm-center justify-content-lg-center">
              <div class="row pt-3 ">
                <div class="form-group mr-3">
                    <select class="browser-default custom-select" name="id" style="border-color: darkorange; ">
                        <option selected disabled>Choisir une categorie</option>
                        @foreach ($listCategories as $listCategories)
                        <option value="{{$listCategories->id}}">{{$listCategories->nom}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group ">
                    <select class="browser-default custom-select" name="prix" style="border-color: darkorange; ">
                        <option selected disabled>Trier par prix</option>
                        @foreach ($articlesPrix as $item)
                        <option value="{{$item->prix}}">{{$item->prix}}</option>
                        @endforeach
                    </select>
                </div>

              </div>
            </div>
            <div class="col-lg-6">
                <div class="row">
              <div class="col-md-8">
                    <input class="form-control form-control-md  mr-3 w-100" type="text" name="nom" placeholder="Saisir un mot clé" aria-label="Search" style="border-color: darkorange; ">
              </div>
              <div class="col-md-4">
                <input type="submit" class="btn-sm btn-primary" value="Recherchez" >
              </div>
            </div>
            </div>
         </div>
    </form>
    </div>
    @if (count($articles)==0)
    <p class="text-warning text-center font-weight-bold mt-5">
        Aucun article disponible dans la boutique !!
    </p>
    @endif
    <div class="row mt-5">
    @foreach ($articles as $item)
     <div class="col-lg-3 col-md-6 wow fadeIn mb-3">
            <div class="card">
                <div class="view">
                    <img src="{{asset($item->fichier_path)}}" class="card-img-top img-fluid" style="max-height: 25vh; height: 25vh" alt="{{$item->fichier}}">
                      <a href="{{route('article_details', $item)}}">
                        <div class="mask rgba-white-slight d-flex align-items-center justify-content-end">
                            @php if($item->pourcentRed != 0 )
                              echo '<span class="red py-2 px-3 white-text font-weight-bold" style="opacity: 0.8"> -'.$item->pourcentRed.' %</span>';
                            @endphp
                        </div>
                    </a>
                </div>
                    <div class="card-body text-center">
                    <a href="{{route('article_details', $item)}}">
                        <h5 class="card-title orange-text font-weight-bold text-center " style="height:30px">
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
                        <div class="d-flex justify-content-center text-center">
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
