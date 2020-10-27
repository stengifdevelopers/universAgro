@extends('layouts.layoutAdmin')


@section('content')

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Gestion du Blog</h1>
            @if (!$blog2 && !$blog )
             {{-- @if (isset($blog) && session('blog')->etat==null) --}}
              <a href="{{ route('blogs.create') }}"
                 class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Créer un Blog
              </a>
             {{-- @endif --}}
             @elseif($blog2->etat==0 || $blog2->etat==1)
             <a href="{{ route('blogs.create') }}"
              class="d-none d-sm-inline-block btn btn-sm disabled btn-primary shadow-sm" ><i class="fas fa-download fa-sm text-white-50" ></i> Créer un Blog 
             </a>
            @endif
        </div>
          <div class="col-lg-12 mb-4">

            <!-- Illustrations -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Information sur mon Blog mon Blog
                    @if ($blog)({{ $blog->titre}})
                    @else
                     (Aucune donnée disponible)
                    @endif</h6>
              </div>
              <div class="card-body">
                <div class="text-center">
                    <table class="table table-bordered table-hover" width="100%" cellspacing="0">
                        <thead>
                            <th>Categorie</th>
                            <th>Secteur</th>
                            <th>Date de création</th>
                        </thead>
                        @if ($blog)
                        <tbody>
                            <td>{{ $blog->categories}}</td>
                            <td>{{ $blog->secteur}}</td>
                            <td>{{ $blog->created_at}}</td>
                        </tbody>
                        @else
                            (Aucun blog associé à ce compte)
                        @endif
                    </table>
                  {{-- <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="img/undraw_posting_photo.svg" alt=""> --}}
                </div>
                <p> </p>
                <a target="_blank" rel="nofollow" href="">Modifier mes information du Blog &rarr;</a>
              </div>
            </div>

            <!-- Approach -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Description</h6>
              </div>
              <div class="card-body">
                <p class="text-">
                  @if ($blog)
                    <span class="text-justify">{{ $blog->description}}</span>
                  @else
                    <div class="text-center">(Aucun blog associé à ce compte)</div>
                  @endif
                </p>
              </div>
            </div>

          </div>
          <!-- Content Row -->


        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
      @endsection
