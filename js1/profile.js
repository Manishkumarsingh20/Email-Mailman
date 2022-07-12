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



    // ********

    var re = document.getElementById("remail1").value;
    var recoveryemail1 = document.getElementById("remail1");
    var recov = /^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+$/;
    if (re.match(recov)) {
        recoveryemail1.style.border = "2px solid green";
    } else {
        recoveryemail1.style.border = "2px solid red";
    }
    // **********

    var re = document.getElementById("rema").value;
    var recoveryemail1 = document.getElementById("rema");
    var recov = /^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+$/;
    if (re.match(recov)) {
        recoveryemail1.style.border = "2px solid green";
    } else {
        recoveryemail1.style.border = "2px solid red";
    }

    // ************************

    var username = document.getElementById("tom").value;
    var username1 = document.getElementById("tom");
    var pattern = /^[a-zA-Z0-9]+$/;
    if (username.match(pattern)) {
        username1.style.border = "2px solid green";
    } else {
        username1.style.border = "2px solid red";
    }

}