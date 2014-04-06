<?= $this->renderPartial('wedding/shared/_links'); ?>
<div id="content">
  <div class="row">
    <h1 class="col-xs-12">Här anmäler du dig till bröllopet!</h1>
  </div>
</div>
<?php if($notice = $this->getNotice()) : ?>
  <p class="alert alert-success small"><?= $notice; ?></p>
<?php endif; ?>
<form method="post" action="/wedding/invites/<?= $this->invite->id; ?>">
  <input type="hidden" name="_METHOD" value="PUT" />

  <div id="accept-invite" class="row">
    <?php foreach($this->invite->members as $member) : ?>
      <div class="invite-container">
        <div class="col-xs-12 col-sm-6">
          <input type="hidden" name="invite[members][<?= $member->id; ?>][id]" value="<?= $member->id; ?>" />
          <input type="hidden" id="invite-member-<?= $member->id; ?>-status" class="member-status" name="invite[members][<?= $member->id; ?>][accepted]" value="<?= $member->accepted; ?>" />
          <div class="row">
            <div class="col-xs-12">
              <h3><?= $member->name; ?></h3>
            </div>
          </div>
          <div class="row control">
            <div class="col-xs-12 col-sm-5">
              <label class="small">Kommer du?</label>
            </div>
            <div class="col-xs-12 col-sm-7">
              <div class="btn-group" data-target="invite-member-<?= $member->id; ?>-status">
                <button type="button" data-value="ACCEPTED" class="accept btn btn-default">Ja</button>
                <button type="button" data-value="DECLINED" class="decline btn btn-default">Nej</button>
              </div>
            </div>
          </div>
          <div class="row control">
            <div class="col-xs-12 col-sm-5">
              <label class="small">Meddelande</label>
            </div>
            <div class="col-xs-12 col-sm-7">
              <input type="text" name="invite[members][<?= $member->id; ?>][message]" value="<?= $member->message; ?>" />
            </div>
          </div>
          <div class="row control">
            <div class="col-xs-12 col-sm-5">
              <label class="small">Ev. allergier</label>
            </div>
            <div class="col-xs-12 col-sm-7">
              <input type="text" name="invite[members][<?= $member->id; ?>][allergies]" value="<?= $member->allergies; ?>" />
            </div>
          </div>
          <input type="hidden" id="invite-member-<?= $member->id; ?>-speech" class="member-speech" name="invite[members][<?= $member->id; ?>][speech]" value="<?= $member->speech; ?>" />
          <div class="row control" style="margin-top: 20px">
            <div class="col-xs-12 col-sm-5">
              <label class="small">Vill du medverka?</label>
            </div>
            <div class="col-xs-12 col-sm-7">
              <div class="btn-group" data-target="invite-member-<?= $member->id; ?>-speech">
                <button type="button" data-value="SPEACH"   class="btn btn-default">Tal</button>
                <button type="button" data-value="SPEX"     class="btn btn-default">Spex</button>
                <button type="button" data-value="MOVIE"    class="btn btn-default">Film</button>
                <button type="button" data-value="OTHER"    class="btn btn-default">Annat</button>
                <button type="button" data-value="DECLINED" class="btn btn-default">Nej</button>
              </div>
            </div>
          </div>
          <div class="row control">
            <div class="col-xs-12 col-sm-5">
              <label class="small">Din relation till brudparet?</label>
            </div>
            <div class="col-xs-12 col-sm-7">
              <input type="text" name="invite[members][<?= $member->id; ?>][relation]; ?>" value="<?= $member->relation; ?>" />
            </div>
          </div>
          <div class="row control">
            <div class="col-xs-12 col-sm-5">
              <label class="small">Hur lång tid behöver du?</label>
            </div>
            <div class="col-xs-12 col-sm-7">
              <input type="text" name="invite[members][<?= $member->id; ?>][time]; ?>" value="<?= $member->time; ?>" />
            </div>
          </div>
          <div class="row control">
            <div class="col-xs-12 col-sm-5">
              <label class="small">Behöver du någon utrustning?</label>
            </div>
            <div class="col-xs-12 col-sm-7">
              <input type="text" name="invite[members][<?= $member->id; ?>][gear]; ?>" value="<?= $member->gear; ?>" />
            </div>
          </div>
          <div class="row control">
            <div class="col-xs-12 col-sm-5">
              <label class="small">Övrig information</label>
            </div>
            <div class="col-xs-12 col-sm-7">
              <textarea name="invite[members][<?= $member->id; ?>][misc]; ?>"><?= $member->misc; ?></textarea>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
    <div class="col-xs-12" style="margin-top: 30px;">
      <p class="small">
        Era barn är väldigt välkomna på vigsel och tårtbuffé men till festen ser vi att ni lämnar dem hemma!
      </p>
    </div>
    <p class="submit-container col-xs-12">
      <input class="btn btn-primary" type="submit" value="Bekräfta" />
    </p>
  </div>
</form>
