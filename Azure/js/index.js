$(function(){
    lister();
});

function creer(){
    var donnee = $('.formulaire').serialize();
    donnee += "&creer=true";
    console.log("donnée collectée: ", donnee);

    $.ajax({
        type: "POST",
        url: "../php/traitement.php",
        data: donnee,
        success: function(Data){
            alert("Contact crée");
            console.log(Data);
            document.getElementById("tableau").innerHTML = Data;
        },
        error: function(){
            alert("Erreur dans l'envoi");
        }
    });
}

function lister(){
    var donnee = "lister=true";
    console.log("donnée collectée: ", donnee);

    $.ajax({
        type: "POST",
        url: "../php/traitement.php",
        data: donnee,
        success: function(Data){
            console.log(Data);
            document.getElementById("tableau").innerHTML = Data;
        },
        error: function(){
            alert("Erreur dans l'envoi");
        }
    });
}

function color(diff){
    document.getElementById("row"+diff).style.color = "green";
}

function decolor(diff){
    document.getElementById("row"+diff).style.color = "black";
}

function store(int){
    localStorage.setItem("id", int);
    location.href = "contact.html";
}



