var script = {
  init : function() {
    var self = this;

    $('.btn-group').on('click', 'button', function(e) {
      self.toggleInviteStatus($(e.target));
    });

    $('#accept-invite').find('input.member-status').each(function() {
      self.setActiveButton($(this));
    });

    $('#accept-invite').find('input.member-speech').each(function() {
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
    var field = $('#' + button.closest('.btn-group').data('target'));

    field.val(value);

    console.log(field, value);

    self.setActiveButton(field);
  },

  setActiveButton : function(field) {
    var self  = this;
    var value = field.val();
    var id    = field.attr('id');
    var group = self._findBtnGroup(id);

    group.find('button').removeClass('active');

    group.find('button').each(function() {
      if($(this).data('value') == value) {
        $(this).addClass('active');
      }
    });

    //if(field.val() == 'ACCEPTED') {
    //  button = field.closest('.invite-container').find('button.accept').addClass('btn-success');
    //} else if(field.val() == 'DECLINED') {
    //  button = field.closest('.invite-container').find('button.decline').addClass('btn-danger');
    //}
  },


  _findBtnGroup : function(target) {
    var group = null;
    $('.btn-group').each(function() {
      if($(this).data('target') == target) {
        group = $(this);
      }
    });
    return group;
  }
};


$(document).ready(function() {
  script.init();
});