<!DOCTYPE html>
<html class="<?= $this->name . ' ' . $this->method; ?>">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
  <title>Josephine &amp; Emil</title>
  <link rel="stylesheet" href="/assets/lib/css/bootstrap.min.css" />
  <link rel="stylesheet" href="/assets/stylesheets/screen.css" />
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB58-aHdXoZj7_3Vc9d0yguHPRqGSIGymw&sensor=false"></script>
</head>
<body>
  <?= $this->renderPartial('wedding/shared/_menu'); ?>
  <div id="wrap">
    <div class="green-wrap no-top-style">
      <div class="dotted-divider dotted-white"></div>
      <div class="container">
        <h2>Bröllop!</h2>
      </div>
    </div>
    <div class="container">

      <?= $this->page(); ?>

    </div>
  </div>

  <div id="footer">
    <div class="container">
      <div class="dotted-divider dotted-gray"></div>
      <p>...och så levde de lyckliga!</p>
    </div>
  </div>

  <script src="/assets/lib/jquery.min.js" type="application/javascript"></script>
  <script src="/assets/lib/jquery-ui.min.js" type="application/javascript"></script>
  <script src="/assets/lib/js/bootstrap.min.js" type="application/javascript"></script>
  <script src="/assets/javascripts/script.js" type="application/javascript"></script>
  <script src="/assets/javascripts/maps.js" type="application/javascript"></script>

</body>
</html>