<?php
session_start();
require_once 'inc/header.php';
require_once 'config/connection.php';

if (isset($_GET['id'])) {
  $id = $_GET['id'];
} else {
  header("location:index.php");
  exit();
}
$query = "SELECT * FROM posts where id = '$id';";
$result = mysqli_query($connection, $query);
$post = mysqli_fetch_assoc($result); // for single post
?>
<link rel="stylesheet" href="assets/css/addPost.css">

<div class="page-heading products-heading header-text">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="text-content">
          <h4>Edit Post</h4>
          <h2>edit your personal post</h2>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container w-50 add-post-page">
  <div class="d-flex justify-content-center">
    <h3 class="my-5">Edit Post</h3>
  </div>

  <div class="form-alerts">
    <?php
    if (isset($_SESSION['errors'])):
      require_once 'inc/error.php';
    endif;
    ?>
  </div>

  <form method="POST" action="handle/editPost.php?id=<?= $post['id']; ?>" enctype="multipart/form-data">
    <div class="d-flex justify-content-center"">
      <div class=" card" style="width: 18rem;">
      <img src="assets/images/postImage/<?= $post['image'] ?>" class="text-center card-img" alt="" srcset="">
    </div>
</div>
<div class="mb-3">
  <label for="title" class="form-label">Title</label>
  <input type="text" class="form-control" id="title" name="title" value="<?= $post['title'] ?>">
</div>
<div class="mb-3">
  <label for="body" class="form-label">Body</label>
  <textarea class="form-control" id="body" name="body" rows="5"><?= $post['body'] ?></textarea>
</div>
<div class="mb-3">
  <label for="image" class="form-label">Image</label>
  <input type="file" class="form-control" id="image" name="image">
</div>
<button type="submit" class="btn btn-outline-primary" name="update">Update Post</button>
</div>

<?php require_once 'inc/footer.php' ?>