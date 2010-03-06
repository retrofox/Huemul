window.addEvent('domready', function (ev) {
  // new admin Object
  var master_node = $('sf_admin_container'),
      type = master_node.get('class').substring(6, master_node.get('class').length).capitalize(),
      adminGenerator = new AdminGenerator[type] (master_node);
})