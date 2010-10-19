/*
---
script: Calendar.js

description: Simple Caldendar Class

license: MIT-style license

author:
- Damian Suarez

requires:
- core:1.2.4/Element.Event
- core:1.2.4/Selectors
- /MooTools.More
...
*/

(function(){
  
  var now = new Date();

  /*
 * Caldendar Class.
 */
  Calendar = new Class({
  
    Implements: [Options, Events],
  
    options: {
      cssClassName: 'calendar',
      injectTo: '#calendar',
      formatTitle: '%B %d, %Y',
      nav: {
        textBack: 'Back',
        textNext: 'Next'
      },
      allowFutureMonths: false,
      dateRange: [null, Date.now()]
    },

    initialize: function(options){
      this.setOptions(options);
      this.init();
      this.insertCalendar();
      this.setEvents();
    },

    init: function(){
      this.elems = {};
      this.objDate = new Date();
      this.today = this.activeDay = this.previousDay = this.objDate.format('%Y%m%d').toString();      // <- date YYYYMMDD
    },

    insertCalendar: function() {
      this.el = new Element('div', {
        'class': this.options.cssClassName
        });
      this.render();
      if(this.options.injectTo) {
        this.el.inject(this.options.injectTo);
      }
      return this.el;
    },

    // receives a date object, calls getMonth ?? sorry, I chose another way.

    render: function(){
      var firstDay = getNumberOfFirstDayOfMonth(this.objDate),
      firstDayPM = getLastDayOfPreviousMonth(this.objDate),
      lastDay = this.objDate.get('LastDayOfMonth'),
      htmlString, dayToday;

      // calendar Header
      htmlString = '<section class="header"><nav>' +
      //'<a href="#" class="calendar-control_previous">Back</a>' +
      //'<a href="#" class="calendar-control_next">Next</a>' +
      '<a href="#" class="previous">' + this.options.nav.textBack + '</a>' +
      '<a href="#" class="next">' + this.options.nav.textNext + '</a>' +
      '</nav>'+"\n";

      htmlString += '<p class="title">' + this.objDate.format(this.options.formatTitle) + '</p></section>'+"\n";

      // Calendar Table

      // Header
      htmlString += '<section class="content"><table class="table-' + this.options.cssClassName + '">'+"\n";
      htmlString += '<thead>';

      htmlString += '<tr>' +
      '<th scope="col">Sun</th>' +
      '<th scope="col">Mon</th>' +
      '<th scope="col">Tue</th>' +
      '<th scope="col">Wed</th>' +
      '<th scope="col">Thu</th>' +
      '<th scope="col">Fri</th>' +
      '<th scope="col">Sat</th>' +
      '</tr>';
      htmlString += '</thead>'+"\n";

      // Foot
      /*htmlString += '<tfoot><tr>' +
                    '<th colspan="7"><a class="gotoday" href="#">Today</a></th>' +
                  '</tr></tfoot>'+"\n";
    */
      // Body
      htmlString += '<tbody>';
      for (var j = 0; j < getNumbersOfWeekForMonth(this.objDate); j++){
        htmlString += '<tr>';
        var day, tdClass, tdClassToday, tdClassActive;
        for (var i = 0; i <= 6; i++){
          day = ((i + j*7) - firstDay);

          tdClassToday = (this.objDate.get('year')*10000+(this.objDate.get('month') + 1)*100 + day == this.today) ? ' today' : '';

          tdClassActive = (this.objDate.get('year')*10000+(this.objDate.get('month') + 1)*100 + day == this.activeDay) ? ' active' : '';

          tdClass = ' class="' + ((day > 0 && day <= lastDay) ? '' : 'notInMonth') + tdClassToday + tdClassActive + '"';

          if (day <= 0) {
            day = firstDayPM + day;
          }
          else if (day > lastDay) {
            day = day - lastDay;
          }

          htmlString += '<td' + tdClass + '><div>' + day + '</div></td>';
        }
        htmlString += '</tr>'+"\n";
      }

      htmlString += '</tbody>'+"\n";
      htmlString += '</table></section>'+"\n";

      htmlString += '<section class="footer">' +
      '<nav>' +
      '<a href="#" class="gotoday">Today</a>' +
      '<a href="#" class="close">Cancel</a>' +
      '</nav>' +
      '</section>'+"\n";


      this.el.set('html', htmlString);

      // elements
      this.elems.title = this.el.getElement ('p.title');
      // fireEvent
      this.fireEvent('renderReady');
    },

    refresh: function () {
      var el;
      if (el = this.toElement(this.activeDay)) el.addClass ('active');
      if (el = this.toElement(this.previousDay)) el.removeClass ('active');
      this.elems.title.set('text', this.objDate.format(this.options.formatTitle));
    },

    setEvents: function(){
      // Add events to calendar anchor elements.
      this.el.addEvent('click:relay(a)', function (ev) {
        ev.stop();
        var method = ev.target.get('class');
        this[method](ev);
      }.bind(this));

      // Add events to calendar cell elements. We abuse the events delegation.
      this.el.addEvent('click:relay(td[class!=notInMonth])', function (ev) {
        this.setActiveDay(ev.target.get('text'))
      }.bind(this));
    },


    // Navegation Methods
    next: function(){
      //if (!this.options.allowFutureMonths') && (this.objDate.get('month') + 1 > now.get('month'))) return this;
      if (this.options.allowFutureMonths) return this;
      this.objDate.increment('month');
      //if (!this.objDate.get('month')) this.objDate.increment('year');
      this.render();
      return this.fireEvent('changeMonth');
    },
  
    previous: function(){
      this.objDate.decrement('month');
      this.render();
      return this.fireEvent('changeMonth');
    },

    gotoday: function(ev) {
      var changeDay = true;
      if (this.today == this.activeDay) changeDay = false;
      this.objDate.parse(this.today);
      this.render();
      return this.fireEvent('selectedDay', [ev.target, this.objDate, changeDay]);
    },

    setActiveDay: function(day) {
      var changeDay = true;
      if (this.activeDay.substr(6, 8).toInt() == day) changeDay = false;
      this.objDate.set('date', day);
      this.previousDay = this.activeDay;
      this.activeDay = this.objDate.format('%Y%m%d').toString();

      this.refresh();
      this.fireEvent('selectedDay', [this.toElement(this.activeDay), this.objDate, changeDay]);
    },

    close: function () {
      this.fireEvent('closed');
    //this.el.dispose();
    },

    open: function () {
      this.el.inject(this.options.injectTo);
    },

    // SCHEDULE
    createMiniSchedule: function(name, options) {
      this[name] = new Calendar.MiniSchedule(name, this, options);
      return this;
    },

    // return element node of the date
    toElement: function (date) {
      var elNumber;
      date = date.toString();
      if ($type(date) == 'string') {
        if (date.length > 2) {
          if (this.objDate.get('year') != date.substr(0, 4) || (this.objDate.get('month')+1) != date.substr(4, 2)) return null;
          elNumber = getNumberOfFirstDayOfMonth(this.objDate) + date.substr(6, 2).toInt()
        } else {
          elNumber = getNumberOfFirstDayOfMonth(this.objDate) + date.toInt();
        }
        return this.el.getElements('td')[elNumber];
      }
      return date;
    }
  });



  /*
 * MiniSchedule caldendar Class.
 */

  Calendar.MiniSchedule = new Class({
  
    Implements: [Options, Events],

    options: {
      cssClassName: 'mini-schedule',
      title: 'Schedule',
      listStructure: 'table|tr|td',
      addClassInCalendar: false,
      settingDays: []
    },

    initialize: function(name, objCalendar, options){
      this.setOptions(options);
      this.init(name, objCalendar.objDate, objCalendar);

      this.renderMarkup();
    },

    init: function (name, date, objCalendar) {
      this.elems = {};
      this.name = name;
      this.date = date;
    
      this.objCalendar = objCalendar;
      this.elems.injectTo = $(this.options.injectTo);

      // Add Day to Calendar ?
      if (this.options.settingDays) {
        this.settingDays();
        this.objCalendar.addEvent('changeMonth', this.settingDays.bind(this));
      }
    },

    renderMarkup: function(){
      var htmlString;
      htmlString = '<h3>' + this.options.title + '</h3>';
      htmlString+= '<table><tbody class="schedule-insert">';

      htmlString+= '</tbody></table>';

      this.el = new Element ('section', {
        'class': this.options.cssClassName,
        'html': htmlString
      }).inject (this.options.injectTo);

      this.elems.dataInsert = this.el.getElement('.schedule-insert');
    },

    settingDays: function () {
      this.options.settingDays.each(function (day) {
        var elDay;
        if ((elDay = this.objCalendar.toElement(day))!=null) {
          this.objCalendar.toElement(day).addClass (this.name).set('title', 'Day ' + day + ' ' + this.name).addEvents ({
            'click': this.changeDay.bind(this, day)
          });
        }
      }, this);
    },

    changeDay: function (day) {
      this.fireEvent('changeDay', day);
    },

    insertData: function (jsonData) {
      for (var i=0, line = jsonData[i], htmlString = ''; i < jsonData.length; i++, line = jsonData[i]) {
        htmlString+= '<tr>'
        for (var j in line) {
          htmlString+= '<td>' + line[j] + '</td>';
        }
        htmlString+='</tr>';
      }
      this.elems.dataInsert.set('html', htmlString);
    }

  });


  var

  getNumberOfFirstDayOfMonth = function(obj){
    return (obj.get('day') - obj.get('date') % 7) > 0 ? obj.get('day') - obj.get('date') % 7 : 7 + (obj.get('day') - obj.get('date') % 7);
  },

  getNumbersOfWeekForMonth = function(obj){
    return ((obj.get('LastDayOfMonth') + getNumberOfFirstDayOfMonth(obj)) / 7).toInt() + 1;
  },

  getLastDayOfPreviousMonth = function(obj){
    return obj.clone().get('LastDayOfMonth');
  };

})();