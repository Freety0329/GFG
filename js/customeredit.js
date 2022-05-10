function select(t){
    // select edit from onclick
    var x= document.querySelectorAll(".nameedit")

    if(x[t].style.display=="flex"){
        x[t].style.display="none";
    }else{
        // loop
        for(var i =0;i<x.length;i++){
            x[i].style.display= "none";
        }
        //after 
        x[t].style.display="flex";
    }
}
function handledata(){
    let result=document.querySelectorAll(".setting-edit")
    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function (){
        if(this.readyState == 4 && this.status == 200){
            document.querySelector(".test").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET","customeredit.php?s="+result[select0].value,true);
    xmlhttp.send();
}
