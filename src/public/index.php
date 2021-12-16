<?php
    $pageTitle = "Home";
    include_once '../includes/header.php';

    $users = index();

    $roles = [
        1 => 'Administrador',
        2 => 'Usuário'
    ];
?>

<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-md-4 offset-md-2 mt-5">
            <h1><strong>CRUD</strong></h1>
            <div class="col-1">
                <hr style="height: 2px;">
            </div>
            <h3 class="text-primary">Lista de usuários</h3>
        </div>
    </div>
</div>

<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-md-8 offset-md-2 mt-4">
            <a class="btn btn-primary btn-lg mb-4 fw-bold" href="add.php"><i class="fas fa-plus"></i> &nbsp;&nbsp;Adicionar</a>
            <div class="shadow-5 rounded-5 overflow-hidden">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light fw-bold fs-5">
                        <tr>
                            <th>Nome</th>
                            <th>Cargo</th>
                            <th>Idade</th>
                            <th>Status</th>
                            <th>Opções</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($users as $user) {
                        ?>
                            <tr class="fs-6">
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="<?= $user["profilepic"] != "" ? "../../profilepics/" . $user["profilepic"] : "../includes/images/user2.png" ?>" style="width: 50px; height: 50px; object-fit: cover; object-position: center;" class="rounded-circle">
                                        <div class="ms-3">
                                            <p class="fw-bold mb-1"><?= $user['name'] ?></p>
                                            <p class="text-muted mb-0"><?= $user['email'] ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td class="fw-bold"><?= $roles[$user['roleId']] ?></td>
                                <td class="fw-bold">
                                    <?php
                                        $birthDate = new DateTime($user['datebirth']);
                                        $currentDate = new DateTime();
                                        $age = date_diff($birthDate, $currentDate);
                                        
                                        echo $age->format("%y");
                                    ?>
                                </td>
                                <td>
                                    <span class="badge badge-<?= $user['activeuser'] > 0 ? "success" : "danger" ?> fs-6 fw-bold"><?= $user['activeuser'] > 0 ? "Ativo" : "Inativo" ?></span>
                                </td>
                                <td>
                                    <a class="btn btn-primary btn-rounded" href="edit.php?id=<?= $user['userId'] ?>"><i class="fas fa-pencil-alt"></i> &nbsp;&nbsp;Editar</a>
                                    <a class="btn btn-danger btn-rounded mx-3" data-mdb-toggle="modal" data-mdb-target="#deleteModal" data-userid="<?= $user["userId"] ?>" data-name="<?= $user["name"] ?>"><i class="fas fa-trash-alt"></i> &nbsp;&nbsp;Excluir</a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php
    include_once '../includes/footer.php';
?>