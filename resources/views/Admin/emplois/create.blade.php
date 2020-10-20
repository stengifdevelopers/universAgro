@extends('layouts.layoutAdmin')

@section('content')

<div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-12 col-lg-12 col-md-12">
              <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-5">
                <h1>Formulaire d'Ajout d'une offre</h1>
                <div class="text-right">
                    <a href="{{route('emplois.index')}}"><button class=" btn btn-sm btn-primary">Liste des offres</button></a>
                </div>
                    <form action="{{route('emplois.store')}}" method="POST" enctype="multipart/form-data">
                                 @include('Admin.emplois.form')
                            <div class="text-center mt-5">
                                <button class="btn btn-success">Enregistrer</button>
                            </div>
                    </form>
                </div>
              </div>
            </div>
        </div>
</div>
@endsection
