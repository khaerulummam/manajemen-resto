<?php
// include '../config/koneksi.php';
// include '../controller/MenuController.php';

// $menuController = new MenuController($conn);

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $nama_menu = $_POST['nama_menu'];
//     $harga = $_POST['harga'];
//     $kategori = $_POST['kategori'];

//     if ($menuController->addDataMenu($nama_menu, $harga, $kategori)) {
//         header("Location: home.php?status=success");
//         exit;
//     } else {
//         echo "Gagal menambah data.";
//     }
// }

error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../config/koneksi.php';
include '../controller/MenuController.php';

$menuController = new MenuController($conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_menu = $_POST['nama_menu'];
    $harga = $_POST['harga'];
    $kategori = $_POST['kategori'];

    if ($menuController->addDataMenu($nama_menu, $harga, $kategori)) {
        header("Location: home.php");
        exit;
    } else {
        echo "<div class='alert alert-danger'>Gagal menambah data.</div>";
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
        <h1 class="mb-4">Form Tambah Menu</h1>
        <a href="home.php" class="btn btn-primary btn-sm mb-3">Home</a>

        <div class="card p-3">
            <form method="POST">
                <div class="mb-3">
                    <label>Nama Menu</label>
                    <input type="text" name="nama_menu" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Harga</label>
                    <input type="number" name="harga" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Kategori</label>
                    <input type="text" name="kategori" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</body>

</html>