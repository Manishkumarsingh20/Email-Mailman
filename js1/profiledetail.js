function myvalidation() {
    var firstname = document.getElementById("f1").value;
    var firstname1 = document.getElementById("f1");
    var letters = /^[A-Za-z]+$/;
    if (firstname.match(letters)) {
        firstname1.style.border = "2px solid green";
    }
    else {
        firstname1.style.border = "2px solid red";

    }
////////////////////////////////////////////////////////////////////////////////////

    var firstname = document.getElementById("m1").value;
    var firstname1 = document.getElementById("m1");
    var letters = /^[A-Za-z]+$/;
    if (firstname.match(letters)) {
        firstname1.style.border = "2px solid green";
    }
    else {
        firstname1.style.border = "2px solid red";
    }


////////////////////////////////////////////////////////////////////////////////////

    var firstname = document.getElementById("l1").value;
    var firstname1 = document.getElementById("l1");
    var letters = /^[A-Za-z]+$/;
    if (firstname.match(letters)) {
        firstname1.style.border = "2px solid green";
    }
    else {
        firstname1.style.border = "2px solid red";
    }

///////////////////////////////////////////////////////////////////////////////////////

    var re = document.getElementById("remail").value;
    var recoveryemail1 = document.getElementById("remail");
    var recov = /^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+$/;
    if (re.match(recov)) {
        recoveryemail1.style.border = "2px solid green";
    } else {
        recoveryemail1.style.border = "2px solid red";
    }


}

