window.addEvent('domready', function () {

  var  
    admin_bar = $('sf_admin_bar')
    ,  menu = admin_bar.getElement('nav.menu')
    ,  sf_admin_filter = admin_bar.getElement('.sf_admin_filter')
    ,  opts = menu.getElements('a').addEvents({
    click: function (ev) {
      ev.preventDefault();

      var method = this.get('class').substring(4);
      
      options[method](this);

    }
  }),
  options = {
      /*
     * option filter
     */
    filter: function(el) {
      console.debug ("sf_admin_filter -> ", sf_admin_filter);
      
      if(sf_admin_filter.getStyle('display') == 'block') sf_admin_filter.setStyle('display', 'none');
      else  sf_admin_filter.setStyle('display', 'block');
    }
    // *** end filter *** //

  }


})