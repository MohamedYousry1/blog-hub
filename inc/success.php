<?php if (isset($_SESSION['success'])): ?>
  <div class="alert-banner alert-banner--success" role="alert">
    <div class="alert-banner__icon" aria-hidden="true">
      <i class="fa fa-check-circle"></i>
    </div>
    <div class="alert-banner__content">
      <span class="alert-banner__title">Success</span>
      <p class="alert-banner__message"><?= htmlspecialchars($_SESSION['success'], ENT_QUOTES, 'UTF-8'); ?></p>
    </div>
    <button type="button" class="alert-banner__close" aria-label="Dismiss message" onclick="this.closest('.alert-banner').remove()">&times;</button>
  </div>
<?php
  unset($_SESSION['success']);
endif;
?>
