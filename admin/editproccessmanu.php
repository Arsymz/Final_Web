<?php
if (isset($_POST['edit'])) {
include '../koneksi.php';
session_start();
 $title = $_POST['nama_menu'];
 $id = $_POST['id_menu'];
 $penulis=$_POST['nama_cafe'];
 $content = $_POST['isi_menu'];
 $tgl=$_POST['tgl_menu'];
 $category = $_POST['id_kategori'];
 $thumbnail = $_POST['gambar_menu'];
 $extension_allowed = array('png', 'jpg','jpeg');
 $name = $_FILES['gambar_menu']['name'];
 $x = explode('.', $name);
 $extension = strtolower(end($x));
 $size = $_FILES['gambar_menu']['size'];
 $file_tmp = $_FILES['gambar_menu']['tmp_name'];
 if (in_array($extension, $extension_allowed) === true) {
 if ($ukuran < 1044070) {
 move_uploaded_file($file_tmp, '../images/' . $name);
 $query = mysqli_query($koneksi, "UPDATE menu SET 
id_kategori='$category',nama_menu='$title',nama_cafe='$penulis', tgl_menu='$tgl', isi_menu='$content', 
gambar_menu='$name' WHERE id_menu='$id'");
 if ($query) {
    $_SESSION['status']="Berhasil Update menu";
    $_SESSION['icon']="success";
    $_SESSION['text']="Data berhasil diperbarui";
 header("Location:datamenupage.php");
 } else {
    $_SESSION['status']="Gagal Update menu";
    $_SESSION['icon']="error";
    $_SESSION['text']="Terjadi Kesalahan";
 header("Location:datamenupage.php");
 }
 } else {
    $_SESSION['status']="Gagal Update menu";
    $_SESSION['icon']="error";
    $_SESSION['text']="Extension File Photo tidak sesuai";
 header("Location:datamenupage.php?");
 }
 } else {
 $query = mysqli_query($koneksi, "UPDATE menu SET 
id_kategori='$category',nama_menu='$title',nama_cafe='$penulis', tgl_menu='$tgl', isi_menu='$content' WHERE id_menu='$id'");
 if ($query) {
    $_SESSION['status']="Berhasil Update menu";
    $_SESSION['icon']="success";
    $_SESSION['text']="Data berhasil diperbarui";
 header("Location:datamenupage.php");
 } else {
    $_SESSION['status']="Gagal Update menu";
    $_SESSION['icon']="error";
    $_SESSION['text']="Terjadi Kesalahan";
 header("Location:datamenupage.php");
 }
 }
}
?>