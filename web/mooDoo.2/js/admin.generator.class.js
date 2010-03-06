AdminGenerator = new Class({
 
  Implements: [Options, Events],

  options: {

  },

  initialize: function(element, atts){
    this.setOptions(atts);
    this.element = element;

    this.elems = {};

    this.retrieveElements();

    this.configuration();
    

    if (this.elems.adminBar) this.adminBar()
    if (this.elems.adminForm) this.adminForm()
  },

  configuration: function () {
    this.properties = {};
  },

  retrieveElements: function () {
    this.elems = {
      header: this.element.getElement('#sf_admin_header') ? this.element.getElement('#sf_admin_header') : false,
      adminForm: this.element.getElement('.sf_admin_form') ? this.element.getElement('.sf_admin_form') : false,
      adminBar: this.element.getElement('#sf_admin_bar') ? this.element.getElement('#sf_admin_bar') : false
    }
  },


  adminBar: function () {
    this.setFilter();

    // Menu
    this.elems.adminBar.addEvent('mousedown:relay(nav a)', function (ev) {
      ev.stop();
      var method = ev.target.get('class').substring(4, ev.target.get('class').length);
      this[method]();
    }.bind(this));
  },

  filter: function () {
    this.elems.adminBar.retrieve('filter').inject(this.elems.adminBar);
  },

  setFilter: function () {
    // Filter
    this.elems.adminBar.store('filter', this.elems.adminBar.getElement('.sf_admin_filter').setStyle('display', 'block').dispose());
    /*this.elems.adminBar.retrieve('filter').getElement('a.filter_cancel').addEvent('mousedown', function (e) {
      e.stop();
      this.elems.adminBar.retrieve('filter').dispose();
    }.bind(this))
    */
  },


  adminForm: function () {
    // widgets ?
    //
    // Dependents Observer Selects
    this.element.getElements('.dependent_observer_select').each(function (observer_select) {
      new sfWidgetFromMooDependerObserverSelect(observer_select);
    })
  }
});





/*** List ***/
AdminGenerator.List = new Class({

  Extends: AdminGenerator,

  Implements: [Options, Events],

  options: {

  },

  initialize: function(element, atts){
    this.parent(element, atts);

  },

  configuration: function () {
    this.parent();
    this.properties.type = 'List';

    // list object actions
    this.objectActions()
  },

  retrieveElements: function () {
    this.parent();

    // List elements
    this.elems.list = {};
    this.elems.list.container = this.element.getElement('div.sf_admin_list');
    this.elems.list.placeholder = this.element.getElement('div.sf_admin_list div.placelholder');

  },

  objectActions: function () {
    
    this.elems.list.obj_actions = this.elems.list.container.getElements('ul.object_actions');

    this.elems.list.obj_actions.each(function (object_action) {
      var container = object_action.getParent();
      container.store = object_action;

      object_action.dispose().setStyle('display', 'block');

      object_action.addEvents({
        mouseleave: function (ev) {
          this.dispose();
        }
      });

      container.getParent().addEvents({
        mousedown: function (ev) {
          ev.stop();
          object_action.inject(container);
        },
        mouseleave: function (ev) {
          ev.stop();
          object_action.dispose();
        }
      })

    }, this);
  }
});
/*** end List ***/






/*** Edit ***/
AdminGenerator.Edit = new Class({

  Extends:    AdminGenerator,

  Implements: [Options, Events],

  options: {

  },

  initialize: function(element, atts){
    this.parent(element, atts);

    console.debug('Edit');
  }
});





/*** New ***/
AdminGenerator.New  = new Class({

  Extends:    AdminGenerator,

  Implements: [Options, Events],

  options: {

  },

  initialize: function(element, atts){
    this.parent(element, atts);
    console.debug('New');
  }
});