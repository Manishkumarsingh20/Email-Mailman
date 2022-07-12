function validation(){
    var email=document.getElementById("email").value;
    var email_highlight=document.getElementById("email");
    var regex=/^[\w.+\-]+@mailman\.com$/;
    if(email.match(regex)){
        email_highlight.style.border="2px solid green";
        return true;
        
    }else{

        email_highlight.style.border="2px solid red";
         return false;
       
    }

    var subject=document.getElementById("sub").value;
    var subject_highlight=document.getElementById("sub");
    var regex=/^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+$/;
    if(subject.match(regex)){
        subject_highlight.style.border="2px solid green";
        
        
    }else{

        subject_highlight.style.border="2px solid red";
         
       
    }

    if(!email ){
        return true;
    }else{
        return false;
    }
}