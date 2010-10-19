window.addEvent('domready', function () {
  var pick = $('btn-overlay'), overContent = $('msg');

  console.debug ("pick -> ", pick);
  console.debug ("overContent -> ", overContent);
  var overlay = new OverlayElement(overContent, {
    injectTo: [$$('body')[0], 'bottom']
  });

  pick.addEvents({
    click: function (ev) {
      ev.preventDefault();
      overlay.show();
    }
  })
})