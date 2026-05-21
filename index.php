<?php require_once 'inc/header.php';
require_once 'config/connection.php';
?>
<?php
$query = "SELECT * FROM posts";
$result = mysqli_query($connection, $query);
$fetch_posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<link rel="stylesheet" href="assets/css/index.css">
<!-- Page Content -->
<!-- Banner Starts Here -->
<div class="banner header-text">
  <div class="owl-banner owl-carousel">
    <div class="banner-item-01">
      <div class="text-content">
        <h4>Best Offer</h4>
        <h2>New Arrivals On Sale</h2>
      </div>
    </div>
    <div class="banner-item-02">
      <div class="text-content">
        <h4>Flash Deals</h4>
        <h2>Get your best products</h2>
      </div>
    </div>
    <div class="banner-item-03">
      <div class="text-content">
        <h4>Last Minute</h4>
        <h2>Grab last minute deals</h2>
      </div>
    </div>
  </div>
</div>
<!-- Banner Ends Here -->

<div class="latest-products">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="section-heading">
          <h2>Latest Posts</h2>
        </div>
      </div>

      <?php if ($fetch_posts):
        foreach ($fetch_posts as $post): ?>
          <div class="col-md-6 col-lg-4 mb-4">
            <article class="post-card card border-0 h-100">
              <a href="viewPost.php?id=<?= $post['id']; ?>" class="card-img-wrap">
                <img src="assets/images/postImage/<?= $post['image'] ?>" alt="Blog post cover">
              </a>
              <div class="card-body d-flex flex-column">
                <div class="d-flex justify-content-between align-items-center">
                  <span class="post-date"><i class="fa fa-calendar"></i> <?= $post['created_at'] ?> </span>
                  <span class="tag-chip">Design</span>
                </div>
                <h3 class="card-title">
                  <a href="viewPost.php"><?= $post['title'] ?></a>
                </h3>
                <p class="card-text flex-grow-1"><?= $post['body'] ?></p>
                <div class="d-flex justify-content-end mt-3">
                  <a href="viewPost.php?id=<?= $post['id']; ?>" class="btn-future">View<i class="fa fa-long-arrow-right"></i></a>
                </div>
              </div>
            </article>
          </div>
        <?php endforeach;
      else: ?>
        <div class="col-md-12">
          <div class="no-posts">
            <div class="no-posts-icon">
              <i class="fa fa-file-text-o"></i>
            </div>
            <h3>No posts yet</h3>
            <p>There are no blog posts to show right now. Be the first to share something.</p>
            <a href="addPost.php" class="filled-button">Add New Post</a>
          </div>
        </div>
      <?php endif; ?>


    </div>
  </div>
</div>

<?php require_once 'inc/footer.php' ?>