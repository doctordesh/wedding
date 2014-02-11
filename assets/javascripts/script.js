var script = {
  init : function() {
    var self = this;

    $('#accept-invite').on('click', 'button', function(e) {
      self.toggleInviteStatus($(e.target));
    });

    $('#accept-invite').find('input.member-status').each(function() {
      self.setActiveButton($(this));
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