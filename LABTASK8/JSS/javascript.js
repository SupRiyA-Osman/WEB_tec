
function validEmail() {
    if (document.getElementById("email").value == "") {
        document.getElementById("emailErr").innerHTML = "*Email cannot be blank";
        document.getElementById("email").style.borderColor = "red";
    } else if (!document.getElementById("email").value.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/)) {
        document.getElementById("emailErr").innerHTML = "*Please enter a valid email address";
        document.getElementById("email").style.borderColor = "red";
    } else {
        document.getElementById("emailErr").innerHTML = "";
        document.getElementById("email").style.borderColor = "purple";
    }
}

function validPass() {
    if (document.getElementById("password").value == "") {
        document.getElementById("passErr").innerHTML = "*Password cannot be blank";
        document.getElementById("password").style.borderColor = "red";
    } else if (document.getElementById("password").value.length < 5) {
        document.getElementById("passErr").innerHTML = "*Password must not be less than six (6) characters";
        document.getElementById("password").style.borderColor = "red";
    } else if (!document.getElementById("password").value.match(/[A-Z]+/)) {
        document.getElementById("passErr").innerHTML = "*Password must contain at least one upper case letter, one lower case letter and one numeric character";
        document.getElementById("password").style.borderColor = "red";
    } else if (!document.getElementById("password").value.match(/[a-z]+/)) {
        document.getElementById("passErr").innerHTML = "*Password must contain at least one upper case letter, one lower case letter and one numeric character";
        document.getElementById("password").style.borderColor = "red";
    } else if (!document.getElementById("pass").value.match(/[0-9]+/)) {
        document.getElementById("passErr").innerHTML = "*Password must contain at least one upper case letter, one lower case letter and one numeric character";
        document.getElementById("password").style.borderColor = "red";
    } else {
        document.getElementById("passErr").innerHTML = "";
        document.getElementById("password").style.borderColor = "purple";
    }
}

function validConPass() {
    if (document.getElementById("confirmPassword").value == "") {
        document.getElementById("conPassErr").innerHTML = "*Confirm Password cannot be blank";
        document.getElementById("confirmPassword").style.borderColor = "red";
    } else if (document.getElementById("confirmPassword").value != document.getElementById("pass").value) {
        document.getElementById("conPassErr").innerHTML = "*Password and confirm password does not match";
        document.getElementById("confirmPassword").style.borderColor = "red";
    } else {
        document.getElementById("conPassErr").innerHTML = "";
        document.getElementById("confirmPassword").style.borderColor = "purple";
    }
}





function validbusName() {
    if (document.getElementById("busName").value == "") {
        document.getElementById("busNameErr").innerHTML = "*bus Name cannot be blank";
        document.getElementById("busName").style.borderColor = "red";
    } else if (document.getElementById("busName").value.split(' ').length < 1) {
        document.getElementById("busNameErr").innerHTML = "*bus name must be single words";
        document.getElementById("busName").style.borderColor = "red";
    } else if (!document.getElementById("busName").value.match(/^[A-Za-z ]*$/)) {
        document.getElementById("busNameErr").innerHTML = "*For bus name only upper/lower case letters and white spaces are allowed";
        document.getElementById("busName").style.borderColor = "red";
    } else {
        document.getElementById("busNameErr").innerHTML = "";
        document.getElementById("busName").style.borderColor = "purple";
    }
}

function validbusLocation(){
    if (document.getElementById("busLocation").value == "") {
        document.getElementById("busLocationErr").innerHTML = "*Location cannot be blank";
        document.getElementById("busLocation").style.borderColor = "red";
    }else {
        document.getElementById("busLocationErr").innerHTML = "";
        document.getElementById("busLocation").style.borderColor = "purple";
    }
}



function validbusFrom(){
    if (document.getElementById("busFrom").value == "") {
        document.getElementById("fromErr").innerHTML = "*Please select a location";
        document.getElementById("busFrom").style.borderColor = "red";
    }else {
        document.getElementById("fromErr").innerHTML = "";
       document.getElementById("busFrom").style.borderColor = "purple";
   }
}


function validationdate() {
    if (document.getElementById("date").value == "") {
        document.getElementById("dateErr").innerHTML = "*Date  cannot be blank";
        document.getElementById("date").style.borderColor = "red";
    } else {
        document.getElementById("dateErr").innerHTML = "";
        document.getElementById("date").style.borderColor = "purple";
    }
}

function validbusTo(){
    if (document.getElementById("busTo").value == "") {
        document.getElementById("toErr").innerHTML = "*Please select a location";
        document.getElementById("busTo").style.borderColor = "red";
    }else {
        document.getElementById("toErr").innerHTML = "";
       document.getElementById("busTo").style.borderColor = "purple";
   }
}