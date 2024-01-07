
<!DOCTYPE html>
<html lang="en">
<head>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>menu</title>
     <link rel="stylesheet" href="css/bootstrap.min.css">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
     <link rel="stylesheet" href="assets/style/style.css">
     <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
<?php
    session_start();
    if(!isset($_SESSION['login'])){
      $_SESSION['status']="Maaf";
      $_SESSION['icon']="error";
      $_SESSION['text']="Anda harus login terlebih dahulu";
    header("location:login.php");
    exit;
   }
   ?>
<nav class="navbar navbar-expand-lg navbar-light bg-dark ">
        <div class="container-fluid">
          <a class="navbar-brand text-light" href="#"><h2>CAFE</h2></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <i class="bi bi-list text-white"></i>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav justify-content-center">
              <li class="nav-item">
                <a class="nav-link text-light fw-bold" href="user/indexuser.php">menu</a>
              </li>
              <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle nav-link text-light" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
               Kategori
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="kategoriKopi Hotpage.php">Kopi Hot</a></li>
            <li><a class="dropdown-item" href="kategoriKopi Coldpage.php">Kopi Cold</a></li>
            <li><a class="dropdown-item" href="kategoriNon Kopi Hotpage.php">Non Kopi Hot</a></li>
            <li><a class="dropdown-item" href="kategoriNon Kopi Coldpage.php">Non Kopi Cold</a></li>
            <li><a class="dropdown-item" href="kategoriFoodpage.php">Food</a></li>
            <li><a class="dropdown-item" href="kategoriSnackpage.php">Snack</a></li>
           
          </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light" href="user/indexprofil.php">Profil</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light" href="user/aboutpageuser.php">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light" href="contactpage.php">Contact Me</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light" href="logout.php">Logout</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
<section id="content">
      <div class="container">
          <div class="card" style="margin-top:10px;">
<?php 
include "koneksi.php";
    $id = $_GET['id_menu'];
    $query = mysqli_query($koneksi,"SELECT * FROM menu INNER JOIN kategori ON menu.id_kategori=kategori.id_kategori WHERE id_menu='$id'");
    $data = mysqli_fetch_array($query);
?>

          <div class="row" style="background-color:#eee">
          <div class="card-header" style="background-color:black;">
                 <h1 class="fw-bold text-center text-white">CAFE</h1>
          </div>
                <div class="col-sm">
                  <div class="media">
                    <div class="media-title text-center" style="margin-top:20px; margin-bottom:20px;">
                        <h2 class="mt-0 fw-bold"><?= $data['nama_menu'] ?></h2>
                    </div>
                    <div class="w-100 text-center">
                        <img src="images/<?= $data['gambar_menu']?>" alt="" class="image-artikel">
                    </div>
                    <div class="text-center" style="margin-top:10px;">
                        <p class="mt-0 ">Kategori :   <?= $data['nama_kategori'] ?></p>
                        <small class="mt-0">Penulis : <?= $data['nama_cafe'] ?></small> |
                        <small class="mt-0">Publish : <?= $data['tgl_menu'] ?></small>
                    </div>
                    <hr>
                    <div class="media-body">
                     <?php 
                              echo'<p class="category_text lead fw-normal" style="text-align:justify; margin:15px;"' 
                            . implode('.</p><p class="category_text lead fw-normal" style="text-align:justify; margin:15px;">', explode('. ',$data['isi_menu'] ))
                            .'</p>';
                        ?>
                    </div>
                  </div>
                <hr>
                <h3>menu Lainnya</h3>
                <div class="row row-cols-1 row-cols-md-2 row-cols-1 row-cols-lg-3 g-3 g-lg-2 m-0 w-100" style="padding-bottom:15px;">
        <?php
        $nama=$data['nama_kategori'];
            $qry= $koneksi->query("SELECT * FROM menu INNER JOIN kategori ON menu.id_kategori = kategori.id_kategori ORDER BY RAND() LIMIT 3");
          
            while ($data=mysqli_fetch_array($qry))  {  
        ?>
                <div class="col">
                    <div class="card border-0 h-100 mb-1 mb-md-3">
                        <span class="label-category p-1"><?=$data['nama_kategori']?></span>
                        <img src="images/<?=$data['gambar_menu']?>" alt="" class="thumbnail-latets" style="width:100%;">
                        <div class="card-body p-0" style="background-color:black;">
                            <p class="card-title-latets mb-2 mb-md-2 multi-line-truncate text-white" style="margin:15px;"><?=$data['nama_menu']?></p>
                            <a href="menupage.php?id_menu=<?= $data['id_menu'] ?>"class="stretched-link"></a>
                            <div class="d-flex justify-content-between" style="margin:15px;">
                                <small class="text-white"><?= $data['tgl_menu']?></small>
                                <small class="text-white"><?= $data['nama_cafe']?></small>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
                ?>
                </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
include "footer.php";
?>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>