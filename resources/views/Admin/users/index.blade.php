@extends('layouts.layoutAdmin')


@section('content')

<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3 align-items-center">
        <h2 class="m-0 font-weight-bold text-primary">Liste des utilisateurs ({{$users->count()}})</h2>
        <div class="text-right">
            <a href="{{route('users.create')}}" class="btn btn-primary btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Ajouter user</font></font></span>
            </a>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th class="text-center">Num</th>
                    <th class="text-center">Nom</th>
                    <th class="text-center">Pseudo</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Role</th>
                    <th class="text-center">Date postée </th>
                    <th class="text-center">Etat</th>
                    <th class="text-center">Options</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th class="text-center">Num</th>
                    <th class="text-center">Nom</th>
                    <th class="text-center">Pseudo</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Role</th>
                    <th class="text-center">Date postée </th>
                    <th class="text-center">Statut</th>
                    <th class="text-center">Options</th>
                </tr>
            </tfoot>
            <tbody>
                @php
                $rl=Auth::user()->role==4;
            @endphp
              @php($nombre=0)
              @foreach ( $users as $user )
              <tr>
                <td>{{++$nombre}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->pseudo }}</td>
                <td>{{$user->email}}</td>
                <td>
                    <?php
                        if($user->role==4){
                           echo "Super Admin" ;
                        }elseif ($user->role==3) {
                          echo "Administrateur";
                        }elseif ($user->role==2) {
                          echo "Editeur(trice)";
                        } elseif($user->role==1){

                        }elseif ($user->role==0) {
                            echo "Utilisateur" ;
                        }
                    ?>
                </td>
                <td>{{$user->created_at}}</td>
                <td class="text-cenetr justify-content-center align-items-center">

                    <?php if ($user->etat==0): ?>
                       <button class="btn btn-warning btn-sm">Désactivé</button>
                    <?php else : ?>
                       <button class="btn btn-success btn-sm">Actif</button>
                    <?php endif ?>
                </td>
                {{-- <td class="d-flex  justify-content-center align-items-center">
                </td>  --}}
                <td class="text-center">

                    @can('update', App\UserPost::class)
                    <?php if (Auth::user()->id == $user->id): ?>
                     <a href='{{route('profile.edit', $user->id)}}'
                         class='btn btn-info  btn-sm btn-circle'>
                        <i class='fas fa-edit'></i>
                     </a>
                    <?php else: ?>
                      <a href='{{route('users.edit', $user->id)}}'
                        class='btn btn-info  btn-sm btn-circle'>
                            <i class='fas fa-edit'></i>
                      </a>
                    <?php endif ?>
                    @endif
                    @can('delete', App\UserPost::class)
                     @if (Auth::user()->id != $user->id)
                     {{-- <form class="btndel" action="{{route('users.destroy', $user->id)}}" method="POST" style="display: inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class=" btn btn-sm btn-circle btn-danger my-4">
                            <i class="fas fa-trash"></i></button>
                    </form> --}}

                    <form onclick="return confirm('Etes-vous sure de vouloir supprimer cet article')" action="{{route('users.destroy', $user)}}" method="POST" style="display: inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class=" btn btn-sm btn-circle btn-danger my-4"><i class="fas fa-trash"></i></button>
                    </form>
                     @endif
                    @endif
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <script>
      $(".btndel").on('click', function(e){
          e.preventDefault();
           $action = $(this).attr('action')
            Swal.fire({
            title: 'Etes vous sûre?',
            text: "Vous êtes sur le point de supprimer cet utilisateur !",
            icon: 'question',
            showCancelButton: true,
            showCloseButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Annuler',
            confirmButtonText: 'Oui, Supprimer!'
            }).then((result) => {
            if (result.value) {
               document.location.href = $action;
            }
            })
      })
  </script>
@endsection
