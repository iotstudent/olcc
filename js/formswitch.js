function switch_form(){
    var duration = document.getElementById("type").value;
    if(duration == "annual"){
        document.getElementById("amount").setAttribute('value', 50000);
    }
    if(duration == "half"){
        document.getElementById("amount").setAttribute('value', 27000);
        } 
    if(duration == "quater"){
        document.getElementById("amount").setAttribute('value', 15000);
    }            
}