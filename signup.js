function checkPass(){
    var pass  = document.getElementById("password").value;
    var cpass  = document.getElementById("c_password").value;
    if(pass != cpass){
        alert("Confirmation Password is not the same!");
        document.getElementById("submit").disabled = true;
        
    }else{
        document.getElementById("submit").disabled = false; 
    }
}

function handleEmail(){
    var user_email = document.getElementsByName("Email").value;
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        var v_email = this.responseText;
        console.log (v_email);
        if(user_email != v_email){
            alert ("Nothing haha")
        }else{
            alert ('The Email is used. <br> Please Use another Email!');
        }
    }
    xhttp.open("get", "signup.php", true);
    xhttp.send();
}