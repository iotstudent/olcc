function switch_form(){
    var duration = document.getElementById("type").value;
    if(duration == "annual"){
        document.getElementById("amount").value =40000;
    }
    if(duration == "half"){
        document.getElementById("amount").value =22000;
        } 
    if(duration == "quater"){
         document.getElementById("amount").value =12000;
    }            
}