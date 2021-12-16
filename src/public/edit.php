<?php
$pageTitle = "Editar";
include_once '../includes/header.php';

if (!$_GET["id"]) {
    header("Location: ../public/index.php");
    die();
}

$info = edit($_GET["id"]);
?>

<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-md-4 offset-md-2 mt-5">
            <h1><strong>CRUD</strong></h1>
            <div class="col-1">
                <hr style="height: 2px;">
            </div>
            <h3 class="text-primary">Editar usuário</h3>
        </div>
    </div>
</div>

<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-md-8 offset-md-2 mt-4 p-3 shadow-5 rounded-5 overflow-hidden">
            <form action="../includes/functions.php?edit=<?= $_GET["id"] ?>" method="POST" enctype="multipart/form-data">

                <div class="mb-4">
                    <div class="profile-pic-wrapper d-flex justify-content-center">
                        <div class="pic-holder">
                            <img id="profilePic" class="pic" src="<?= $info["profilepic"] != "" ? "../../profilepics/" . $info["profilepic"] : "../includes/images/user3.png" ?>">

                            <label for="newProfilePhoto" class="upload-file-block">
                                <div class="text-center">
                                    <div class="mb-2">
                                        <i class="fa fa-camera fa-2x"></i>
                                    </div>
                                    <div class="text-uppercase">
                                        Foto <br /> de perfil
                                    </div>
                                </div>
                            </label>
                            <input class="uploadProfileInput" type="file" name="profilepic" id="newProfilePhoto" accept="image/*" style="display: none;" />
                        </div>
                    </div>
                </div>

                <!-- 2 column grid layout with text inputs for the first and last names -->
                <div class="row mb-4">
                    <div class="col-md-6 col-xs-12 mb-2">
                        <div class="form-outline">
                            <input type="text" id="name" name="user[name]" class="form-control form-control-lg" value="<?= $info["name"] ?>" required/>
                            <label class="form-label" for="name">Nome *</label>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12 mb-2">
                        <div class="form-outline">
                            <input type="email" id="email" name="user[email]" class="form-control form-control-lg" value="<?= $info["email"] ?>" required/>
                            <label class="form-label" for="email">Email *</label>
                        </div>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6 col-xs-12 mb-2">
                        <div class="form-outline">
                            <input type="text" name="user[cpf]" id="cpf" class="form-control form-control-lg" value="<?= $info["cpf"] ?>" required disabled>
                            <label for="cpf" class="form-label">CPF *</label>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12 mb-2">
                        <div class="form-outline">
                            <input type="text" name="user[phone]" id="phone" class="form-control form-control-lg" value="<?= $info["phone"] ?>">
                            <label for="phone" class="form-label">Celular</label>
                        </div>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6 col-xs-12 mb-2">
                        <label for="datebirth" class="form-label">Data de nascimento *</label>
                        <input type="date" name="user[datebirth]" id="datebirth" class="form-control form-control-lg" value="<?= $info["datebirth"] ?>" required>
                    </div>
                    <div class="col-md-6 col-xs-12 mb-2">
                        <label class="form-label" for="role">Cargo *</label>
                        <select name="user[roleId]" class="form-select form-select-lg is-valid" id="role" required>
                            <option value="1" <?= $info["roleId"] == 1 ? "selected" : "" ?>>Administrador</option>
                            <option value="2" <?= $info["roleId"] == 2 ? "selected" : "" ?>>Usuário</option>
                        </select>
                    </div>
                </div>

                <!-- Checkbox -->
                <div class="form-check d-flex justify-content-center mb-4">
                    <input class="form-check-input me-2" type="checkbox" name="user[activeuser]" id="activeuser" <?= $info["activeuser"] == 1 ? "checked" : "" ?> />
                    <label class="form-check-label" for="activeuser">
                        Usuário ativo
                    </label>
                </div>

                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block mb-4">Editar</button>
            </form>
        </div>
    </div>
</div>

<?php
include_once '../includes/footer.php';
?>