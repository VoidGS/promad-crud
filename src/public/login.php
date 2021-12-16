<?php
$pageTitle = "Login";
include_once '../includes/header.php';
?>

<div class="login-background">
    <div class="container">
        <div class="row">
            <div class="col-md-6 flex-row mx-auto px-0">
                <div class="card pt-3 pb-3 shadow-5 bg-light">
                    <div class="card-body">
                        <h2 class="text-center text-primary card-title"><strong class="text-dark">CRUD —</strong> Login</h2>
                        <div class="row">
                            <div class="col">
                                <form action="../includes/functions.php?login" method="POST" enctype="multipart/form-data">

                                    <div class="row mb-4 mt-4">
                                        <div class="col">
                                            <div class="form-outline">
                                                <input type="text" name="user[username]" id="username" class="form-control form-control-lg" required>
                                                <label for="username" class="form-label"><i class="fas fa-user-alt"></i> &nbsp;Nome de usuário</label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-outline">
                                                <input type="password" name="user[password]" id="password" class="form-control form-control-lg" required>
                                                <label for="password" class="form-label"><i class="fas fa-unlock-alt"></i> &nbsp;Senha</label>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-block" disabled>Entrar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once '../includes/footer.php';
?>