<?= $this->renderPartial('wedding/shared/_links'); ?>
<div id="content">
  <div class="row">
    <h1 class="col-xs-12">Önskelista</h1>

    <div class="wish-list-container">
      <h2>Ej bokade</h2>
      <div class="row wish-list open">
        <?php foreach($this->open_items as $item) : ?>
          <?= $this->renderPartial('wedding/wish_list/_item', ['item' => $item]); ?>
        <?php endforeach; ?>
      </div>
      <h2>Bokade</h2>
      <div class="row wish-list booked">
        <?php foreach($this->booked_items as $item) : ?>
          <?= $this->renderPartial('wedding/wish_list/_item', ['item' => $item]); ?>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>
