<?php
$pageTitle = "Deletar";
include_once '../includes/header.php';

if (!$_GET["id"]) {
    header("Location: ../public/index.php");
    die();
}

$info = remove($_GET["id"]);
?>

<?php
include_once '../includes/footer.php';
?>