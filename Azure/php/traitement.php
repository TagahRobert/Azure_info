<?php

include './contact.php';

$contact = new Contact();

if(isset($_POST['creer'])){
    $contact->creer($_POST);
    $liste = $contact->lister();
    foreach($liste as $un){
        echo '<tr onmouseover="color('.$un['Id'].')" onmouseleave="decolor('.$un['Id'].')" onclick="store('.$un['Id'].')" id="row'.$un['Id'].'">';
        echo '<td>'.$un['Prenom'].'</td>';
        echo '<td>'.$un['Nom'].'</td>';
        echo '<td>'.$un['Telephone'].'</td>';
        echo '<td>'.$un['Email'].'</td>';
        echo '</tr>';
    }
}

if(isset($_POST['lister'])){
    $liste = $contact->lister();
    foreach($liste as $un){
        echo '<tr onmouseover="color('.$un['Id'].')" onmouseleave="decolor('.$un['Id'].')" onclick="store('.$un['Id'].')" id="row'.$un['Id'].'">';
        echo '<td>'.$un['Prenom'].'</td>';
        echo '<td>'.$un['Nom'].'</td>';
        echo '<td>'.$un['Telephone'].'</td>';
        echo '<td>'.$un['Email'].'</td>';
        echo '</tr>';
    }
}

if(isset($_POST['afficher'])){
    $result = $contact->afficher($_POST['id']);
    foreach($result as $un){
        echo '<div class="flex-container">';
        echo '<div class="flex-container" id="part1">';
        echo '<div class="labelbox" id="labelbox1">';
        echo '<div class="label">';
        echo '<label for="prenom">Prénom</label>';
        echo '</div>';
        echo '<div class="label">';
        echo '<label for="telephone">Numéro de téléphone</label>';
        echo '</div>';
        echo '<div class="label">';
        echo '<label for="naissance">Date de naissance</label>';
        echo '</div>';
        echo '<div class="label">';
        echo '<label for="adresse">Adresse</label>';
        echo '</div>';
        echo '</div>';
        echo '<div>';
        echo '<div class="input">';
        echo '<input name="prenom" id="prenom" value="'.$un['Prenom'].'" required>';
        echo '</div>';
        echo '<div class="input">';
        echo '<input name="telephone" id="telephone" value="'.$un['Telephone'].'" required>';
        echo '</div>';
        echo '<div class="input">';
        echo '<input type="date" name="naissance" id="naissance" required>';
        echo '</div>';
        echo '<div class="input">';
        echo '<input name="adresse" id="adresse" value="'.$un['Adresse'].'" required>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '<div class="flex-container" id="part2">';
        echo '<div class="labelbox">';
        echo '<div class="label">';
        echo '<label for="nom">Nom</label>';
        echo '</div>';
        echo '<div class="label">';
        echo '<label for="email">Email</label>';
        echo '</div>';
        echo '<div class="label">';
        echo '<label for="ville">Ville</label>';
        echo '</div>';
        echo '<div class="label">';
        echo '<label for="profession">Profession</label>';
        echo '</div>';
        echo '</div>';
        echo '<div>';
        echo '<div class="input">';
        echo '<input name="nom" id="nom" value="'.$un['Nom'].'" required>';
        echo '</div>';
        echo '<div class="input">';
        echo '<input type="email" name="email" id="email" value="'.$un['Email'].'" required>';
        echo '</div>';
        echo '<div class="input">';
        echo '<input name="ville" id="ville" value="'.$un['Ville'].'" required>';
        echo '</div>';
        echo '<div class="input">';
        echo '<input name="profession" id="profession" value="'.$un['Profession'].'" required>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '<div class="button">';
        echo '<button onclick="modifier('.$un['Id'].')">Modifier</button> <button onclick="supprimer('.$un['Id'].')">Supprimer</button>';
        echo '</div>';
    }
}

if(isset($_POST['modifier'])){
    $contact->modifier($_POST);
}

if(isset($_POST['supprimer'])){
    $contact->supprimer($_POST['id']);
}