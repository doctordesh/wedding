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
      <?php if(!$item->booked) : ?>
        <button type="submit" data-id="<?= $item->id; ?>" class="book-item btn btn-primary">Reservera</button>
      <?php endif; ?>
      <?php if($item->booked AND $item->invite_id == $_SESSION['invite']) : ?>
        <button type="submit" data-id="<?= $item->id; ?>" class="regret-item btn btn-primary">Ångra</button>
      <?php endif; ?>
    </p>
  </div>
</div>
