<div class="row menu-items">
  <?php $i = 1; foreach($this->links as $key => $link) : ?>
    <div class="menu-item menu-item-<?= $i; ?>">
      <a href="<?= $key; ?>#content" class="<?= $this->active($key) ? 'active' : ''; ?>" title="<?= $link; ?>">
        <span class="image"></span>
        <span class="image-hover"></span>
        <span class="label"><?= $link; ?></span>
      </a>
    </div>
  <?php $i++; endforeach; ?>
</div>
