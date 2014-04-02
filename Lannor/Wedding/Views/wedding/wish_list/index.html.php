<?= $this->renderPartial('wedding/shared/_links'); ?>
<div id="content">
  <div class="row">
    <h1 class="col-xs-12">Önskelista</h1>

    <div class="wish-list-container col-xs-12">
      <h2>Ej reserverade</h2>
      <div class="row wish-list open">
        <?php foreach($this->open_items as $item) : ?>
          <?= $this->renderPartial('wedding/wish_list/_item', ['item' => $item]); ?>
        <?php endforeach; ?>
      </div>
      <?php if($this->booked_items) : ?>
        <h2>Reserverade</h2>
        <div class="row wish-list booked">
          <?php foreach($this->booked_items as $item) : ?>
            <?= $this->renderPartial('wedding/wish_list/_item', ['item' => $item]); ?>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
</div>
