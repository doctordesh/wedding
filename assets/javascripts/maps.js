var maps = {
  init : function() {
    var self = this;

    console.log('in maps.init');
  }
};

$(document).ready(function() {
  function initialize() {
    maps.init();
  }
  google.maps.event.addDomListener(window, 'load', initialize);
});
