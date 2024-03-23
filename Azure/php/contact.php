<?php

class Contact{

    const DB_host = 'localhost';
    const DB_Name = 'cont';
    const user = 'root';
    const password = '';

    private $conn = null;

    public function __construct() {
        $connectionString = sprintf("mysql:host=%s;dbname=%s;charset=utf8;port=3306", Contact::DB_host, Contact::DB_Name, PDO::ERRMODE_EXCEPTION);
        try {
            $this->conn = new PDO($connectionString, Contact::user, Contact::password);
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }

    public function creer(array $data){
        $query1 = "INSERT INTO contact (Nom, Prenom, Telephone, Email, Naissance, Ville, Adresse, Profession) ";
        $query2 = "VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $query = $query1.$query2;
        $statement = $this->conn->prepare($query);
        $statement->bindParam(1, $data['nom']);
        $statement->bindParam(2, $data['prenom']);
        $statement->bindParam(3, $data['telephone']);
        $statement->bindParam(4, $data['email']);
        $statement->bindParam(5, $data['naissance']);
        $statement->bindParam(6, $data['ville']);
        $statement->bindParam(7, $data['adresse']);
        $statement->bindParam(8, $data['profession']);
        $statement->execute();
    }

    public function lister(){
        $query = "SELECT * FROM contact";
        $statement = $this->conn->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function afficher($id){
        $query = "SELECT * FROM contact WHERE Id=?";
        $statement = $this->conn->prepare($query);
        $statement->bindParam(1, $id);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function modifier(array $data){
        $query = "UPDATE contact SET Nom=?, Prenom=?, Telephone=?, Email=?, Naissance=?, Ville=?, Adresse=?, Profession=? WHERE Id=?";
        $statement = $this->conn->prepare($query);
        $statement->bindParam(1, $data['nom']);
        $statement->bindParam(2, $data['prenom']);
        $statement->bindParam(3, $data['telephone']);
        $statement->bindParam(4, $data['email']);
        $statement->bindParam(5, $data['naissance']);
        $statement->bindParam(6, $data['ville']);
        $statement->bindParam(7, $data['adresse']);
        $statement->bindParam(8, $data['profession']);
        $statement->bindParam(9, $data['id']);
        $statement->execute();
    }

    public function supprimer($id){
        $query = "DELETE FROM contact WHERE Id=?";
        $statement = $this->conn->prepare($query);
        $statement->bindParam(1, $id);
        $statement->execute();
    }
}