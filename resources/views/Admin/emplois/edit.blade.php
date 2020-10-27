@extends('layouts.layoutAdmin')


@section('content')

    <div class="container">
            <div class="row justify-content-center">
              <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="card o-hidden border-0 shadow-lg my-5">
                  <div class="card-body p-5">
                    <!-- Nested Row within Card Body -->
                    <h1>Formulaire de modification d'un offre </h1>
                    <div class="text-right">
                        <a href="{{route('emplois.index')}}"><button class=" btn btn-sm btn-primary">Liste des emplois</button></a>
                    </div>
                    <form action="{{route('emplois.update', $emploi->id)}}" method="POST" enctype="multipart/form-data">
                        @method('PATCH')

                        @include('Admin.emplois.form')
                        <div class="text-center mt-5">
                            <button class="btn btn-sm btn-success">
                                Modifier
                            </button>
                        </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>

@endsection
