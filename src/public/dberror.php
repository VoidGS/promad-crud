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
                        <h2 class="text-center text-danger card-title"><strong class="text-dark">CRUD —</strong> Error</h2>
                        <div class="row">
                            <div class="col">
                                <div class="row mb-4 mt-4">
                                    <h3 class="text-center">Ocorreu um erro na conexão com o banco de dados!</h3>
                                </div>

                                <a type="submit" class="btn btn-primary btn-block" href="login.php">Voltar</a>
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