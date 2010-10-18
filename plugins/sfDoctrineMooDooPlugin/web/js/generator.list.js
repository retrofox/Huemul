window.addEvent('domready', function () {

  var  
    admin_bar = $('sf_admin_bar')
    ,  menu = admin_bar.getElement('ul.menu')
    ,  sf_admin_filter = admin_bar.getElement('.sf_admin_filter')
    ,  opts = menu.getElements('a.opt_filter').addEvents({
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
      //console.debug ("sf_admin_filter -> ", sf_admin_filter);
      if(sf_admin_filter.getStyle('display') == 'block') {
        el.getParent().removeClass('uparrow');
        sf_admin_filter.setStyle('display', 'none');
      }
      else  {
        /**console.log(el);*/
        el.getParent().addClass('uparrow');
        sf_admin_filter.setStyle('display', 'block');
      }
    }
    // *** end filter *** //

  }


})