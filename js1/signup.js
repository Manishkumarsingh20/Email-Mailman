

function validationstart() {
    var firstname = document.getElementById("f1").value;
    var firstname1 = document.getElementById("f1");
    var firstnamespane = document.getElementById("error");
    var letters = /^[a-zA-Z0-9]+$/;
    if (firstname.match(letters)) {
        firstname1.style.border = "2px solid green";
        firstnamespane.innerHTML = "";
    }
    else {
        firstname1.style.border = "2px solid red";
        firstnamespane.innerHTML = "**Please fill firstname without space";
        

    }
    //////////////////////////////////////////////////////////////////////////////////////////

    var lastname = document.getElementById("l1").value;
    var lastname1 = document.getElementById("l1");
    var lastnamespane = document.getElementById("lasterror");
    var letters = /^[A-Za-z]+$/;
    if (lastname.match(letters)) {
        lastname1.style.border = "2px solid green";
        lastnamespane.innerHTML = "";
    } else {
        lastname1.style.border = "2px solid red";
        lastnamespane.innerHTML = "**Please use only letters without space";
        

    }

    ///////////////////////////////////////////////////////////////////////////////////////////

    var username = document.getElementById("u1").value;
    var username1 = document.getElementById("u1");
    var usernamespane = document.getElementById("usererror");

    var pattern = /^[a-zA-Z0-9]+$/;
    if (username.match(pattern)) {
    } else {
        usernamespane.innerHTML = "**Please donot give space(0-9 or a-zA-Z)";
        

    }

    //////////////////////////////////////////////////////////////////////////////////////////////

    var email1 = document.getElementById("email1").value
    var email3 = document.getElementById("email1")
    var emailnamespane = document.getElementById("emailerror");
    var email2 = /^[\w.+\-]+@mailman\.com$/;
    if (email1.match(email2)) {
    } else {
        emailnamespane.innerHTML = "**Please add @mailman.com";
     
    }

    ///////////////////////////////////////////////////////////////////////////////////////////////


    var re = document.getElementById("remail1").value;
    var recoveryemail1 = document.getElementById("remail1");
    var recovernamespane = document.getElementById("recover");
    var recov = /^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+$/;
    if (re.match(recov)) {
        recoveryemail1.style.border = "2px solid green";
        recovernamespane.innerHTML = "";
    } else {
        recoveryemail1.style.border = "2px solid red";
        recovernamespane.innerHTML = "**Please add one recovery Email";
        

    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////


    // var pass1 = document.getElementById("pass1").value;
    // var password1 = document.getElementById("pass1");
    // var passwordnamespane = document.getElementById("passwordd");
    // var lowercase = new RegExp('(?=.*[a-z])');
    // var uppercase = new RegExp('(?=.*[A-z])');
    // var number = new RegExp('(?=.*[0-9])');
    // var specialchar = new RegExp('(?=.*[!@#\$%\^&\*])');
    // var sixchar = new RegExp('(?=.{6,})');

    // if (pass1.match(sixchar)) {
    //     passwordnamespane.innerHTML = "";
    // } else {
    //     passwordnamespane.innerHTML = "**Password length should be six or greater";
    //     return false
    // }
    // if (pass1.match(uppercase)) {
    //     passwordnamespane.innerHTML = "";
    // } else {
    //     passwordnamespane.innerHTML = "**Use atleast one Uppercase";
    //     return false
    // }
    // if (pass1.match(number)) {
    //     passwordnamespane.innerHTML = "";
    // } else {
    //     passwordnamespane.innerHTML = "**Use atleast one number";
    //     return false
    // }
    // if (pass1.match(specialchar)) {
    //     passwordnamespane.innerHTML = "";
    // } else {
    //     passwordnamespane.innerHTML = "**Use atleast one special character";
    //     return false
    // }
    // if (pass1.match(lowercase)) {
    //     passwordnamespane.innerHTML = "";
    // } else {
    //     passwordnamespane.innerHTML = "**Use atleast one lowercase";
    //     return false
    // }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////

    var cpass1 = document.getElementById("cp1").value;
    var cpassword1 = document.getElementById("cp1");
    var confirmpassword = document.getElementById("confirmpasswordd");
    var confirmpass = /^[a-zA-Z0-9!@#$%^&*]+$/;
    if (cpass1.match(confirmpass)) {
        cpassword1.style.border = "2px solid green";
        confirmpassword.innerHTML = ""
    } else {
        cpassword1.style.border = "2px solid red";
        confirmpassword.innerHTML = "**Please fill the confirmation Password";
     

    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////

    var matchpass = document.getElementById("pass1").value;
    var cmatchpass = document.getElementById("cp1").value;
    var validate1 = document.getElementById("pass1");
    var validate2 = document.getElementById("cp1");
    if (matchpass == cmatchpass && matchpass != "" && cmatchpass != "") {
        document.getElementById("write").innerHTML = ""
        validate1.style.border = "2px solid green";
        validate2.style.border = "2px solid green";
    } else {
        document.getElementById("write").innerHTML = ""
        validate1.style.border = " 2px solid red";
        validate2.style.border = " 2px solid red";
        return false;
    }


    ////////////////////////////////////////////////////////////////////////////////////////////////////////

    var checkbox = document.getElementById("checkbox").checked;
    var checkboxx = document.getElementById("checkboxx");
    if (checkbox === true) {
    }
    else {
        return false;
    }
    var fileInput = document.getElementById('file')
    var filePath = fileInput.value;
    var f = document.getElementById("file").files[0];
    var fsize = f.size || f.fileSize;
    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
    if (!allowedExtensions.exec(filePath)) {
        document.getElementById('pictures').innerHTML = "**Please use correct format(\.jpg|\.jpeg|\.png|\.gif)";
        fileInput.value = '';
        return false;
    }
    if (fsize > 2000000) {
        document.getElementById('pictures').innerHTML = "**Image Size is Too big";
        return false;
    } else {

        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById('pictures').innerHTML = "Image Uploaded";
            };
            reader.readAsDataURL(fileInput.files[0]);
            return true;

        }
    }


    if (!firstname || !lastname || !username || !email1 || !pass1 || cpass1 || !matchpass || !cmatchpass || !fileInput) {
        return false

    } else {
        return true
    }



}






