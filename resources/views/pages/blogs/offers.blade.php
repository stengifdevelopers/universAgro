@extends('layouts.layoutBlog', ['page' => 'Blogs'])

@section('content')

<div class="container mt-4">
    @if (count($offers)==0)
        <p class="text-warning text-center font-weight-bold my-3">
            Aucune offre disponible !!
        </p>
    @endif
    
    <table class="table table-hover table-responsive w-100">
        <tbody>
            @foreach ($offers as $item)
             <tr>
                 <td  class="text-center text-wrap" style="width: 10% ;">
                    <?php if ($item->image_path): ?>
                    <div class="align-items-center text-center d-flex justify-content-center">
                      <a href="{{$item->image_path}}" target="_blank"><img src="{{asset($item->image_path)}}" class="w-75 img-fluid" alt="{{$item->image}}"></a>
                    </div>
                    <?php else: ?>
                        <p class="text-center">Aucune Image</p>
                    <?php endif ?><br>
                     <span class="text-center">{{$item->created_at->format('d M Y')}}</span>
                  </td>
                <td class="">
                <a href=""> <strong class="grey-tex font-weight-bold" style="font-size: 1.3em">{{ $item->titre}}</strong>
                    <p class="text-muted mt-2">
                        {{$item->description}}
                    </p>
                    <p class="mt-4"><i class="fas fa-store-alt"></i> Email: {{ $item->email_post}} &nbsp;&nbsp;&nbsp;<i class="green-text fas fa-search-location"></i> Douala</p></a>
                </td>
                <td class="text-center">
                  <a href="">
                      <span class="label btn-primary px-2 rounded">CDD</span>
                      <p class="mt-3"> Fin de l'offre: {{ $item->date_fin}}</p>
                  </a>
                </td>
             </tr> 
            @endforeach
          </tbody>
       </table>
    <hr class=" mb-4"  style="height: 1px;   background-color: rgb(0,166,80);">
    <div>
        <!--Carousel Wrapper-->
        <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">

            <!--Controls-->
            <div class="controls-top">
                <a class="btn-floating" href="#multi-item-example" data-slide="prev"><i class="fas fa-chevron-left"></i></a>
                <a class="btn-floating" href="#multi-item-example" data-slide="next"><i
                    class="fas fa-chevron-right"></i></a>
                </div>
                <!--/.Controls-->

                <!--Indicators-->
                <ol class="carousel-indicators">
                    <li data-target="#multi-item-example" data-slide-to="0" class="active"></li>
                    <li data-target="#multi-item-example" data-slide-to="1"></li>
                    <li data-target="#multi-item-example" data-slide-to="2"></li>
                </ol>
                <!--/.Indicators-->

                <!--Slides-->
                <div class="carousel-inner" role="listbox">

                    <!--First slide-->
                    <div class="carousel-item active">

                        <div class="col-md-4">
                            <div class="card mb-2">
                                <img class="card-img-top"
                                src="assets/img/images/cacao.png"
                                alt="Card image cap">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card mb-2">
                                <img class="card-img-top"
                                src="assets/img/images/cacao.png"
                                alt="Card image cap">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card mb-2">
                                <img class="card-img-top"
                                src="assets/img/images/cacao.png"
                                alt="Card image cap">
                            </div>
                        </div>

                    </div>
                    <!--/.First slide-->

                    <!--Second slide-->
                    <div class="carousel-item">

                        <div class="col-md-4">
                            <div class="card mb-2">
                                <img class="card-img-top"
                                src="assets/img/images/cacao.png"
                                alt="Card image cap">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card mb-2">
                                <img class="card-img-top"
                                src="assets/img/images/cacao.png"
                                alt="Card image cap">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card mb-2">
                                <img class="card-img-top"
                                src="assets/img/images/cacao.png"
                                alt="Card image cap">
                            </div>
                        </div>

                    </div>
                    <!--/.Second slide-->

                    <!--Third slide-->
                    <div class="carousel-item">

                        <div class="col-md-4">
                            <div class="card mb-2">
                                <img class="card-img-top"
                                src="assets/img/images/cacao.png"
                                alt="Card image cap">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card mb-2">
                                <img class="card-img-top"
                                src="assets/img/images/cacao.png"
                                alt="Card image cap">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card mb-2">
                                <img class="card-img-top"
                                src="assets/img/images/cacao.png"
                                alt="Card image cap">
                            </div>
                        </div>

                    </div>
                    <!--/.Third slide-->

                </div>
                <!--/.Slides-->

            </div>
            <!--/.Carousel Wrapper-->
    </div>
	</div>
@endsection
