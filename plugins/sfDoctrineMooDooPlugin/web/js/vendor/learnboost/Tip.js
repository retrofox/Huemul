Tip = new Class({
  
  Extends: OverlayElement,
  
  options: {
    'class': 'tip',
    mask: {
      options: {
        'class': 'mask-transparent'
      }      
    }
  },
  
  initialize: function(element, options){
    this.setOptions(options);
    this.parent(new Element('div', {'class': this.options.class }).adopt(
      new Element('div', {'class': 'content'}).adopt(element),
      new Element('div', {'class': 'footer'})
    ), options);
  }
  
});

Element.implement({
  
  addTip: function(element, options){
    var overlay = new Tip(element, $merge({      
      position: {
        relativeTo: this,
        position: 'upperRight',
        edge: 'bottomLeft'
      },
      mask: false
    }, options));
    return this.store('tip:overlay', overlay).addEvents({
      mouseenter: function(){
        overlay.show();
      },
      mouseleave: function(){
        overlay.hide();
      }
    });
  },
  
  addDropdown: function(element, options){
    var overlay = new Tip(element, $merge({
      'class': 'tip-dropdown',      
      position: {
        relativeTo: this,
        position: {
          'x': 'left',
          'y': 'bottom'
        }        
      }
    }, options));
    return this.store('tip:overlay', overlay).addEvents({
      click: function(ev){
        ev.stop();
        overlay.toggle();
      }
    });
  }
  
});