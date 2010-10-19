Tip.Calendar = new Class({
  
  Extends: Tip,
  
  options: {
  
  },

  initialize: function(element, options){
    this.setOptions(options);

    this.calendar = new Calendar({
      injectTo: false,
      formatTitle: '%B %Y',
      nav: {
        textBack: '&nbsp;',
        textNext: '&nbsp;'
      }
    });

    element.store('calendar', this.calendar);

    this.calendar.addEvents({
      selectedDay: function (el, date, changeDay) {
        element.set('value', date.format('%m/%d/%Y').toString());
        element.retrieve('tip:overlay').hide();
      }.bind(this),
      closed: function () {
        element.retrieve('tip:overlay').hide();
      }
    })

    this.parent(this.calendar.el, options);
  }
});


Element.implement({
  addCalendar: function(element, options){
    var overlay = new Tip.Calendar(this, $merge({
      injectTo: [this.getParent(), 'bottom'],
      'class': 'tip tip-calendar',
      position: {
        relativeTo: this,
        position: 'upperRight',
        edge: 'bottomLeft'
      }
    }, options));
    return this.store('tip:overlay', overlay).addEvents({
      focus: function(ev){
        ev.stop();
        overlay.show();
      }
    });
  }
});