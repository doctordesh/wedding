<h1>Här anmäler du dig till bröllopet!</h1>
<?php if($notice = $this->getNotice()) : ?>
  <p class="alert alert-success small"><?= $notice; ?></p>
<?php endif; ?>
<form method="post" action="/wedding/invite/<?= $this->invite->id; ?>">
  <input type="hidden" name="_METHOD" value="PUT" />

  <div id="accept-invite" class="row">
    <?php foreach($this->invite->members as $member) : ?>
      <div class="invite-container">
        <div class="col-xs-12 col-sm-6">
          <input type="hidden" name="invite[members][<?= $member->id; ?>][id]" value="<?= $member->id; ?>" />
          <input style="display: none;" type="text" class="member-status" name="invite[members][<?= $member->id; ?>][accepted]" value="<?= $member->accepted; ?>" />
          <div class="row">
            <div class="col-xs-12">
              <h3><?= $member->name; ?></h3>
            </div>
          </div>
          <div class="row control">
            <div class="col-xs-12 col-sm-5">
              <label>Kommer du?</label>
            </div>
            <div class="col-xs-12 col-sm-7">
              <div class="btn-group">
                <button type="button" data-value="ACCEPTED"  class="accept btn btn-default">Ja</button>
                <button type="button" data-value="DECLINED" class="decline btn btn-default">Nej</button>
              </div>
            </div>
          </div>
          <div class="row control">
            <div class="col-xs-12 col-sm-5">
              <label>Meddelande</label>
            </div>
            <div class="col-xs-12 col-sm-7">
              <input type="text" name="invite[members][<?= $member->id; ?>][message]" value="<?= $member->message; ?>" />
            </div>
          </div>
          <div class="row control">
            <div class="col-xs-12 col-sm-5">
              <label>Ev. allergier</label>
            </div>
            <div class="col-xs-12 col-sm-7">
              <input type="text" name="invite[members][<?= $member->id; ?>][allergies]" value="<?= $member->allergies; ?>" />
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
    <p class="submit-container col-xs-12">
      <input class="btn btn-primary" type="submit" value="Bekräfta" />
    </p>
  </div>
</form>
