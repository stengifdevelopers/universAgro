@extends('layouts.layoutAdmin')


@section('content')

<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3 align-items-center">
        <h2 class="m-0 font-weight-bold text-primary">Liste des articles ({{$articles->count()}})

        </h2>
        <div class="text-right">
            <a href="{{route('articles.create')}}" class="btn btn-primary btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Ajouter Article</font></font></span>
            </a>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr class="text-center">
                <th>Num</th>
                <th>Nom article</th>
                <th>Description</th>
                <th>Prix</th>
                <th>Rabais</th>
                <th>Categories</th>
                <th>Images</th>
                <th>Options</th>
              </tr>
            </thead>
            <tfoot>
              <tr class="text-center">
                <th>Num</th>
                <th>Nom articles</th>
                <th class="w-50">Descriptions</th>
                <th>Prix</th>
                <th>Rabais</th>
                <th>Categories</th>
                <th>Images</th>
                <th>Options</th>
              </tr>
            </tfoot>
            <tbody>
              @php($nombre=0)
              @foreach ( $articles as $article )
              <tr>
                <td>{{++$nombre}}</td>
                <td>{{$article->nom}}</td>
                <td>{{substr($article->description , 0, 145).'...'}}</td>
                <td>{{$article->prix}}</td>
                <td>{{$article->prixRabais}}</td>
                <td>{{$article->categories->nom}}</td>
                <td class="d-flex  justify-content-center align-items-center">
                    <a href="{{asset($article->fichier_path)}}" target="_blank"><img src="{{asset($article->fichier_path)}}" class="w-50 img-fluid" alt="{{asset($article->fichier)}}"></a>
                </td>
                <td class="text-center">
                    <a href="{{route('articles.edit', $article->id)}}" class="btn btn-info btn-sm btn-circle">
                            <i class="fas fa-edit"></i>
                    </a>
                    {{-- <a href="{{route('articles.destroy', $article)}}" data-method="DELETE" data-ss="btn btn-info btn-sm btn-circle">
                        <i class="fas fa-delete"></i>
                    </a> --}}

                    <form onclick="return confirm('Etes-vous sure de vouloir supprimer cet article')" action="{{route('articles.destroy', $article)}}" method="POST" style="display: inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class=" btn btn-sm btn-circle btn-danger my-4"><i class="fas fa-trash"></i></button>
                    </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>



@endsection
