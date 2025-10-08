<?php
include '../config/koneksi.php';
include '../controller/MenuController.php';

$menuController = new MenuController($conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_menu'])) {
    $id = $_POST['id_menu'];

    $hapus = $menuController->deleteDataById($id);

    if ($hapus) {
        header("Location: home.php");
        exit;
    } else {
        header("Location: home.php");
        exit;
    }
} else {
    header("Location: home.php");
    exit;
}
