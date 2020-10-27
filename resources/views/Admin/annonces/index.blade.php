@extends('layouts.layoutAdmin')


@section('content')

<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3 align-items-center">
        <h2 class="m-0 font-weight-bold text-primary">Liste des annonces ({{$annonces->count()}})</h2>
        <div class="text-right">
            <a href="{{route('annonces.create')}}" class="btn btn-primary btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Ajouter Annonce</font></font></span>
            </a>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Num</th>
                    <th>Titre Annonce</th>
                    <th class="">Contenu</th>
                    <th>Type Fichier</th>
                    <th>Image</th>
                    <th>Date postée </th>
                    <th>Options</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Num</th>
                    <th>Titre Annonce</th>
                    <th class="">Contenu</th>
                    <th>Type Fichier</th>
                    <th>Image</th>
                    <th>Date postée </th>
                    <th>Options</th>
                </tr>
            </tfoot>
            <tbody>
              @php($nombre=0)
              @foreach ( $annonces as $annonce )
              <tr>
                <td>{{++$nombre}}</td>
                <td>{{$annonce->titre}}</td>
                <td>{{substr($annonce->contenu , 0, 145).'...'}}</td>
                <td>{{$annonce->typ_fichier}}</td>
                <td class="d-flex  justify-content-center align-items-center">
                  <?php if($annonce->typ_fichier == 'Image') { ?>
                    <a href="{{asset($annonce->fichier)}}" target="_blank">
                        <img src="{{asset($annonce->fichier)}}" class="w-50 img-fluid" alt="image_<?=$annonce->fichier?>">
                    </a>
                  <?php } ?>
                  <?php if ($annonce->typ_fichier == 'Video'): ?>
                    <video  preload='auto' controls width="300" height="120" >
                      <source src="{{asset($annonce->fichier)}}" type="video/mp4">
                      <source src="{{asset($annonce->fichier)}}" type="video/mpeg">
                      <source src="{{asset($annonce->fichier)}}" type="video/avi">
                      <source src="{{asset($annonce->fichier)}}" type="video/3gp">
                    </video>
                  <?php endif ?>

                  <?php if ($annonce->typ_fichier == 'Fichier'): ?>
                        <a href="{{asset($annonce->fichier)}}" target="_blank"><img src="img/Files.png" class="w-50 img-fluid"></a>
                  <?php endif ?>
                </td>
                <td>{{$annonce->created_at}}</td>
                <td class="text-center">
                    <a href="{{route('annonces.edit', $annonce->id)}}" class="btn btn-info btn-sm btn-circle">
                            <i class="fas fa-edit"></i>
                    </a>
                    <form onclick="return confirm('Etes-vous sure de vouloir supprimer cette annonce')" action="{{route('annonces.destroy', $annonce)}}" method="POST" style="display: inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class=" btn btn-sm btn-circle btn-danger my-4"><i class="fas fa-trash"></i></button type="submit">
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
