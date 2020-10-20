@extends('layouts.layoutAdmin')


@section('content')

<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3 align-items-center">
        <h2 class="m-0 font-weight-bold text-primary">Liste des projets ({{$projets->count()}})</h2>
        <div class="text-right">
            <a href="{{route('projets.create')}}" class="btn btn-primary btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Ajouter projet</font></font></span>
            </a>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Num</th>
                    <th>Titre</th>
                    <th class="">Description</th>
                    <th>Date postée </th>
                    <th>Nombre de Fichiers</th>
                    <th>Nombre de vue</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Num</th>
                    <th>Titre</th>
                    <th class="">Description</th>
                    <th>Date postée </th>
                    <th>Nombre de Fichiers</th>
                    <th>Nombre de vue</th>
                    <th>Options</th>
                </tr>
            </tfoot>
            <tbody>
              @php($nombre=0)
              @foreach ( $projets as $projet )
              <tr>
                <td>{{++$nombre}}</td>
                <td>{{$projet->libelle}}</td>
                <td>{{substr($projet->description , 0, 145).'...'}}</td>
                <td class="text-center">{{$projet->created_at}}</td>
                <td class="text-center">{{$projet->fichier->count()}}</td>
                <td class="text-center">{{$projet->nombre_vue}}</td>
                <td class="text-center">
                    <a href="{{route('projets.edit', $projet->id)}}" title="Modifier le projet" class="btn btn-success btn-sm btn-circle">
                            <i class="fas fa-edit"></i>
                    </a>
                    <form onclick="return confirm('Etes-vous sure de vouloir supprimer cette projet')" action="{{route('projets.destroy', $projet)}}" method="POST" style="display: inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class=" btn btn-sm btn-circle btn-danger my-4" title="Supprimer le projet"><i class="fas fa-trash"></i></button type="submit">
                    </form>
                    <a href="{{route('projet.fichiers.create', $projet->id)}}" title="Gérer les fichiers du projet" class="btn btn-info btn-sm btn-circle">
                        <i class="fas fa-file"></i>
                </a>
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
