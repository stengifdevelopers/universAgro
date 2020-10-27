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

function myFunction2() {
    // Get the checkbox
    var checkBox = document.getElementById("defaultUnchecked");
    // Get the output text
    var text = document.getElementById("text");

    // If the checkbox is checked, display the output text
    if (checkBox.checked == true){
        text.style.visibility = "visible";
        text.style.height = "60px";
        document.getElementById("emailFirst").style.visibility = "hidden";
    } else {
        text.style.visibility = "hidden";
        text.style.height = "10px";
        document.getElementById("emailFirst").style.visibility = "visible";
    }
};



