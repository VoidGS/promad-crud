<?php

include_once '../includes/models/methods.php';

session_start();

if (!isset($_SESSION['uid']) && $pageTitle != "Login") {
    if (!isset($_GET['login'])) {
        header("Location: ../public/login.php");
        die();
    }
}

if (isset($_SESSION['uid']) && $pageTitle == "Login") {
    header("Location: ../public/index.php");
    die();
}

// Login Method
if (isset($_GET['login'])) {
    $object = new User;

    $username = $_POST['user']['username'];
    $password = $_POST['user']['password'];

    if ($object->getLogin($username, $password)) {
        $result = $object->getLogin($username, $password);

        $_SESSION['uid'] = $result['userId'];
        $_SESSION['name'] = $result['name'];
        $_SESSION['pfp'] = $result['profilepic'];

        header("Location: ../public/index.php");
        die();
    } else {
        header("Location: ../public/login.php?error");
        die();
    }
}

// Logout Method
if (isset($_GET['logout'])) {
    session_unset();
    header("Location: ../public/login.php");
    die();
}

// Index function
function index() {
    $object = new User;

    return $object->getAllUsers();
}

// Add Method
if (isset($_GET['add'])) {
    $user = $_POST["user"];
    if (isset($user["cpf"]) && isset($user["username"]) && isset($user["password"]) && isset($user["name"]) && isset($user["email"]) && isset($user["phone"]) && isset($user["datebirth"]) && isset($_FILES["profilepic"]) && isset($user["roleId"])) {
        $cpf = $user["cpf"];
        $username = $user["username"];
        $password = md5($user["password"]);
        $name = $user["name"];
        $email = $user["email"];
        $phone = $user["phone"];
        $datebirth = $user["datebirth"];
        $profilepic = $_FILES["profilepic"];
        $roleId = $user["roleId"];
        $activeuser = isset($user["activeuser"]) ? "1" : "0";

        if ($profilepic["name"]) {
            $folder = "../../profilepics/";
            $fileName = $profilepic["name"];
            $newFileName = uniqid();
            $extension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

            $fileInsert = $newFileName . "." . $extension;

            $movefile = move_uploaded_file($profilepic["tmp_name"], $folder . $newFileName . "." . $extension);
        } else {
            $fileInsert = "";
        }

        $object = new User;
        
        $result = $object->addUser($cpf, $username, $password, $name, $email, $phone, $datebirth, $fileInsert, $roleId, $activeuser);

        if ($result) {
            $_SESSION["alert"]["status"] = "success";
            $_SESSION["alert"]["message"] = "Usuário adicionado com sucesso!";
        } else {
            $_SESSION["alert"]["status"] = "error";
            $_SESSION["alert"]["message"] = "Ocorreu um erro! Tente novamente.";
        }

        header("Location: ../public/index.php");
    }
}

// Edit Function
function edit($id) {
    $object = new User;

    return $object->getUserInfo($id);
}

// Edit Method
if (isset($_GET['edit'])) {
    $id = $_GET["edit"];
    $user = $_POST["user"];
    if (isset($user["name"]) && isset($user["email"]) && isset($user["phone"]) && isset($user["datebirth"]) && isset($_FILES["profilepic"]) && isset($user["roleId"])) {
        $name = $user["name"];
        $email = $user["email"];
        $phone = $user["phone"];
        $datebirth = $user["datebirth"];
        $profilepic = $_FILES["profilepic"];
        $roleId = $user["roleId"];
        $activeuser = isset($user["activeuser"]) ? "1" : "0";

        if ($profilepic["name"]) {
            $folder = "../../profilepics/";
            $fileName = $profilepic["name"];
            $newFileName = uniqid();
            $extension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

            $fileInsert = $newFileName . "." . $extension;

            $movefile = move_uploaded_file($profilepic["tmp_name"], $folder . $newFileName . "." . $extension);
        } else {
            $fileInsert = "";
        }

        $object = new User;
        
        $result = $object->editUser($id, $name, $email, $phone, $datebirth, $fileInsert, $roleId, $activeuser);

        if ($id == $_SESSION["uid"]) {
            $result = $object->updateSession($id);

            if ($result) {
                $_SESSION["name"] = $result["name"];
                $_SESSION["pfp"] = $result["profilepic"];
            } else {
                session_unset();
                header("Location: ../public/login.php");
                die();
            }
        }

        if ($result) {
            $_SESSION["alert"]["status"] = "success";
            $_SESSION["alert"]["message"] = "Usuário editado com sucesso!";
        } else {
            $_SESSION["alert"]["status"] = "error";
            $_SESSION["alert"]["message"] = "Ocorreu um erro! Tente novamente.";
        }

        header("Location: ../public/index.php");
    }
}

// Remove Method
function remove($id) {
    $object = new User;
    
    $result = $object->removeUser($id);

    if ($result) {
        $_SESSION["alert"]["status"] = "success";
        $_SESSION["alert"]["message"] = "Usuário removido com sucesso!";
    } else {
        $_SESSION["alert"]["status"] = "error";
        $_SESSION["alert"]["message"] = "Ocorreu um erro! Tente novamente.";
    }

    header("Location: ../public/index.php");
}