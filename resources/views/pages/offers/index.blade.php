@extends('layouts.layoutUser', ['page' => 'Offres'])

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

<div class="container">
    <div class="green pb-1 px-5 rounded mt-4">

        <form action="{{ route('findOffre') }}" method="POST">
            @csrf
            <div class="row d-flex align-items-center justify-content-center">
                <div class="col-lg-6 justify-content-sm-center justify-content-lg-center">
                  <div class="row pt-3 ">
                    <div class="form-group mr-3">
                        <select class="browser-default custom-select" name="type_offre" style="border-color: darkorange; ">
                            <option selected disabled>Choisir une categorie</option>
                            <option value="Emploi">Emploi</option>
                             <option value="Stage">Stage</option>
                        </select>
                    </div>
                    <div class="form-group ">
                        <select class="browser-default custom-select" name="type_contrat" style="border-color: darkorange; ">
                            <option selected disabled>Type contrat</option>
                            <option value="CDD" >Contrat à durée déterminée</option>
                           <option value="CDI" >Contrat à durée indéterminée</option>
                        </select>
                    </div>
    
                  </div>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                  <div class="col-md-8">
                        <input class="form-control form-control-md  mr-3 w-100" type="text" name="titre" placeholder="Saisir un mot clé" aria-label="Search" style="border-color: darkorange; ">
                  </div>
                  <div class="col-md-4">
                    <input type="submit" class="btn-sm btn-primary" value="Recherchez" >
                  </div>
                </div>
                </div>
             </div>
        </form>
        </div>
 <p class="my-5 text-center h6 mx-5">Vous êtes intéréssés par une offre, 
     faites le choix sur celle qui vous convient et deposez vos documents à l'offreur  
 </p>

@if (count($emplois)==0)
    <p class="text-warning text-center font-weight-bold my-3">
        Aucune offre disponible !!
    </p>
@endif
<div class="table-responsive">
<table class="table table-hover w-100">
<tbody>
    @foreach ($emplois as $item)
     <tr>
         <td  class="text-center text-wrap">
            <?php if ($item->image_path): ?>
            <div class="align-items-center text-center d-flex justify-content-center">
              <a href="{{$item->image_path}}" target="_blank"><img src="{{asset($item->image_path)}}" width="60" class=" " alt="{{$item->image}}"></a>
            </div>
            <?php else: ?>
                <p class="text-center">
                    <img src="https://img.icons8.com/fluent/48/000000/find-matching-job.png"/>
                </p>
            <?php endif ?><br>
             <span class="text-center">{{$item->created_at->format('d M Y')}}</span>
          </td>
        <td class="">
        <a href="{{route('details_emplois', $item)}}"> <strong class="grey-tex font-weight-bold" style="font-size: 1.3em">{{ $item->titre}}</strong>
            <p class="text-muted mt-2">
                @php
                $description=$item->description;
            if (strlen($description  )>80)
                {
                $description=substr($description, 0, 80);
                $dernier_mot=strrpos($description," ");
                $description=substr($description,0,$dernier_mot)."...";
                }
            @endphp
                {{$description}}
            </p>
            <p class="mt-4"><i class="fas fa-at"></i> <span class="font-weight-bold">Email:</span> {{ $item->email_post}} &nbsp;&nbsp;&nbsp;<i class="green-text fas fa-search-location"></i> {{ $item->lieu}}</p></a>
        </td>
        <td class="text-center">
          <a href="{{route('details_emplois', $item)}}">
                <?php if ($item->type_contrat=="CDD"){ ?>
                    <span class="label btn-success px-2 rounded">CDD</span>            
                <?php 
                }
                elseif($item->type_contrat=="CDI"){ ?>
                    <span class="label btn-primary px-2 rounded">CDI</span>
                <?php
                }
                elseif($item->type_contrat=="Stage"){ ?>
                    <span class="label btn-warning px-2 rounded">Stage</span> 
                <?php 
                } 
                else {  ?>
                    <span class="label btn-danger px-2 rounded">Autre</span>
                <?php } ?>
              <p class="mt-3"> Fin de l'offre: {{ $item->date_fin->format('d M Y')}}</p>
          </a>
        </td>
     </tr> 
    @endforeach
  </tbody>
</table>
</div>
<hr class=" mb-4"  style="height: 1px;   background-color: rgb(0,166,80);">
</div>

@endsection