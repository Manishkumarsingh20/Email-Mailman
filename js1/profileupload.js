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
    ///////////////////////////////////////////////////////////////////////////////////

    var middlename = document.getElementById("m1").value;
    var middlename1 = document.getElementById("m1");
    var letters = /^[A-Za-z]+$/;
    if (middlename.match(letters)) {
        middlename1.style.border = "2px solid green";
    }
    else {
        middlename1.style.border = "2px solid red";
    }

    ///////////////////////////////////////////////////////////////////////////////////////

    var lastname = document.getElementById("l1").value;
    var lastname1 = document.getElementById("l1");
    var letters = /^[A-Za-z]+$/;
    if (lastname.match(letters)) {
        lastname1.style.border = "2px solid green";
    }
    else {
        lastname1.style.border = "2px solid red";
    }
    ////////////////////////////////////////////////////////////////////////////////////////

    var re = document.getElementById("remail").value;
    var recoveryemail1 = document.getElementById("remail");
    var recov = /^[\w.+\-]+@gmail\.com$/;
    if (re.match(recov)) {
        recoveryemail1.style.border = "2px solid green";
    } else {
        recoveryemail1.style.border = "2px solid red";
        return false;
    }

    ///////////////////////////////////////////////////////////////////////////////////////////

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
            return true

        }
    }

    if (!firstname || !lastname || !re) {
        return false;
    } else {
        return true;
    }
}

