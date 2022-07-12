function validationstart() {
    var firstname = document.getElementById("f1").value;
    var firstname1 = document.getElementById("f1");
    var letters = /^[A-Za-z]+$/;
    if (firstname.match(letters)) {
        firstname1.style.border = "2px solid green";
    }
    else {
        firstname1.style.border = "2px solid red";
    }


    // ********************************


    var lastname = document.getElementById("l1").value;
    var lastname1 = document.getElementById("l1");
    var letters = /^[A-Za-z]+$/;
    if (lastname.match(letters)) {
        lastname1.style.border = "2px solid green";
    } else {
        lastname1.style.border = "2px solid red";
    }

    // *****************************
    var username = document.getElementById("u1").value;
    var username1 = document.getElementById("u1");
    var pattern = /^[a-zA-Z0-9]+$/;
    if (username.match(pattern)) {

        username1.style.border = "2px solid green";
    } else {

        username1.style.border = "2px solid red";
    }

    // ******************************************

    var email1 = document.getElementById("email1").value
    var email3 = document.getElementById("email1")
    var email2 = /^[\w.+\-]+@mailman\.com$/;
    if (email1.match(email2)) {

        email3.style.border = "2px solid green";

    } else {
        email3.style.border = "2px solid red";
    }

    // ********************************


    var re = document.getElementById("remail1").value;
    var recoveryemail1 = document.getElementById("remail1");
    var recov = /^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+$/;

    if (re.match(recov)) {
        recoveryemail1.style.border = "2px solid green";
    } else {
        recoveryemail1.style.border = "2px solid red";
    }


    // ******************************


    var pass1 = document.getElementById("pass1").value;
    var password1 = document.getElementById("pass1");
    var pass = /^[a-zA-Z0-9!@#$%^&*]+$/;
    if (pass1.match(pass)) {
        password1.style.border = "2px solid green";
    } else {
        password1.style.border = "2px solid red";
    }


    // ********************************************************

    var cpass1 = document.getElementById("cp1").value;
    var cpassword1 = document.getElementById("cp1");
    var confirmpass = /^[a-zA-Z0-9!@#$%^&*]+$/;
    if (cpass1.match(confirmpass)) {
        cpassword1.style.border = "2px solid green";
    } else {
        cpassword1.style.border = "2px solid red";
    }

    // *************************
    var matchpass = document.getElementById("pass1").value;
    var cmatchpass = document.getElementById("cp1").value;
    var validate1 = document.getElementById("pass1");
    var validate2 = document.getElementById("cp1");
    if (matchpass == cmatchpass && matchpass != "" && cmatchpass != "") {
        document.getElementById("write").innerHTML = "Password Matched";
        validate1.style.border = "2px solid green";
        validate2.style.border = "2px solid green";
        return true;
    } else {
        document.getElementById("write").innerHTML = "Password donot matched";
        validate1.style.border = " 2px solid red";
        validate2.style.border = " 2px solid red";
        return false;
    }
    if (!firstname || !lastname || !username || !email1 || !matchpass || !cmatchpass) {
        return false

    } else {
        return true
    }

}






