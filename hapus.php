<?php
require 'koneksi.php';
$id = $_GET['id'];
if (isset($_GET['id'])) {
    if (hapusAdmin($id) > 0) {
        echo ('halo');
        header('Location: tampil.php');
    } else {
        header('Location: tampil.php?eror');
    }


}

?>