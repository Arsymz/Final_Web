<?php
        include "koneksi.php";
        session_start();
           if(!isset($_SESSION['login'])){
             $_SESSION['status']="Maaf";
             $_SESSION['icon']="error";
             $_SESSION['text']="Anda harus login terlebih dahulu";
           header("location:login.php");
           exit;
       }
        $id="Non Kopi Cold";
        $limit = 5;  
          if (isset($_GET["page"])) {
	          $page  = $_GET["page"]; 
	        } 
      	  else{ 
	          $page=1;
	        };  
        $start_from = ($page-1) * $limit;  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda</title>
     <link rel="stylesheet" href="css/bootstrap.min.css">
     <link rel="stylesheet" href="css/bootstrap.css">
     <link rel="stylesheet" href="assets/style/style.css">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-dark ">
        <div class="container-fluid">
          <a class="navbar-brand text-light" href="#"><h2>CAFE</h2></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <i class="bi bi-list text-white"></i>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav justify-content-center">
              <li class="nav-item">
                <a class="nav-link text-light" href="user/indexuser.php">menu</a>
              </li>
              <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle nav-link text-light fw-bold" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
               Kategori
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <li><a class="dropdown-item" href="kategoriKopiHotpage.php">Kopi Hot</a></li>
            <li><a class="dropdown-item" href="kategoriKopiColdpage.php">Kopi Cold</a></li>
            <li><a class="dropdown-item" href="kategoriNonKopiHotpage.php">Non Kopi Hot</a></li>
            <li><a class="dropdown-item fw-bold" href="kategoriNonKopiColdpage.php">Non Kopi Cold</a></li>
            <li><a class="dropdown-item" href="kategoriFoodpage.php">Food</a></li>
            <li><a class="dropdown-item" href="kategoriSnackpage.php">Snack</a></li>
           
          </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light" href="user/indexprofil.php">Profil</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light" href="aboutpage.php">About</a>
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
    <div class="container" style="margin-top:50px;">
    <div class="d-flex justify-content-between">
      <h3 class="fw-bold">menu Terbaru</h3>
        
      </div>
      <hr>
    <div class="row row-cols-1 row-cols-md-3 row-cols-2 row-cols-lg-4 g-4 g-lg-3 m-0 w-100">

        <?php
            $query= $koneksi->query("SELECT * FROM menu INNER JOIN kategori ON menu.id_kategori=kategori.id_kategori WHERE nama_kategori='$id' ORDER BY tgl_menu DESC LIMIT 4");
          
            while ($data=mysqli_fetch_array($query))  {  
        ?>
                <div class="col">
                    <div class="card border-0 h-100 mb-2 mb-md-4">
                        <span class="label-category p-1"><?=$data['nama_kategori']?></span>
                        <img src="images/<?=$data['gambar_menu']?>" alt="" class="thumbnail-latets" style="height:100%">
                        <div class="card-body p-0">
                            <p class="card-title-latets mb-2 mb-md-3 multi-line-truncate"><?=$data['nama_menu']?></p>
                            <a href="menupage.php?id_menu=<?= $data['id_menu'] ?>"class="stretched-link"></a>
                            <div class="d-flex justify-content-between">
                                <small class="text-muted"><?= $data['tgl_menu']?></small>
                                <small class="text-muted"><?= $data['nama_cafe']?></small>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
                ?>
    </div>
             <div id="content-CAFE" class="row" style="margin-top:50px;">
                <div class="col-12 col-md-12">
                    <h3 class="fw-bold">Lihat menu</h3>
                    <hr>
                     <?php
                      $result = mysqli_query($koneksi,"SELECT * FROM menu INNER JOIN kategori ON menu.id_kategori=kategori.id_kategori WHERE nama_kategori='$id' ORDER BY id_menu DESC LIMIT $start_from, $limit");
                      while ($data=mysqli_fetch_array($result))  {  
                      ?>
                      <div class="card border-0 w-100">
                          <div class="row g-0 align-items-center">
                            <div class="col-md-4 col-4 position-relative">
                                <img src="images/<?=$data['gambar_menu']?>" class="img-fluid rounded my-auto" style="width:400px; heigth:100%;">
                            </div>
                            <div class="col-md-8 col-8">
                                <div class="card-body p-2 p-md-3">
                                    <h3 class="text-danger fw-bold list-label"><?=$data['nama_kategori']?></h3>
                                    <h2 class="card-title multi-line-truncate list-judul my-lg-4"><?=$data['nama_menu']?></h2>
                                    <a href="menupage.php?id_menu=<?= $data['id_menu'] ?>"class="stretched-link"></a>
                                    <large class="text-muted penulis me-4"><?=$data['nama_cafe']?></large>
                                    <large class="text-muted"><?=$data['tgl_menu']?></large>
                                </div>
                            </div>
                         </div>
                        <hr class="m-2">
                    </div> 
                      <?php
        }
        ?>
</div>
<?php  
$result_db = mysqli_query($koneksi,"SELECT COUNT(*) as jumlah FROM menu WHERE id_kategori ='6'"); 
$row_db = mysqli_fetch_row($result_db);  
$total_records = $row_db[0];  
$total_pages = ceil($total_records / $limit); 

$pagLink = "<ul class='pagination'>";  
for ($i=1; $i<=$total_pages; $i++) {
              $pagLink .= "<li class='page-item'><a class='page-link bg-dark text-white' href='kategoriNon Kopi Coldpage.php?page=".$i."'>".$i."</a></li>";	
}
echo $pagLink . "</ul>";  
?>

            </div>
</div>
</div>
<script src="js/bootstrap.min.js"></script>
<?php
include "footer.php";
?>

    </body>
    </html>