@extends('layouts.layoutAdmin')


@section('content')

<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3 align-items-center">
        <h2 class="m-0 font-weight-bold text-primary">Liste des blogs ({{$blogs->count()}})

        </h2>
        <div class="text-right">
            <a href="" class="btn btn-primary btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Ajouter blog</font></font></span>
            </a>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr class="text-center">
                <th>Num</th>
                <th>Nom Utilsateur</th>
                <th>Nom Blog</th>
                <th>Titre</th>
                <th>Categories</th>
                <th>Date Creation</th>
                <th>Statut</th>
                <th>Options</th>
              </tr>
            </thead>
            <tfoot>
              <tr class="text-center">
                <th>Num</th>
                <th>Nom Utilsateur</th>
                <th>Nom Blog</th>
                <th>Titre</th>
                <th>Categories</th>
                <th>Secteur</th>
                <th>Date Creation</th>
                <th>Statut</th>
                <th>Options</th>
              </tr>
            </tfoot>
            <tbody>
              @php($nombre=0)
              @foreach ( $blogs as $blog )
              <tr>
                <td>{{++$nombre}}</td>
                <td>{{$blog->users->name}}</td>
                <td>{{$blog->titre}}</td>
                <td>{{substr($blog->description , 0, 145).'...'}}</td>
                <td>{{$blog->categorie}}</td>
                <td>{{$blog->secteur}}</td>
                <td>{{$blog->created_at}}</td>
              
                {{-- <td class="text-center">
                    <a href="{{route('blogs.edit', $blog->id)}}" class="btn btn-info btn-sm btn-circle">
                            <i class="fas fa-edit"></i>
                    </a> --}}
                    {{-- <a href="{{route('blogs.destroy', $blog)}}" data-method="DELETE" data-ss="btn btn-info btn-sm btn-circle">
                        <i class="fas fa-delete"></i>
                    </a> --}}
{{-- 
                    <form onclick="return confirm('Etes-vous sure de vouloir supprimer cet blog')" action="{{route('blogs.destroy', $blog)}}" method="POST" style="display: inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class=" btn btn-sm btn-circle btn-danger my-4"><i class="fas fa-trash"></i></button>
                    </form>
                </td> --}}
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>



@endsection
