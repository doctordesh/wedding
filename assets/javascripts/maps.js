var maps = {
  init : function() {
    var self = this;
    var gmap = $('#gmap');

    if(!gmap.length) {
      return;
    }

    self.gps.church = new google.maps.LatLng(56.200023, 13.923875);
    self.gps.cakes  = new google.maps.LatLng(56.199830, 13.921502);
    self.gps.party  = new google.maps.LatLng(56.054463, 14.136824);

    gmap.height((gmap.width() - (gmap.width() / 4)));
    if(gmap.hasClass('wedding')) {
      self.weddingMap(gmap);
    } else if(gmap.hasClass('cakes')) {
      self.cakesMap(gmap);
    } else if(gmap.hasClass('party')) {
      self.partyMap(gmap);
    }
  },

  gps : { },

  weddingMap : function(mapContainer) {
    var self = this;
    var directionsService = new google.maps.DirectionsService();
    var directionsDisplay = new google.maps.DirectionsRenderer();
    var options = {
      center           : self.gps.church,
      zoom             : 11,
      disableDefaultUI : true,
      mapTypeId        : google.maps.MapTypeId.ROADMAP
    };

    var map = new google.maps.Map(document.getElementById("gmap"), options);
    directionsDisplay.setMap(map);

    var request = {
      origin      : 'Hässleholm',
      destination : self.gps.church,
      travelMode  : google.maps.TravelMode.DRIVING
    };
    directionsService.route(request, function(result, status) {
      if (status == google.maps.DirectionsStatus.OK) {
        directionsDisplay.setDirections(result);
      }
    });
  },

  cakesMap : function(mapContainer) {
    var self = this;
    var directionsService = new google.maps.DirectionsService();
    var directionsDisplay = new google.maps.DirectionsRenderer();
    var options = {
      center           : self.gps.church,
      zoom             : 11,
      disableDefaultUI : true,
      mapTypeId        : google.maps.MapTypeId.ROADMAP
    };

    var map = new google.maps.Map(document.getElementById("gmap"), options);
    directionsDisplay.setMap(map);

    var request = {
      origin      : self.gps.church,
      destination : self.gps.cakes,
      travelMode  : google.maps.TravelMode.DRIVING
    };
    directionsService.route(request, function(result, status) {
      if (status == google.maps.DirectionsStatus.OK) {
        directionsDisplay.setDirections(result);
      }
    });
  },

  partyMap : function(mapContainer) {
    var self = this;
    var directionsService = new google.maps.DirectionsService();
    var directionsDisplay = new google.maps.DirectionsRenderer();
    var options = {
      center           : self.gps.church,
      zoom             : 11,
      disableDefaultUI : true,
      mapTypeId        : google.maps.MapTypeId.ROADMAP
    };

    var map = new google.maps.Map(document.getElementById("gmap"), options);
    directionsDisplay.setMap(map);

    var request = {
      origin      : self.gps.cakes,
      destination : self.gps.party,
      travelMode  : google.maps.TravelMode.DRIVING
    };
    directionsService.route(request, function(result, status) {
      if (status == google.maps.DirectionsStatus.OK) {
        directionsDisplay.setDirections(result);
      }
    });
  }
};

$(document).ready(function() {
  function initialize() {
    maps.init();
  }
  google.maps.event.addDomListener(window, 'load', initialize);
});
