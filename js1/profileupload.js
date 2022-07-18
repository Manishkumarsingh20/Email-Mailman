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

    // ******************************
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
        
    }
    else {
        lastname1.style.border = "2px solid red";
        
        
       

    }

    //***************************** 
    var re = document.getElementById("remail").value;
    var recoveryemail1 = document.getElementById("remail");
    var recov =/^(?:[A-Z\d][A-Z\d_-]{1,}|[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4})$/i;
    if (re.match(recov)) {
        recoveryemail1.style.border = "2px solid green";
    } else {
        recoveryemail1.style.border = "2px solid red";
        return false;
      
        
    }


  if(!firstname  || !lastname  ||!re){
    return false;
  }else{
    return true;
  }
}

