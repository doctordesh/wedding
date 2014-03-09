<div class="col-xs-12 col-sm-6 col-md-4 item">
  <div class="item-inside">
    <h3><?= $item->title; ?></h3>
    <?php if($item->note) : ?>
      <p class="note"><?= $item->note; ?></p>
    <?php endif; ?>
    <p>
      <?php if($item->url) : ?>
        <a class="btn btn-info" href="<?= $item->url; ?>" title="<?= $item->title; ?>" target="_blank">Länk</a>
      <?php endif; ?>
      <button type="submit" class="book-item btn btn-primary">Reservera</button>
    </p>
  </div>
</div>
