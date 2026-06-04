<?php session_start();
if (isset($_SESSION['lang'])) {
  $lang = $_SESSION['lang'];
} else {
  $lang = 'en';
}

if ($lang == 'ar') {
  require_once 'lang/lang_ar.php';
} else {
  require_once 'lang/lang_en.php';
}

?>
<!DOCTYPE html>
<html lang="<?= $lang ?>" dir="<?= $language['Dir'] ?>">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

  <title>Blog</title>

  <!-- Bootstrap core CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous"> <!--

    TemplateMo 546 Sixteen Clothing

    https://templatemo.com/tm-546-sixteen-clothing

    -->

  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="assets/css/fontawesome.css">
  <link rel="stylesheet" href="assets/css/templatemo-sixteen.css">
  <link rel="stylesheet" href="assets/css/owl.css">
  <link rel="stylesheet" href="assets/css/header.css">

</head>

<body>

  <!-- Header -->
  <header class="padding-0">
    <nav class="navbar navbar-expand-lg">
      <div class="container-fluid px-4">
        <a class="navbar-brand navbar-brand--with-logo" href="index.php">
          <span class="navbar-logo-slot" aria-hidden="true">
            <!-- <img src="assets/images/logo.png" alt=""> -->
          </span>
          <h2><em><?= $language['Blog'] ?></em></h2>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="index.php"><?= $language['AllPosts'] ?>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="addPost.php"><?= $language['AddNewPost'] ?></a>
            </li>
            <?php if (isset($_SESSION['lang']) && $_SESSION['lang'] == 'ar') {
            ?>
              <li class="nav-item">
                <a class="nav-link" href="config/lang.php?lang=en">English</a>
              </li>
            <?php } else { ?>
              <li class="nav-item">
                <a class="nav-link" href="config/lang.php?lang=ar">العربية</a>
              </li>
            <?php } ?>
            <li class="nav-item">
              <a class="nav-link" href="#"><?= $language['Logout'] ?></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>