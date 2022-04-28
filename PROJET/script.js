function Afficher(){
    document.getElementById("form1").style.display = "block";
}

function Enlever(){
  document.getElementById("form1").style.display = "none";
}

function base(){
    document.getElementById("presentation").style.display = "block";
    document.getElementById("louis").style.display = "none";
    document.getElementById("walid").style.display = "none";
    document.getElementById("corentin").style.display = "none";
  }
  
function louis(){
document.getElementById("presentation").style.display = "none";
document.getElementById("louis").style.display = "block";
document.getElementById("walid").style.display = "none";
document.getElementById("corentin").style.display = "none";
}

function walid(){
document.getElementById("presentation").style.display = "none";
document.getElementById("louis").style.display = "none";
document.getElementById("walid").style.display = "block";
document.getElementById("corentin").style.display = "none";
}

function corentin(){
document.getElementById("presentation").style.display = "none";
document.getElementById("louis").style.display = "none";
document.getElementById("walid").style.display = "none";
document.getElementById("corentin").style.display = "block";
}