<h1>Detta är din bröllopsanmälan. Vänligen uppdatera!</h1>
<form method="post" action="/wedding/invite/<?= $this->invite->id; ?>">
  <input type="hidden" name="_METHOD" value="PUT" />

  <?php foreach($this->invite->members as $member) : ?>
    <input type="hidden" name="invite[members][<?= $member->id; ?>][id]" value="<?= $member->id; ?>" />
    <div class="row">
      <div class="col-sm-4">
        <?= $member->name; ?>
      </div>
      <div class="col-sm-4">
        <label for="member-<?= $member->id; ?>-accept">Ja</label>
        <input
          id="member-<?= $member->id; ?>-accept"
          type="radio"
          name="invite[members][<?= $member->id; ?>][accepted]"
          value="1"
          <?= ($member->accepted ? 'checked="checked"' : ''); ?>
        />
        <label for="member-<?= $member->id; ?>-decline">Nej</label>
        <input
          id="member-<?= $member->id; ?>-decline"
          type="radio"
          name="invite[members][<?= $member->id; ?>][accepted]"
          value="0"
          <?= ($member->accepted ? '' : 'checked="checked"'); ?>
        />
      </div>
      <div class="col-sm-4">
        <input type="text" name="invite[members][<?= $member->id; ?>][allergies]" value="<?= $member->allergies; ?>" />
      </div>
    </div>
  <?php endforeach; ?>

  <input type="submit" value="Uppdatera din anmälan" />
</form>