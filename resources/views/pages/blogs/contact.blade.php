@extends('layouts.layoutBlog', ['page' => 'Blogs'])

@section('content')

<div class=" justify-content-center container mt-4">
    <div class="row justify-content-center">
       <div class="col-md-12 col-lg-12 ">
           <div class="col-md-12 col-lg-12 mb-2">
   
               <h3 class="grey-text text-center  font-weight-bold mb-2">Nous contacter</h3>
               <hr class=" mb-2 grey mt-4"  style="height: 1px;">
   
               <h4 class="black-text  text-center   font-weight-bolder mt-4 mb-2">Veuillez nous contactez aus adresses suivantes pour toutes informations suplémentaires</h4>
   <style>
       .size3{
           font-size: 1.3em
       }
   </style>    @foreach ($datas as $item)
                    
               
               <div class="mb-2 mt-4 px-4">
               <p class=" black-text size3"><span class="font-weight-bold">Tél : </span> {{$item->phone}}</p>
               <p class=" black-text size3"><span class="font-weight-bold">Whatsapp : </span> {{$item->whatsapp}}</p>
               <p class=" black-text size3"><span class="font-weight-bold">E-mail  :</span> {{$item->email}} </p>
               <p class=" black-text size3"><span class="font-weight-bold">Siège :</span> {{$item->departement}}-{{$item->region}} (Cameroun) </p> 
               <p class=" black-text size3 mt-4"><span class="font-weight-bold">Suivez-nous :</span> </p>
               <p class=" black-text size3 ml-4"> <span class="text-muted">Facebook</span> :  {{$item->facebook}} </p>
               <p class=" black-text size3 ml-4"> <span class="text-muted">Site Web</span> :  <a  href="{{$item->url}}" >{{$item->url}}</a> </p>
              
               @endforeach
            </div>
           </div>
           <div class="mt-5">
               <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">
                       <div class="carousel-inner" role="listbox">
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
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
@endsection
