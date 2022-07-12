function validationstart() {
    var firstname = document.getElementById("f1").value;
    var firstname1 = document.getElementById("f1");
    var letters = /^[A-Za-z]+$/;
    if (firstname.match(letters)) {
        firstname1.style.border = "2px solid green";
        return true;
    }
    else {
        firstname1.style.border = "2px solid red";
        return false;
    }

    //******************************
    var middlename = document.getElementById("m1").value;
    var middlename1 = document.getElementById("m1");
    var letters = /^[A-Za-z]+$/;
    if (middlename.match(letters)) {

        middlename1.style.border = "2px solid green";
    }
    else {
        middlename1.style.border = "2px solid red";

    }
    //***************************
    var lastname = document.getElementById("l1").value;
    var lastname1 = document.getElementById("l1");
    var letters = /^[A-Za-z]+$/;
    if (lastname.match(letters)) {
        lastname1.style.border = "2px solid green";
        return true;
    }
    else {
        lastname1.style.border = "2px solid red";
        return false;

    }

    //***************************** 
    var re = document.getElementById("mail").value;
    var recoveryemail1 = document.getElementById("remail");
    var recov = /^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+$/;

    if (re.match(recov)) {

        recoveryemail1.style.border = "2px solid green";

    } else {
        recoveryemail1.style.border = "2px solid red";
    }



}

