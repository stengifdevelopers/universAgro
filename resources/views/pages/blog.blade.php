@extends('layouts.layoutUser', ['page' => 'Blogs'])

@section('content')

<style type="">
 .size2{
   font-size: 1.2em
 }
 .size3{
   font-size: 1.3em
 }
 .size6{
   font-size: 1.6em
 }
</style>
</header>
<div class="view mt-0 pt-0">
 <img src="assets/img/Ban_blog.jpg" class="img-fluid w-100">
 <div class="mask  waves-effect waves-light justify-content-center d-flex align-items-center">
    <div class="row ">
        <div class="col-md-12 text-center">
            <h3 class="white-text h3-responsive font-weight-bold text-uppercase text-center">
                AgroCam237 vous offre la possibilité de vous exprimer,
                de <br> communiquer et de mettre  en valeur votre<br> production à travers un blog
            </h3>
        </div>
    </div>
</div>
</div>
<section class="mt-">
 <div class="container">

   <p class="font-weight-bold my-5 mx-5 text-center wow fadeIn Up  size6">REJOIGNEZ NOTRE COMMUNAUTE D'AGRICULTURE ET D'ELEVEURS EN CREANT LE VOTRE DES AUJOURD'HUI</p>
   <center>
     <a href="{{ route('blogs.create') }}"> <button class="btn btn-orange"><i class="fas fa-arrow-right"></i> Créer un blog gratuitement</button></a>
   </center>
   <div class="green pb-1 px-5 rounded mt-4">

    <form action="{{ route('findBlog') }}" method="POST">
        @csrf
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-8 col-md-9 ">
              <div class="row pt-3 ">
                <div class="form-group ">
                    <select class="browser-default custom-select" name="secteur" style="border-color: darkorange; ">
                        <option selected disabled>Choisir le secteur</option>
                        <optgroup label="Agriculture">
                            <option value="Agriculture-Arboriculture">Arboriculture</option>
                            <option value="Agriculture-Cultures maraicheres">Cultures maraicheres</option>
                            <option value="Agriculture-Viticulture">Viticulture</option>
                        </optgroup>
                        <optgroup label="Elevage">
                            <option value="Elevage-Aulacodiculture">Aulacodiculture</option>
                            <option value="Elevage-Bovin">Bovin</option>
                            <option value="Elevage-Caprin">Caprin</option>
                            <option value="Elevage-Cuniculture">Cuniculture</option>
                            <option value="Elevage-Heliculture">Heliculture</option>
                            <option value="Elevage-Ovin">Ovin</option>
                            <option value="Elevage-Pisciculture">Pisciculture</option>
                            <option value="Elevage-Porciculture">Porciculture</option>
                        </optgroup>
                        <optgroup label="Agro-industries">
                          <option value="Transformation-Agroindustries">Industrie de transformation</option>
                        </optgroup>
                        <optgroup label="Autres">
                            <option value="Autres">Autres</option>
                        </optgroup>
                    </select>
                </div>
              </div>
            </div>
            <div class="col-lg-3 text-left">
                <input type="submit" class="btn-sm btn btn-primary" value="Recherchez" >
            </div>
         </div>
    </form>
    </div>
<div class="row" syle="margin-top: 123px">
  @foreach ($blogs as $item)
  <div class="col-lg-4 col-md-6 wow fadeIn Up">
    <div class=" testimonial-card grey lighten-3">
      <div class="card-up white lighten-1"></div>
      <div class="avatar mx-auto white">
        <?php if ($item->profile_path): ?>
            <a href=""><img src="{{asset($item->profile_path)}}" width="120" class="img-fluid rounded-circle img-thumbnail shadow-sm" alt="{{$item->profile}}"></a>
        <?php else: ?>
            <a href=""><img src="{{asset('img/utilities/default.png')}}" width="120" class="img-fluid rounded-circle img-thumbnail shadow-sm" alt="default.png"></a>
        <?php endif ?>
        {{-- <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20%2810%29.jpg" class="rounded-circle" alt="woman avatar"> --}}
      </div>
      <div class="card-body ">
        <h4 class="card-title" style="height: 50px ">

        @php
          $description=$item->titre;
          if (strlen($description  )> 40)
              {
              $description=substr($description, 0,  40);
              $dernier_mot=strrpos($description," ");
              $description=substr($description,0,$dernier_mot)."...";
              }
          @endphp
          {{$description}}
        </h4>
        <hr>
        <p style="height: 80px; "><i class="fas fa-quote-left"></i>
          @php
            $description=$item->description;
          if (strlen($description  )>150)
              {
              $description=substr($description, 0, 150);
              $dernier_mot=strrpos($description," ");
              $description=substr($description,0,$dernier_mot)."...";
              }
          @endphp
              {{$description }}
               <i class="fas fa-quote-right"></i>
        </p>
      </div>
    </div>
      <div class="text-center my-2">
       <a href="{{ route('home_blog', $item->blog_id) }}"><button class="btn" style="background-color: saddlebrown"><i class="fas fa-arrow-right"></i> Visiter le blog</button></a>
      </div>
  </div>
  @endforeach

</div>
</section>
@endsection
