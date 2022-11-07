<?php

require_once 'config.php';

class Database extends Config{

    //insérer des utilisateurs dans la BDD
    public function insert($prenom, $nom, $email, $telephone){
        $sql = 'INSERT INTO users(prenom, nom, email, telephone)
            VALUES (:prenom, :nom, :email, :telephone)';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'prenom' => $prenom,
            'nom' => $nom,
            'email' => $email,
            'telephone' => $telephone
        ]);
        return true;
    }

    //on va chercher tous les utilisateurs de la BDD
    public function read(){
        $sql = 'SELECT * FROM users ORDER BY id DESC';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        //'fetchAll' : renvoie un tableau contenant tous les résultats
        $result = $stmt->fetchAll();
        return $result;
    }

    //on va chercher un seul utilisateur dans la BDD
    public function readOne($id){
        $sql = 'SELECT * FROM users WHERE id = :id';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        //'fetch' : pour ne renvoyer qu'un seul résultat
        $result = $stmt->fetch();
        return $result;
    }

    //Modifier un seul utilisateur
    public function update($id, $prenom, $nom, $email, $telephone){
        $sql = 'UPDATE users SET id = :id, prenom = :prenom, nom = :nom,
            email = :email, telephone = :telephone
            WHERE id = :id';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'prenom' => $prenom,
            'nom' => $nom,
            'email' => $email,
            'telephone' => $telephone,
            'id' => $id,
        ]);
        return true;
    }

}

?>