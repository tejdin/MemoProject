<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use PDO;


class MyUser
{
    private $username;
    private $password;



    public function __construct(string $username, string $password) {
        $this->username = $username;
        $this->password = $password;

    }

      public function AddUser()
      {
          try {
              $query = "INSERT INTO myusers (username, password) VALUES (:username, :password)";
              $stmt = DB::connection()->getPdo()->prepare($query);
              $stmt->bindParam(':username', $this->username);
              $stmt->bindParam(':password', $this->password);
              $stmt->execute();
          } catch (PDOException $e) {
              throw new Exception('Connection failed: ' . $e->getMessage());
          }

      }

      public function login(){
          try {
              $query = "SELECT * FROM myusers WHERE username = :username";
              $stmt = DB::connection()->getPdo()->prepare($query);
              $stmt->bindParam(':username', $this->username);
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                if($result){
                    return $result;
                }
                else{
                    return false;
                }
            } catch (PDOException $e) {
                throw new Exception('Connection failed: ' . $e->getMessage());
            }
    }
    public function changepassword()
    {
        try {
            $query = "UPDATE myusers SET password = :password WHERE username = :username";
            $stmt = DB::connection()->getPdo()->prepare($query);
            $stmt->bindParam(':username', $this->username);
            $stmt->bindParam(':password', $this->password);
            $stmt->execute();
        } catch (PDOException $e) {
            throw new Exception('Connection failed: ' . $e->getMessage());
        }
    }
    public function getusername()
    {
        return $this->username;
    }



}
