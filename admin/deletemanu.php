<?php
if (isset($_GET['id_menu'])) {
    session_start();
 include "../koneksi.php";
 $id = $_GET['id_menu'];
 $query = mysqli_query($koneksi, "DELETE FROM menu WHERE 
id_menu='$id'");
 if ($query) {
 $_SESSION['status']="Data Berhasil Dihapus";
 $_SESSION['icon']="success";
 $_SESSION['text']="Data telah dihapus";
 header("Location:datamenupage.php");
 } else {
 $_SESSION['status']="Data Gagal Dihapus";
 $_SESSION['icon']="error";
 $_SESSION['text']="Terjadi Kesalahan";
 header("Location:datamenupage.php");
}
}
?>