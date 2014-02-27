<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <?php if($this->hasUserLevel(3)) : ?>
        <ul class="nav navbar-nav navbar-left">
          <li>
            <a href="/wedding/invites/<?= $_SESSION['invite']; ?>/edit" title="Din inbjudan">Din inbjudan</a>
          </li>
          <li>
            <a href="/wedding/invites" title="Alla inbjudningar">Alla inbjudningar</a>
          </li>
        </ul>
      <?php endif; ?>
      <ul class="nav navbar-nav navbar-right">
        <li>
          <a href="/logout" title="Logga ut">Logga ut</a>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>