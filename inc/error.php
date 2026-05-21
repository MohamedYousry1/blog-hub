<?php if (isset($_SESSION['errors']) && !empty($_SESSION['errors'])): ?>
  <div class="alert-banner alert-banner--error" role="alert">
    <div class="alert-banner__icon" aria-hidden="true">
      <i class="fa fa-exclamation-circle"></i>
    </div>
    <div class="alert-banner__content">
      <span class="alert-banner__title"><?= count($_SESSION['errors']) === 1 ? 'Something went wrong' : 'Please fix the following'; ?></span>
      <?php if (count($_SESSION['errors']) === 1): ?>
        <p class="alert-banner__message"><?= htmlspecialchars($_SESSION['errors'][0], ENT_QUOTES, 'UTF-8'); ?></p>
      <?php else: ?>
        <ul class="alert-banner__list">
          <?php foreach ($_SESSION['errors'] as $error): ?>
            <li><?= htmlspecialchars("- " . $error, ENT_QUOTES, 'UTF-8'); ?></li>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>
    </div>
    <button type="button" class="alert-banner__close" aria-label="Dismiss message" onclick="this.closest('.alert-banner').remove()">&times;</button>
  </div>
<?php
  unset($_SESSION['errors']);
endif;
?>
