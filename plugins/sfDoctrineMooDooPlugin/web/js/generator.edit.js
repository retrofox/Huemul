window.addEvent('domready', function () {
  // add datapicker to input type date
  var inputsDate = $$('input.input_date');

  inputsDate.each(function (inputDate) {
    inputDate.addCalendar();
  })


  var inputsDateTime = $$('input.input_date-time');
  inputsDateTime.each(function (inputDate) {
    inputDate.addCalendar();

    // contruimos la hora
    console.debug ("inputDate.getNext() -> ", inputDate.getNext());

    inputDate.getNext().addEvents({
      blur: function (ev) {
        var dates = inputDate.get('value').split(' ');
        inputDate.set('value', dates[0] + ' ' + this.get('value'));
      }
    })

    new InputMask.Time(inputDate.getNext(), {
      onError: function(element){
        element.highlight('#f88');
      }
    });
  })


})