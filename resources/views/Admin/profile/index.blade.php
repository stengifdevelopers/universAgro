@extends('layouts.layoutAdmin')


@section('content')
{{-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> --}}

<style>
 body{
    background: -webkit-linear-gradient(left, #3931af, #00c6ff);
}
.emp-profile{
    padding: 3%;
    margin-top: 3%;
    margin-bottom: 3%;
    border-radius: 0.5rem;
    background: #fff;
}
.profile-img{
    text-align: center;
}
.profile-img img{
    width: 70%;
    height: 100%;
}
.profile-img .file {
    position: relative;
    overflow: hidden;
    margin-top: -20%;
    width: 70%;
    border: none;
    border-radius: 0;
    font-size: 15px;
    background: #212529b8;
}
.profile-img .file input {
    position: absolute;
    opacity: 0;
    right: 0;
    top: 0;
}
.profile-head h5{
    color: #333;
}
.profile-head h6{
    color: #0062cc;
}
.profile-edit-btn{
    border: none;
    border-radius: 1.5rem;
    width: 70%;
    padding: 2%;
    font-weight: 600;
    color: #6c757d;
    cursor: pointer;
}
.proile-rating{
    font-size: 12px;
    color: #818182;
    margin-top: 5%;
}
.proile-rating span{
    color: #495057;
    font-size: 15px;
    font-weight: 600;
}
.profile-head .nav-tabs{
    margin-bottom:5%;
}
.profile-head .nav-tabs .nav-link{
    font-weight:600;
    border: none;
}
.profile-head .nav-tabs .nav-link.active{
    border: none;
    border-bottom:2px solid #0062cc;
}
.profile-work{
    padding: 14%;
    margin-top: -15%;
}
.profile-work p{
    font-size: 12px;
    color: #818182;
    font-weight: 600;
    margin-top: 10%;
}
.profile-work a{
    text-decoration: none;
    color: #495057;
    font-weight: 600;
    font-size: 14px;
}
.profile-work ul{
    list-style: none;
}
.profile-tab label{
    font-weight: 600;
}
.profile-tab p{
    font-weight: 600;
    color: #0062cc;
}
</style>
<div class="container-fluid">
    <div class="container emp-profile">
        <form method="post">
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-img">
                        <?php if ($profile->profile_path): ?>
                            <a href="{{$profile->profile_path}}"><img src="{{asset($profile->profile_path)}}" width="100px" class="img-fluid"  alt="{{$profile->image}}"></a>
                        <?php else: ?>
                            <a href=""><img src="{{asset('img/utilities/default.png')}}" width="100px" class="img-fluid"  alt="default.png"></a>
                        <?php endif ?>
                        <div class="file btn btn-lg btn-primary">
                            Change Photo
                            <input type="file" name="file"/>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="profile-head">
                                <h5>
                                    {{$user->name}}
                                </h5>
                                <h6>
                                    {{$user->fonction}}
                                </h6>
                                <p class="proile-rating">RANKINGS : <span>8/10</span></p>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">A propos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Description</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <a href="{{route('pwdedit.edit', Auth::user()->id)}}" class="btn btn-outline-warning btn-sm mb-2">
                        <i class="fas fa-key"></i> Edit Pswd
                </a>
                <a href="{{route('profile.edit', $profile->id)}}" class="btn btn-outline-success btn-sm mb-2">
                    <i class="fas fa-users-cog"></i> Edit Profile
            </a>
                {{-- <a href="{{route('profile.edit', $user->id)}}"><button class="btn btn-outline-success"></button></a> --}}
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-work">
                        <p>Mes Liens</p>
                        <div class="mb-2">
                            <span  class="btn btn-sm btn-warning btn-circle white">
                                <i class="fas fa-globe"></i>
                            </span>
                            <a href="https://{{$profile->url}}" target="_blank">
                              @if ($profile->url=="")
                                {{'Aucne information'}}
                              @else
                                {{$profile->url}}
                              @endif

                            </a><br/>
                        </div>
                        <div class="mb-2">
                            <span  class="btn btn-sm btn-primary btn-circle white">
                                <i class="fab  fa-facebook-f"></i>
                            </span>
                            <a href="https://{{$profile->facebook}}" target="_blank">
                                @if ($profile->facebook=="")
                                {{'Aucne information'}}
                              @else
                                {{$profile->facebook}}
                              @endif

                            </a><br/>
                        </div>
                        <div class="mb-2">
                            <span  class="btn btn-sm btn-success btn-circle white">
                                <i class="fab fa-whatsapp"></i>
                            </span>
                            <a>
                             @if ($profile->whatsapp=="")
                                {{'Aucne information'}}
                              @else
                                {{$profile->whatsapp}}
                              @endif

                            </a><br/>
                        </div>

                        <p>Mes localisations:</p>

                        <a href="#">Région:
                            @if ($profile->region=="")
                                {{'Aucne information'}}
                              @else
                                {{$profile->region}}
                              @endif
                        </a><br/>
                        <a href="#">Département:
                            @if ($profile->departement=="")
                              {{'Aucne information'}}
                            @else
                              {{$profile->departement}}
                            @endif
                        </a><br/>
                        <a href="#">Ville:
                            @if ($profile->ville=="")
                                {{'Aucne information'}}
                            @else
                                {{$profile->ville}}
                            @endif
                        </a><br/>

                    </div>
                </div>
                <div class="col-md-8">
                    <div class="tab-content profile-tab" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>User Id</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p>{{$user->id}}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Pseudo</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p>{{$user->pseudo}}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Email</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p>{{$user->email}}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Phone</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p>
                                                @if ($profile->phone=="")
                                                  {{'Vide'}}
                                                @else
                                                  {{$profile->phone}}
                                                @endif
                                             </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Profession</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p>{{$user->fonction}}</p>
                                        </div>
                                    </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="col-lg-12">
                                <label>Your description</label><br/>
                                <p>
                                    @if ($profile->phone=="")
                                        <p class="text-center">{{'Aucne information'}}</p>
                                    @else
                                        {{$profile->description}}
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

</div>
@endsection
