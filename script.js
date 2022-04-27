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


//FONCTIONS DE NAVIGATION
// quand on clique, renvoie a l'acceuil
function goHomepage(){
  window.location = "http://localhost:8000/index.php";
}

// FONCTIONS POUR PANIER
// ajoute 1 de l'article au panier (variables de session)
function ajouterPanier(elmt){
  alert(elmt);

  alert("Article ajouté au panier");
}