
(function() {

  var laravel = {
    initialize: function() {
      this.methodLinks = window.document.querySelectorAll('a[data-method]');
      this.token = window.document.querySelectorAll('a[data-token]');
      this.registerEvents();
    },

    registerEvents: function() {
      console.log(this.methodLinks);
      this.methodLinks.forEach(el => {
        console.log(el);
        el.onclick = this.handleMethod
        el.onmousedown   = this.handleMethod
      });
      console.log(this.methodLinks);
    },

    handleMethod: function(e) {
      console.log(e);
      console.log(this);
      var link = this;
      var httpMethod = link.data('method').toUpperCase();
      var form;

      // If the data-method attribute is not PUT or DELETE,
      // then we don't know what to do. Just ignore.
      if ( $.inArray(httpMethod, ['PUT', 'DELETE']) === - 1 ) {
        return;
      }

      // Allow user to optionally provide data-confirm="Are you sure?"
      if ( link.data('confirm') ) {
        if ( ! laravel.verifyConfirm(link) ) {
          return false;
        }
      }

      form = laravel.createForm(link);
      form.submit();

      e.preventDefault();
    },

    verifyConfirm: function(link) {
      return confirm(link.data('confirm'));
    },

    createForm: function(link) {
      var form =
        $('<form>', {
          'method': 'POST',
          'action': link.attr('href')
        });

      var token =
        $('<input>', {
          'type': 'hidden',
          'name': '_token',
          'value': link.data('token')
        });

      var hiddenInput =
        $('<input>', {
          'name': '_method',
          'type': 'hidden',
          'value': link.data('method')
        });

      return form.append(token, hiddenInput)
        .appendTo('body');
    }
  };

  laravel.initialize();

})();