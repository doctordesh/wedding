<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Josephine &amp; Emil</title>
  <link rel="stylesheet" href="/assets/lib/css/bootstrap.min.css" />
  <link rel="stylesheet" href="/assets/stylesheets/screen.css" />
</head>
<body>
  <?= $this->renderPartial('wedding/shared/_menu'); ?>
  <div id="wrap">
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

      <?= $this->page(); ?>

    </div>
  </div>

  <div id="footer">
    <div class="container">
      <div class="dotted-divider dotted-gray"></div>
      <p>josephineochemil.se</p>
    </div>
  </div>

  <script src="/assets/lib/jquery.min.js" type="application/javascript"></script>
  <script src="/assets/lib/js/bootstrap.min.js" type="application/javascript"></script>
  <script src="/assets/javascripts/script.js" type="application/javascript"></script>

</body>
</html>