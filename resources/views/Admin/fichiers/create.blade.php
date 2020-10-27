@extends('layouts.layoutAdmin')
@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-12 col-lg-12 col-md-12">
              <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-5">
                <h1>Formulaire d'Ajout d'une annonce</h1>
                <div class="text-right">
                    <a href="{{route('projets.index')}}"><button class=" btn btn-sm btn-primary">Consulter les projets</button></a>
                </div>
                    <form action="{{route('projet.fichiers.store', $projet->id)}}" method="POST" enctype="multipart/form-data">
                                 @include('Admin.fichiers.form')
                            <div class="text-center mt-5">
                                <button class="btn btn-success">Enregistrer</button>
                            </div>
                    </form>
                </div>
              </div>
            </div>
        </div>
        <div class="card mb-5">
        <p class="text-center h3 pt-5">Liste des fichiers du projet <span class="font-weight-bold text-success">"{{$projet->libelle }}"</span></p>
        <div class="table-responsive p-5">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                          <th>Num</th>
                          <th>Titre</th>
                          <th>Fichiers</th>
                          <th class="">Type Fichier</th>
                          <th>Date postée </th>
                          <th>Options</th>
                      </tr>
                  </thead>
                  <tfoot>
                      <tr>
                          <th>Num</th>
                          <th>Titre</th>
                          <th>Fichiers</th>
                          <th class="">Type Fichier</th>
                          <th>Date postée </th>
                          <th>Options</th>
                      </tr>
                    
                  </tfoot>
                  <tbody>
                    @php($nombre=0)
                    @foreach ( $projet->fichier as $fichier )
                    <tr>
                      <td>{{++$nombre}}</td>
                      <td>{{$fichier->title}}</td>
                      <td class="d-flex text-center  justify-content-center align-items-center">
                        <?php if($fichier->type == 'Image') { ?>
                            <a href="{{asset($fichier->file_path)}}" title="Ouvrir l'image " target="_blank">
                                <img src="{{asset($fichier->file_path)}}" width="100px" class="img-fluid" alt="image_{{$fichier->nom}}">
                            </a>
                        <?php } ?>
                        <?php if ($fichier->type == 'Video'): ?>
                            <video  preload='auto' controls width="300" height="120" >
                            <source src="{{asset($fichier->file_path)}}" type="video/mp4">
                            <source src="{{asset($fichier->file_path)}}" type="video/mpeg">
                            <source src="{{asset($fichier->file_path)}}" type="video/avi">
                            <source src="{{asset($fichier->file_path)}}" type="video/3gp">
                            </video>
                        <?php endif ?>
                                
                        <?php if ($fichier->type == 'Fichier'): ?>
                                <a href="{{asset($fichier->file_path)}}" title="Ouvrir le document" target="_blank"><img src="{{asset('img/Files.png')}}" width="100px" class="img-fluid"  ></a>
                        <?php endif ?>
                      </td>
                    <td>{{$fichier->type}}</td>
                      <td>{{$fichier->created_at}}</td>
                      <td class="text-center">
                         
                        <form onclick="return confirm('Etes-vous sure de vouloir supprimer definiment ce fichier ?')" action="{{route('projet.fichiers.destroy',[$projet, $fichier])}}" method="POST" style="display: inline">
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
@endsection
