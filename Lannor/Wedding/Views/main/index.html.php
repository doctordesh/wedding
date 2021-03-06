<!--<div class="top-bar">Josephine &amp; Emil</div>-->
<div class="top-bar"></div>
<div class="green-wrap">
  <div class="container">
    <h1>Välkommen till<br />vårt bröllop!</h1>
  </div>
  <div class="dotted-divider dotted-white"></div>
  <div class="container">
    <h2>16 augusti 2014</h2>
  </div>
</div>
<div class="container">

  <div class="row">
    <div class="col-sm-8 col-sm-offset-2 center">
      <p>
        Välkommen till vår bröllopssida. Här kommer du hitta all info du behöver
        till bröllopet, bra va? Du kan tacka ja till din inbjudan, anmäla
        tal, spex eller något annat skoj. Kika in och ha koll på vår önskelista.
      </p>
      <p>
        Glöm inte att tacka ja innan den 1 maj
      </p>
      <p>Fyll i din kod som du fick med ditt inbjudningskort och bekräfta med [enter]</p>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-8 col-sm-offset-2">
      <form method="post" action="/sessions">
        <?php if(isset($this->error)) : ?>
          <p class="alert alert-danger small"><?= $this->error; ?></p>
        <?php endif; ?>
        <div id="login-field">
          <input
            type="text"
            name="invite[code]"
            autocomplete="off"
            autocorrect="off"
            autocapitalize="off"
            placeholder="Din kod"
            onfocus="this.placeholder = ''"
            onblur="this.placeholder = 'Din kod'"
          />
        </div>
      </form>
    </div>
  </div>

</div>