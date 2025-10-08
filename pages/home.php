<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../config/koneksi.php';
include '../controller/MenuController.php';

$menuController = new MenuController($conn);
$data = $menuController->getAllDataMenu();
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
        <h1 class="mb-4">Daftar Menu Restoran</h1>
        <a href="tambah.php" class="btn btn-primary mb-3">Tambah Menu</a>


        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Menu</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Tools</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $index => $item) : ?>
                    <tr>
                        <th scope="row"><?= $index + 1 ?></th>
                        <td><?= htmlspecialchars($item['nama_menu']) ?></td>
                        <td><?= htmlspecialchars($item['harga']) ?></td>
                        <td><?= htmlspecialchars($item['kategori']) ?></td>
                        <td>
                            <a href="edit.php?id=<?= $item['id_menu']; ?>" class="btn btn-warning btn-sm">Edit</a>

                            <form action="hapus.php" method="POST" style="display:inline;">
                                <input type="hidden" name="id_menu" value="<?= $item['id_menu']; ?>">
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin mau hapus menu ini?')">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>



    <script src="../assets/js/jquery-3.6.0.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/script.js"></script>
</body>

</html>