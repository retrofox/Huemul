OverlayElement = new Class({
  
  Implements: [Options, Events],
  
  options: {
    shown: false,
    position: {
      relativeTo: 'body'
    },
    mask: {
      element: 'body',
      options: {
        'class': 'mask-fixed',
        destroyOnHide: true,
        useIframeShim: false,
        hideOnClick: true
      }
    },
    injectTo: ['body', 'bottom'],
    zIndex: 60      
  },
  
  initialize: function(element, atts){
    //this.element = $(element).store('overlay', this).setStyle('position', 'absolute');
    this.element = element.store('overlay', this).setStyle('position', 'absolute');
    this.setOptions(atts);
    this[this.options.shown ? 'show' : 'hide']();
  },
  
  mask: function(){
    //$(this.options.mask.element).mask(this.options.mask.options);
    $$(this.options.mask.element)[0].mask(this.options.mask.options);

    if (this.options.mask.options.hideOnClick){
      var self = this;
      //$(this.options.mask.element).get('mask').addEvent('hide', function(){
      $$(this.options.mask.element)[0].get('mask').addEvent('hide', function(){
        self.hide();
      });
    }    
    //$(this.options.mask.element).get('mask').element.setStyle('z-index', this.options.zIndex - 1);
    $$(this.options.mask.element)[0].get('mask').element.setStyle('z-index', this.options.zIndex - 1);
  },

  unmask: function(){
    //this.options.mask.element.unmask();
    $$(this.options.mask.element)[0].unmask();
    
  },
  
  show: function(){
    this.shown = true;
    if (this.options.injectTo) this.element.inject.apply(this.element, this.options.injectTo);
    if (this.options.mask !== false) this.mask();
    this.element.setStyle('z-index', this.options.zIndex).setStyle('display', 'block');
    if (this.options.position !== false) this.element.position(this.options.position);
    return this.fireEvent('show');
  },
  
  hide: function(){
    this.shown = false;
    if (this.options.mask !== false) this.unmask();
    this.element.setStyle('display', 'none');
    if (this.options.injectTo) this.element.dispose();
    return this.fireEvent('hide');
  },
  
  toggle: function(){
    return this[this.shown ? 'hide' : 'show']();
  },

  destroy: function(){
    this.hide();
    this.element.destroy();
  }

});