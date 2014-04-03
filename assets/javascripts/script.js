var script = {
  init : function() {
    var self = this;

    $('#accept-invite').on('click', 'button', function(e) {
      self.toggleInviteStatus($(e.target));
    });

    $('#accept-invite').find('input.member-status').each(function() {
      self.setActiveButton($(this));
    });

    $('.book-item').on('click', function(e) { self.bookItem($(e.target), 1); });
    $('.regret-item').on('click', function(e) { self.bookItem($(e.target), 0); });
      /*
      var target = $(e.target);

      target.fadeOut(200, function() {
        target.removeClass('btn-primary');
        target.addClass('btn-success');
        target.html('Är du säker?');
        target.fadeIn(200);
      });
    });
    */
  },

  bookItem : function(button, booked) {
    var item_id = button.data('id');
    $.ajax({
      url      : '/wedding/wishlist/item/' + item_id + '/edit',
      data     : { '_METHOD' : 'PUT', item : { booked : booked }},
      type     : 'POST',
      dataType : 'json',
      success  : function(resp) {
        button.removeClass('booked');
        button.removeClass('not-booked');
        button.fadeOut(function() {
          if(booked) {
            button.html('Tack!');
          } else {
            button.html('OK');
          }
          button.addClass(resp.status);
          button.fadeIn(function() {
          });
        })
      },
      error : function(a, b, c) {
        console.log(a, b, c);
      }
    });
  },


  toggleInviteStatus : function(button) {
    var self  = this;
    var value = button.data('value');
    var field = button.closest('.invite-container').find('input.member-status');
    field.val(value);

    self.setActiveButton(field);
  },

  setActiveButton : function(field) {
    field.closest('.invite-container').find('button').removeClass('btn-danger').removeClass('btn-success');
    if(field.val() == 'ACCEPTED') {
      button = field.closest('.invite-container').find('button.accept').addClass('btn-success');
    } else if(field.val() == 'DECLINED') {
      button = field.closest('.invite-container').find('button.decline').addClass('btn-danger');
    }
  }
};


$(document).ready(function() {
  script.init();
});