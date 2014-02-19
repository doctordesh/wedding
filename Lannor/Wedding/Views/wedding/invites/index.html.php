<div class="row">
  <h1>Alla inbjudningar</h1>
</div>
<div id="stats" class="row">
  <div id="stats-total" class="col-xs-12 col-sm-6">
    <p class="alert alert-info">
      <span class="stats-label">Totalt:</span>
      <span class="value"><?= $this->stats->total; ?></span>
    </p>
  </div>
  <div id="stats-pending" class="col-xs-12 col-sm-6">
    <p class="alert alert-info">
      <span class="stats-label">Väntar på svar:</span>
      <span class="value"><?= $this->stats->pending; ?></span>
    </p>
  </div>
  <div id="stats-accepted" class="col-xs-12 col-sm-6">
    <p class="alert alert-success">
      <span class="stats-label">Tackat ja:</span>
      <span class="value"><?= $this->stats->accepted; ?></span>
    </p>
  </div>
  <div id="stats-declined" class="col-xs-12 col-sm-6">
    <p class="alert alert-danger">
      <span class="stats-label">Tackat nej:</span>
      <span class="value"><?= $this->stats->declined; ?></span>
    </p>
  </div>
</div>
<table class="table">
  <thead>
    <tr>
      <th>Namn</th>
      <?php if($this->hasUserLevel(5)) : ?>
        <th>Meddelande</th>
      <?php endif; ?>
      <th>Allergier</th>
    </tr>
  </thead>
  <thead class="status-header">
    <tr>
      <th colspan="3">Accepterat inbjudan</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($this->accepted as $invite_member) : ?>
      <tr>
        <td><?= $invite_member->name; ?></td>
        <?php if($this->hasUserLevel(5)) : ?>
          <td><?= $invite_member->message; ?></td>
        <?php endif; ?>
        <td><?= $invite_member->allergies; ?></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
  <thead class="status-header">
    <tr>
      <th colspan="3">Tackat nej</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($this->declined as $invite_member) : ?>
      <tr>
        <td><?= $invite_member->name; ?></td>
        <?php if($this->hasUserLevel(5)) : ?>
          <td><?= $invite_member->message; ?></td>
        <?php endif; ?>
        <td><?= $invite_member->allergies; ?></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
  <thead class="status-header">
    <tr>
      <th colspan="3">Ej besvarat inbjudan</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($this->pending as $invite_member) : ?>
      <tr>
        <td><?= $invite_member->name; ?></td>
        <?php if($this->hasUserLevel(5)) : ?>
          <td><?= $invite_member->message; ?></td>
        <?php endif; ?>
        <td><?= $invite_member->allergies; ?></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>