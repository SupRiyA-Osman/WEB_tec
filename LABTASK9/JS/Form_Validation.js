function checkName() {
    if (document.getElementById("busName").value == "") {
        document.getElementById("busNameErr").innerHTML = "*Full Name cannot be blank";
        document.getElementById("busName").style.borderColor = "red";
    } else if (document.getElementById("busName").value.split(' ').length < 2) {
        document.getElementById("busNameErr").innerHTML = "*Full name must be at least 2 words";
        document.getElementById("busName").style.borderColor = "red";
    } else if (!document.getElementById("busName").value.match(/^[A-Za-z ]*$/)) {
        document.getElementById("busNameErr").innerHTML = "*For full name only upper/lower case letters and white spaces are allowed";
        document.getElementById("busName").style.borderColor = "red";
    } else {
        document.getElementById("busNameErr").innerHTML = "";
        document.getElementById("busName").style.borderColor = "purple";
    }
}

function checkEmail() {
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


function checkPass() {
    if (document.getElementById("pass").value == "") {
        document.getElementById("passErr").innerHTML = "*Password cannot be blank";
        document.getElementById("pass").style.borderColor = "red";
    } else if (document.getElementById("pass").value.length < 6) {
        document.getElementById("passErr").innerHTML = "*Password must not be less than six (6) characters";
        document.getElementById("pass").style.borderColor = "red";
    } else if (!document.getElementById("pass").value.match(/[A-Z]+/)) {
        document.getElementById("passErr").innerHTML = "*Password must contain at least one upper case letter, one lower case letter and one numeric character";
        document.getElementById("pass").style.borderColor = "red";
    } else if (!document.getElementById("pass").value.match(/[a-z]+/)) {
        document.getElementById("passErr").innerHTML = "*Password must contain at least one upper case letter, one lower case letter and one numeric character";
        document.getElementById("pass").style.borderColor = "red";
    } else if (!document.getElementById("pass").value.match(/[0-9]+/)) {
        document.getElementById("passErr").innerHTML = "*Password must contain at least one upper case letter, one lower case letter and one numeric character";
        document.getElementById("pass").style.borderColor = "red";
    } else {
        document.getElementById("passErr").innerHTML = "";
        document.getElementById("pass").style.borderColor = "purple";
    }
}

function checkConPass() {
    if (document.getElementById("conPass").value == "") {
        document.getElementById("conPassErr").innerHTML = "*Confirm Password cannot be blank";
        document.getElementById("conPass").style.borderColor = "red";
    } else if (document.getElementById("conPass").value != document.getElementById("pass").value) {
        document.getElementById("conPassErr").innerHTML = "*Password and confirm password does not match";
        document.getElementById("conPass").style.borderColor = "red";
    } else {
        document.getElementById("conPassErr").innerHTML = "";
        document.getElementById("conPass").style.borderColor = "purple";
    }
}



function checkprice() {
    if (document.getElementById("price").value == "") {
        document.getElementById("priceErr").innerHTML = "*Price ccannot be blank !";
        document.getElementById("price").style.borderColor = "red";
    } else if (!document.getElementById("price").value.match(/^[0-9]+$/)) {
        document.getElementById("priceErr").innerHTML = "*Price must contain only numbers !";
        document.getElementById("price").style.borderColor = "red";
    } else {
        document.getElementById("priceErr").innerHTML = "";
        document.getElementById("price").style.borderColor = "purple";
    }
}

function checkbusId() {
    if (document.getElementById("busId").value == "") {
        document.getElementById("busIdErr").innerHTML = "*Bus ID cannot be blank !";
        document.getElementById("busId").style.borderColor = "red";
    } else if (!document.getElementById("busId").value.match(/^[0-9]+$/)) {
        document.getElementById("busIdErr").innerHTML = "*Bus ID must contain only numbers !";
        document.getElementById("busId").style.borderColor = "red";
    } else {
        document.getElementById("busIdErr").innerHTML = "";
        document.getElementById("busId").style.borderColor = "purple";
    }
}

function checkTicketId() {
    if (document.getElementById("ticketId").value == "") {
        document.getElementById("ticketIdErr").innerHTML = "*Ticket ID cannot be blank";
        document.getElementById("ticketId").style.borderColor = "red";
    } else if (!document.getElementById("ticketId").value.match(/^[0-9]+$/)) {
        document.getElementById("ticketIdErr").innerHTML = "*Ticket ID must contain only numbers";
        document.getElementById("ticketId").style.borderColor = "red";
    } else {
        document.getElementById("ticketIdErr").innerHTML = "";
        document.getElementById("ticketId").style.borderColor = "purple";
    }
}