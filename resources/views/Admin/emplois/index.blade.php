
@extends('layouts.layoutAdmin')


@section('content')

<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3 align-items-center">
        <h2 class="m-0 font-weight-bold text-primary">Liste des emplois ({{$emplois->count()}})</h2>
        <div class="text-right">
            <a href="{{route('emplois.create')}}" class="btn btn-primary btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Ajouter Emploi</font></font></span>
            </a>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Num</th>
                    <th>Titre Emplois</th>
                    <th class="">Description</th>
                    <th>Fichier</th>
                    <th>E-mail</th>
                    <th>Date Fin </th>
                    <th>Options</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Num</th>
                    <th>Titre Emplois</th>
                    <th class="">Description</th>
                    <th>Fichier</th>
                    <th>E-mail</th>
                    <th>Date Fin </th>
                    <th>Options</th>
                </tr>
            </tfoot>
            <tbody>
              @php($nombre=0)
              @foreach ( $emplois as $emploi )
              <tr>
                <td>{{++$nombre}}</td>
                <td>{{$emploi->titre}}</td>
                <td>{{substr($emploi->description , 0, 145).'...'}}</td>
                <td class="d-flex  justify-content-center align-items-center">
                  <?php if ($emploi->image): ?>
                    <a href="{{$emploi->image_path}}" target="_blank"><img src="{{asset($emploi->image_path)}}" class="w-75 img-fluid" alt="{{$emploi->image}}"></a>
                  <?php else: ?>
                     <p class="text-center">Aucune Image</p>
                  <?php endif ?>
                </td> 
                <td>{{$emploi->email_post}}</td>
                <td>{{$emploi->date_fin->format('d M Y')}}</td>
                <td class="text-center">
                    <a href="{{route('emplois.edit', $emploi->id)}}" class="btn btn-info btn-sm btn-circle">
                            <i class="fas fa-edit"></i>
                    </a>
                    <form onclick="return confirm('Etes-vous sure de vouloir supprimer cet emploi')" action="{{route('emplois.destroy', $emploi->id)}}" method="POST" style="display: inline">
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

<script type="text/javascript">
  $(function () {
   var bindDatePicker = function() {
    $(".date").datetimepicker({
        format:'YYYY-MM-DD',
      icons: {
        time: "fa fa-clock-o",
        date: "fa fa-calendar",
        up: "fa fa-arrow-up",
        down: "fa fa-arrow-down"
      }
    }).find('input:first').on("blur",function () {
      // check if the date is correct. We can accept dd-mm-yyyy and yyyy-mm-dd.
      // update the format if it's yyyy-mm-dd
      var date = parseDate($(this).val());

      if (! isValidDate(date)) {
        //create date based on momentjs (we have that)
        date = moment().format('YYYY-MM-DD');
      }

      $(this).val(date);
    });
  }
   
   var isValidDate = function(value, format) {
    format = format || false;
    // lets parse the date to the best of our knowledge
    if (format) {
      value = parseDate(value);
    }

    var timestamp = Date.parse(value);

    return isNaN(timestamp) == false;
   }
   
   var parseDate = function(value) {
    var m = value.match(/^(\d{1,2})(\/|-)?(\d{1,2})(\/|-)?(\d{4})$/);
    if (m)
      value = m[5] + '-' + ("00" + m[3]).slice(-2) + '-' + ("00" + m[1]).slice(-2);

    return value;
   }
   
   bindDatePicker();
 });
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
 