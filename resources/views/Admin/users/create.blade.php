@extends('layouts.layoutAdmin')
@section('content')

<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Créer un compte !</h1>
              </div>
              <form class="user" action="{{route('users.store')}}" method="POST" enctype="multipart/form-data">
                @include('Admin.users.form')
                    <div class="text-center mx-5">
                        <button class="btn btn-primary btn-user btn-block">Enregistrer</button>
                    </div>
                </form>
              <hr>
              <div class="text-center">
                <a class="small" href="forgot-password.html">Forgot Password?</a>
              </div>
              <div class="text-center">
                <a class="small" href="login.html">Already have an account? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    function affichePassword(){
    if(document.getElementById("icon").className == "fas fa-fw fa-eye field-icon"){
        document.getElementById('password').type ='text';
        document.getElementById("icon").className = "fas fa-fw fa-eye-slash field-icon";
    }
    else{
        document.getElementById('password').type='password';
        document.getElementById("icon").className = "fas fa-fw fa-eye field-icon";
        }
    };

    if(document.getElementById("defaultUnchecked").checked == true){
        text.style.visibility = "visible";
        text.style.height = "420px";

        document.getElementById("emailFirst").style.visibility = "hidden";
        document.getElementById("emailFirst").style.height = "0px";
    }

    function myFunction() {
        // Get the checkbox
        var checkBox = document.getElementById("defaultUnchecked");
        // Get the output text
        var text = document.getElementById("text");

        // If the checkbox is checked, display the output text
        if (checkBox.checked == true){
            text.style.visibility = "visible";
            text.style.height = "370px";
            document.getElementById("emailFirst").style.visibility = "hidden";
            document.getElementById("emailFirst").style.height = "0px";
        } else {
            text.style.visibility = "hidden";
            text.style.height = "0px";
            document.getElementById("emailFirst").style.visibility = "visible";
            document.getElementById("emailFirst").style.height = "80px";
        }
    };
  </script>
  @endsection