<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../config/koneksi.php';
include '../controller/MenuController.php';

$menuController = new MenuController($conn);

if (!isset($_GET['id'])) {
    die("ID tidak ditemukan.");
}

$id = $_GET['id'];
$data = $menuController->getDataMenuById($id);

if (!$data) {
    die("Data tidak ditemukan.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_menu = $_POST['nama_menu'];
    $harga = $_POST['harga'];
    $kategori = $_POST['kategori'];

    if ($menuController->editData($id, $nama_menu, $harga, $kategori)) {
        header("Location: home.php");
        exit;
    } else {
        echo "<div class='alert alert-danger'>Gagal mengupdate data.</div>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Restoran</title>

    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>

<body>

    <div class="container mt-4">
        <h1 class="mb-4">Form Edit Menu</h1>
        <a href="home.php" class="btn btn-primary btn-sm mb-3">Home</a>

        <div class="card p-3">
            <form method="POST">
                <input type="hidden" name="id_menu" value="<?= htmlspecialchars($data['id_menu']); ?>">
                <div class="mb-3">
                    <label>Nama Menu</label>
                    <input type="text" name="nama_menu" class="form-control" value="<?= htmlspecialchars($data['nama_menu']); ?>" required>
                </div>
                <div class="mb-3">
                    <label>Harga</label>
                    <input type="number" name="harga" class="form-control" value="<?= htmlspecialchars($data['harga']); ?>" required>
                </div>
                <div class="mb-3">
                    <label>Kategori</label>
                    <input type="text" name="kategori" class="form-control" value="<?= htmlspecialchars($data['kategori']); ?>">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</body>

</html>