<?php require_once 'inc/header.php';
require_once 'config/connection.php';

if (isset($_GET['id'])) {
  $id = $_GET['id'];
}else{
  header("location:index.php");
  exit();
}
$query = "SELECT * FROM posts where id = '$id';";
$result = mysqli_query($connection, $query);
$post = mysqli_fetch_assoc($result); // for single post

?>
<link rel="stylesheet" href="assets/css/viewPost.css">

<div class="page-heading products-heading header-text">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="text-content">
          <h4>Blog Post</h4>
          <h2>Who we are &amp; What we do?</h2>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="best-features about-features view-post">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="section-heading">
          <h2>Post Details</h2>
        </div>
      </div>
          <div class="col-md-6">
            <div class="right-image">
              <img src="assets/images/postImage/<?= $post['image'] ?>" alt="Post cover">
            </div>
          </div>
          <div class="col-md-6">
            <div class="left-content">
              <div class="post-detail__meta">
                <span class="post-date"><i class="fa fa-calendar"></i> <?= $post['created_at']; ?></span>
                <span class="tag-chip">Blog</span>
              </div>
              <h4><?= $post['title']; ?></h4>
              <p><?= $post['body']; ?></p>
              <div class="post-detail__actions">
                <a href="index.php" class="btn-back">
                  <i class="fa fa-long-arrow-left"></i> Back to posts
                </a>
                <a href="editPost.php?id=<?= $post['id'] ?>" class="btn btn-outline-primary">Edit post</a>
                <form style="display: inline;" method="POST" action="handle/deletePost.php?id=<?= $post['id'] ?>">
                    <button class="btn btn-danger" name="delete"> Delete post </button>
                </form>
              </div>
            </div>
          </div>
    </div>
  </div>
</div>

<?php require_once 'inc/footer.php' ?>