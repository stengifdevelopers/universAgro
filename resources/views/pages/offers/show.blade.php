@extends('layouts.layoutUser', ['page' => 'Offres'])

@section('content')


 <div class="mx-5 mt-5">
   <div class="row">
     <div class="col-lg-8">
        
         <?php 
         
            //  $idurl =1 ;
            //  $nbv= $_GET['vue'] +1;
             
                         
             $today = date("Y-m-d");
             
             $diff = abs(strtotime($emplois->date_fin) - strtotime($today));
             $years = floor($diff / (365*60*60*24));
             $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
             $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

         
         
         ?>
         <?php if ( $today > $emplois->date_fin): ?>
            <p class="alert-danger p-2 rounded-top text-center font-weight-bold" style="font-size: 1.2em">Cette offre est achevée</p>
         <?php else: ?>
            <p class="alert-danger p-2 rounded-top text-center font-weight-bold" style="font-size: 1.2em"> Cette offre s'achève dans <?= $months. " ". "mois". " ". $days ?> jours !!! </p>
         <?php endif ?>
       <div class="widget dark">
         <p class="font-weight-bold  widget-title line-bottom black-text" title="Offre d'emploi" style="font-size: 1.3em">{{$emplois->titre}}  
         <span class="font-weight-bold  float-right black-text" style="font-size: 0.9em"> <span class="label btn-warning px-2 rounded" title="Type de contrat">{{$emplois->type_contrat}}</span></span><br>
          <span style="font-size: 0.7em">&nbsp;&nbsp;<i class="fas fa-business-time"></i> Posté le:  {{$emplois->created_at->format('d M Y à H:m:s')}}</span>
         </p>

       </div>
       <table class="table table-borderless table_style">
         <tbody >
             <tr>
                 <!-- <td>Posté : 18-06-2019</td> -->
                 <td><i class="fas fa-store-alt"></i> Société/Structure : <span class="font-weight-bold">{{$emplois->society}}</span></td>
             </tr>
             <tr>
                 <td><i class="fas fa-map-marked-alt"></i> Lieu : {{$emplois->lieu}}</td>
                 <td><i class="far fa-eye"></i> Vues :{{$emplois->view}}</td>
             </tr>
             <tr>
                 <td><i class="fas fa-book-reader"></i> Type de contrat :  
                     <?php 
                                  if ($emplois->type_contrat=="CDD") {
                                       
                                       echo " Contrat à durée Déterminée (CDD)";

                                  } elseif ($emplois->type_contrat=="CDI") {

                                     echo " Contrat à Durée Indéterminée (CDI)";

                                  } elseif ($emplois->type_contrat=="Stage") {

                                      echo " Contrat de Stage";
                                  }else {

                                     echo " Non déterminée";
                                  }

                              ?>  </td>
                 <td><i class="far fa-envelope"></i> Postuler via le mail :<span class="yellow px-1 rounded font-weight-bold">{{$emplois->email_post}}</span></td>
                 
             </tr>
                                 <tr>
                     <td><i class="fas fa-stopwatch"></i> Date expiration : <span class="font-weight-bold grey-text">{{$emplois->date_fin->format('d M Y')}}</span></td>
                 </tr>
         </tbody>
     </table>


      <hr style="height:4px; background-color:  rgba(0, 188, 212, 0.1)">
      
     <h4 class="text-center mt-3 mb-2 font-weight-bold">{{$emplois->titre}}</h4>
    <p class="text-justify" style="font-size: 1.2em">
        {{$emplois->description}}
    </p>
    <p class="text-justify">
      <span class="font-weight-bold"> Pièces à fournir:</span> <br> {{$emplois->documents}}
    </p>

<p class="font-weight-bold mt-2"><span>Autres Offres</span><span class="float-right"><a href="{{route('offers')}}">Consulter la liste</a></span></p>
     <hr class="grey" style="height:1px; margin-top: -12px" >
     <?php if (count($last)==0) { ?> 
        <p class="text-center mt-5 font-weight-bold text-warning">Aucune offre disponible !!</p> 
     <?php } ?> 
     <table class="table table-hover table-responsive w-100">
        <tbody>
            @foreach ($last as $item)
             <tr>
                 <td  class="text-center text-wrap" style="width: 10% ;">
                    <?php if ($item->image_path): ?>
                    <div class="align-items-center text-center d-flex justify-content-center">
                      <a href="{{$item->image_path}}" target="_blank"><img src="{{asset($item->image_path)}}" class="w-75 img-fluid" alt="{{$item->image}}"></a>
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
                        {{$item->description}}
                    </p>
                    <p class="mt-4"><i class="fas fa-at"></i> Email: {{ $item->email_post}} &nbsp;&nbsp;&nbsp;<i class="green-text fas fa-search-location"></i> {{ $item->lieu}}</p></a>
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
     <hr>

   </div>

     <div class="col-lg-4 mt-5 text-center">
       <div class="mt-4 white-text">.</div>
       <div class="widget dark">
         <h1 class="widget-title line-bottom black-text" style="font-size:1.3em;">Notes d'Informations</h1>
         <div id="carousel-example-multi" class="carousel slide carousel-multi-item my-3" data-ride="carousel">
                 <div class="carousel-inner " role="listbox">

                     <div class="carousel-item active ">
                         <div class="col-lg-12 col-md-6">
                             <div class="card text-center">
                                 <img class="card-img-top rounded" height="500px" src="../public/img/images/pub5.jpg"  alt="Pub 1">

                             </div>
                         </div>
                     </div>
                     <div class="carousel-item">
                         <div class="col-lg-12 col-md-6">
                             <div class="card  text-center">
                                 <img class="card-img-top rounded" height="500px" src="../public/img/images/pub6.jpg" alt="Pub 2">

                             </div>
                         </div>
                     </div>
                     <div class="carousel-item">
                         <div class="col-lg-12 col-md-6">
                             <div class="card  text-center">
                                 <img class="card-img-top rounded" height="500px " src="../public/img/images/pub7.jpg" alt="Pub 3">

                             </div>
                         </div>
                     </div>
                 </div>

             </div>
       </div>
     </div>
   </div>
 </div>

@endsection