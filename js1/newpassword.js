

function myvalidation() {

    var pass1 = document.getElementById("pass1").value;
    var password1 = document.getElementById("pass1");
    var pass = /^[a-zA-Z0-9!@#$%^&*]+$/;
    if (pass1.match(pass)) {
        password1.style.border = "2px solid green";
    } else {
        password1.style.border = "2px solid red";
    }


    // ******************************************************

    var cpass1 = document.getElementById("cp1").value;
    var cpassword1 = document.getElementById("cp1");
    var confirmpass = /^[a-zA-Z0-9!@#$%^&*]+$/;
    if (cpass1.match(confirmpass)) {
        cpassword1.style.border = "2px solid green";
    } else {
        cpassword1.style.border = "2px solid red";
    }

    // *******************************************************
    var matchpass = document.getElementById("pass1").value;
    var cmatchpass = document.getElementById("cp1").value;
    var validate1 = document.getElementById("pass1");
    var validate2 = document.getElementById("cp1");
    if (matchpass == cmatchpass && matchpass != "" && cmatchpass != "") {
        document.getElementById("write").innerHTML = "Password donot matched";
        validate1.style.border = "2px solid green";
        validate2.style.border = "2px solid green";
    } else {
        document.getElementById("write").innerHTML = "Password match ";
        validate1.style.border = " 2px solid red";
        validate2.style.border = " 2px solid red";


    }
}