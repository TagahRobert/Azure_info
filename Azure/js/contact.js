$(function(){
    afficher();
});

function afficher(){
    var id = localStorage.getItem("id") ?? 0;
    if(id == 0){
        document.getElementById("").innerHTML = "";
    }else{
        $.ajax({
            type: "POST",
            url: "../php/traitement.php",
            data: "afficher=" + id,
            success: function(Data){
                console.log(Data);
                document.getElementById("formulaire").innerHTML = Data;
            },
            error: function(){
             alert("Erreur dans l'envoi");
            }
        });
    }
}

function modifier(id){
    var donnee = $(".formulaire").serialize();
    donnee += "&modifier=true&id=" + id;
    console.log("donnée collectée: ", donnee)

    $.ajax({
        type: "POST",
        url: "../php/traitement.php",
        data: donnee,
        success: function(){
            alert("Contact modifié");
            location.replace("index.html");
        },
        error: function(){
            alert("Erreur dans l'envoi");
        }
    });
}

function supprimer(id){
    var donnee = "supprimer=true&id=" + id;
    console.log("donnée collectée: ", donnee);

    $.ajax({
        type: "POST",
        url: "../php/traitement.php",
        data: donnee,
        success: function(){
            alert("Contact supprimé");
            location.replace("index.html");
        },
        error: function(){
             alert("Erreur dans l'envoi");
        }
    });
}