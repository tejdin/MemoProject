<?php

require_once 'MyPDO.php';

Class User{

    public MyPDO $pdo;

    public function __construct()
    {

        $this->pdo = new MyPDO();
    }

    public function authenticate($username)
    {
        try {


            $query = $this->pdo->getPDO()->prepare('SELECT * FROM User WHERE username = :username');
            $query->bindParam(':username', $username);
            $query->execute();

        } catch (PDOException $e) {
            throw new UserException('Connection failed: ' . $e->getMessage());
        }





        return $query->fetch();
    }

    //delete user
    public function deleteUser($username)
    {
        try {


        $query = $this->pdo->getPDO()->prepare('DELETE FROM User WHERE username = :username');
        $query->bindParam(':username',$username);
        $ok=$query->execute();
        return $ok;
        } catch (PDOException $e) {
            throw new UserException('Connection failed: ' . $e->getMessage());
        }


    }

    public function addUser($username,$password)
    {
        try {


        $query = $this->pdo->getPDO()->prepare('INSERT INTO User (username,password) VALUES (:username,:password)');
        $query->bindParam(':username',$username);
        $query->bindParam(':password',$password);
        $ok=$query->execute();
        return $ok;
        } catch (PDOException $e) {
            throw new UserException('Connection failed: ' . $e->getMessage());
        }
    }

    public function changePassword($username,$password)
    {


        try {
            $query = $this->pdo->getPDO()->prepare('UPDATE User SET password = :password WHERE username = :username');
            $query->bindParam(':username', $username);
            $query->bindParam(':password', $password);
            $ok = $query->execute();
            return $ok;


        } catch (PDOException $e) {
            throw new UserException('Connection failed: ' . $e->getMessage());
        }
    }




}