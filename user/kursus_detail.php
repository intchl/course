<?php 
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: ../login.php");
    exit;
}

require '../functions.php';
$users_id = $_SESSION['users_id']; // ID user dari sesi
// Tangkap ID kursus dari URL
if (!isset($_GET['id'])) {
  echo "<script>alert('ID kursus tidak ditemukan!');window.location.href='index.php';</script>";
  exit;
}


$course_id = $_GET['id'];

$data = tampil("SELECT * FROM course WHERE id = '$course_id' ");


$course = $data[0]; // Ambil data kursus pertama
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <title> <?= htmlspecialchars($course['course_name']); ?></title>
  <meta name="description" content="" />
  <meta name="keywords" content="" />

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon" />
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon" />

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect" />
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet" />

  <!-- Vendor CSS Files -->
  <link
    href="assets/vendor/bootstrap/css/bootstrap.min.css"
    rel="stylesheet" />
  <link
    href="assets/vendor/bootstrap-icons/bootstrap-icons.css"
    rel="stylesheet" />
  <link href="assets/vendor/aos/aos.css" rel="stylesheet" />
  <link
    href="assets/vendor/glightbox/css/glightbox.min.css"
    rel="stylesheet" />
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet" />

  <!-- =======================================================
  * Template Name: iLanding
  * Template URL: https://bootstrapmade.com/ilanding-bootstrap-landing-page-template/
  * Updated: Nov 12 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="service-details-page">
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div
      class="header-container container-fluid container-xl position-relative d-flex align-items-center justify-content-between">
      <a
        href="index.html"
        class="logo d-flex align-items-center me-auto me-xl-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1 class="sitename">KursusKU</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="index.php" class="">Home</a></li>
          <li><a href="#services">Kursus</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="btn-getstarted" href="../logout.php">Logout</a>
    </div>
  </header>

  <main class="main">
    <!-- Page Title -->
    <div class="page-title light-background">
      <div class="container">
        <h1> <?= htmlspecialchars($course['course_name']); ?></h1>
      </div>
    </div>

    <!-- Service Details Section -->
    <section id="service-details" class="service-details section">
      <div class="container">
        <div class="row gy-5">
          <div class="col-lg-12 ps-lg-2" data-aos="fade-up" data-aos-delay="200">
            <h2>Jadwal</h2>
            <h3><?= htmlspecialchars($course['schedule']); ?></h3>
          </div>
          <div class="col-lg-12 ps-lg-2" data-aos="fade-up" data-aos-delay="200">
            <h2>Deskripsi</h2>
            <h3><?= htmlspecialchars($course['description']); ?></h3>
          </div>
          <div class="col-lg-12 d-flex justify-content-center">
            <form action="" method="POST" data-aos="fade-up" data-aos-delay="200">
              <input type="hidden" name="course_id" value="<?= htmlspecialchars($course_id); ?>">
              <button type="submit" name="register" class="btn btn-primary rounded-pill px-5 py-3">Daftar Sekarang</button>
            </form>
          </div>
        </div>
      </div>
    </section>
  </main>

  <footer id="footer" class="footer">
    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">KursusKU</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> Distributed By <a href="https://themewagon.com">ThemeWagon</a>
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a
    href="#"
    id="scroll-top"
    class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>
</body>

</html>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["register"])) {
  $kursus_id = $_POST["course_id"];
  $users_id = $_SESSION['users_id']; // ID user dari sesi

  // Cek apakah user sudah terdaftar dalam kursus
  $check = tampil("SELECT * FROM reg_course WHERE users_id = '$users_id' AND kursus_id = '$kursus_id'");
  if (!empty($check)) {
      echo "<script>alert('Anda sudah terdaftar di kursus ini!');window.location.href='index.php';</script>";
  } else {
      // Query untuk menyimpan data ke tabel reg_course
      $query = "INSERT INTO reg_course (users_id, kursus_id, date_course) VALUES ('$users_id', '$kursus_id', NOW())";
      if (mysqli_query($conn, $query)) {
          // Setelah pendaftaran berhasil, arahkan ke halaman kursus milik user
          echo "<script>alert('Kursus berhasil ditambahkan!');window.location.href='kursus.php';</script>";
      } else {
          echo "<script>alert('Pendaftaran gagal. Coba lagi!');</script>";
      }
  }
}
?>