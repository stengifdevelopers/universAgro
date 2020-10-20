@extends('layouts.layoutAdmin')


@section('content')



    <div class="container">
            <!-- Outer Row -->
            <div class="row justify-content-center">

              <div class="col-xl-12 col-lg-12 col-md-12">

                <div class="card o-hidden border-0 shadow-lg my-5">
                  <div class="card-body p-5">
                    <!-- Nested Row within Card Body -->
                    <h1>Formulaire d'Ajout d'un article</h1>
                    <div class="text-right">
                        <a href="{{route('articles.index')}}"><button class=" btn btn-sm btn-primary">Liste des Articles</button></a>
                    </div>
                    <form action="{{route('articles.store')}}" method="POST" enctype="multipart/form-data">
                        @include('Admin.articles.form')
                        <div class="text-center mt-5">
                            <button class="btn btn-sm btn-success">
                                Valider
                            </button>
                        </div>
                    </form>
                  </div>
                </div>

              </div>

            </div>

          </div>

@endsection
