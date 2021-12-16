<?php

include_once 'dbClass.php';

class User extends dbClass {
    public function getAllUsers() {
        $stmt = $this->connect()->query("SELECT * FROM users");
        $result = $stmt->fetchAll();

        return $result;
    }

    public function getLogin($username, $password) {
        $md5_password = md5($password);
        $stmt = $this->connect()->prepare("SELECT userId, name, profilepic FROM users WHERE username = ? AND password = ? AND activeuser = 1");
        $stmt->execute([$username, $md5_password]);

        if ($stmt->rowCount()) {
            return $stmt->fetch();
        } else {
            return false;
        }
    }

    public function updateSession($id) {
        $stmt = $this->connect()->prepare("SELECT userId, name, profilepic FROM users WHERE userId = ?");
        $stmt->execute([$id]);

        if ($stmt->rowCount()) {
            return $stmt->fetch();
        } else {
            return false;
        }
    }

    public function addUser($cpf, $username, $password, $name, $email, $phone, $datebirth, $profilepic, $roleId, $activeuser) {
        $stmt = $this->connect()->prepare("INSERT INTO users (cpf, username, password, name, email, phone, datebirth, profilepic, roleId, activeuser) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        
        if ($stmt->execute([$cpf, $username, $password, $name, $email, $phone, $datebirth, $profilepic, $roleId, $activeuser])) {
            return true;
        } else {
            return false;
        }
    }

    public function getUserInfo($id) {
        $stmt = $this->connect()->prepare("SELECT * FROM users WHERE userId = ?");
        $stmt->execute([$id]);
        $result = $stmt->fetch();

        return $result;
    }

    public function editUser($id, $name, $email, $phone, $datebirth, $fileInsert, $roleId, $activeuser) {
        $commitCount = 0;
        $errorCount = 0;
        $stmt = $this->connect()->prepare("UPDATE users SET name = ?, email = ?, phone = ?, datebirth = ?, roleId = ?, activeuser = ? WHERE userId = ?");
        if ($stmt->execute([$name, $email, $phone, $datebirth, $roleId, $activeuser, $id])) {
            $commitCount++;
        } else {
            $errorCount++;
        }
        
        if ($fileInsert != "") {
            $stmt2 = $this->connect()->prepare("UPDATE users SET profilepic = ? WHERE userId = ?");
            if ($stmt2->execute([$fileInsert, $id])) {
                $commitCount++;
            } else {
                $errorCount++;
            }
        }

        if ($commitCount > 0 && $errorCount == 0) {
            return true;
        } else {
            return false;
        }
    }

    public function removeUser($id) {
        $stmt = $this->connect()->prepare("DELETE FROM users WHERE userId = ?");
        
        if ($stmt->execute([$id])) {
            return true;
        } else {
            return false;
        }
    }
}