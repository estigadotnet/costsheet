(function(e){"use strict";if(typeof define==="function"&&define.amd){define(["jquery","moment"],e)}else if(typeof exports==="object"){module.exports=e(require("jquery"),require("moment"))}else{if(typeof jQuery==="undefined"){throw"bootstrap-datetimepicker requires jQuery to be loaded first"}if(typeof moment==="undefined"){throw"bootstrap-datetimepicker requires Moment.js to be loaded first"}e(jQuery,moment)}})(function(e,t){"use strict";if(!t){throw new Error("bootstrap-datetimepicker requires Moment.js to be loaded first")}var a=function(a,n){var i={},r,o,s=true,d,l=false,f=false,p,c=0,u,m,h,y=[{clsName:"days",navFnc:"M",navStep:1},{clsName:"months",navFnc:"y",navStep:1},{clsName:"years",navFnc:"y",navStep:10},{clsName:"decades",navFnc:"y",navStep:100}],w=["days","months","years","decades"],b=["top","bottom","auto"],g=["left","right","auto"],v=["default","top","bottom"],k={up:38,38:"up",down:40,40:"down",left:37,37:"left",right:39,39:"right",tab:9,9:"tab",escape:27,27:"escape",enter:13,13:"enter",pageUp:33,33:"pageUp",pageDown:34,34:"pageDown",shift:16,16:"shift",control:17,17:"control",space:32,32:"space",t:84,84:"t",delete:46,46:"delete"},D={},C=function(){return t.tz!==undefined&&n.timeZone!==undefined&&n.timeZone!==null&&n.timeZone!==""},x=function(e){var a;if(e===undefined||e===null){a=t()}else if(t.isDate(e)||t.isMoment(e)){a=t(e)}else if(C()){a=t.tz(e,m,n.useStrict,n.timeZone)}else{a=t(e,m,n.useStrict)}if(C()){a.tz(n.timeZone)}return a},T=function(e){if(typeof e!=="string"||e.length>1){throw new TypeError("isEnabled expects a single character string parameter")}switch(e){case"y":return u.indexOf("Y")!==-1;case"M":return u.indexOf("M")!==-1;case"d":return u.toLowerCase().indexOf("d")!==-1;case"h":case"H":return u.toLowerCase().indexOf("h")!==-1;case"m":return u.indexOf("m")!==-1;case"s":return u.indexOf("s")!==-1;default:return false}},M=function(){return T("h")||T("m")||T("s")},S=function(){return T("y")||T("M")||T("d")},O=function(){var t=e("<thead>").append(e("<tr>").append(e("<th>").addClass("prev").attr("data-action","previous").append(e("<span>").addClass(n.icons.previous))).append(e("<th>").addClass("picker-switch").attr("data-action","pickerSwitch").attr("colspan",n.calendarWeeks?"6":"5")).append(e("<th>").addClass("next").attr("data-action","next").append(e("<span>").addClass(n.icons.next)))),a=e("<tbody>").append(e("<tr>").append(e("<td>").attr("colspan",n.calendarWeeks?"8":"7")));return[e("<div>").addClass("datepicker-days").append(e("<table>").addClass("table-sm").append(t).append(e("<tbody>"))),e("<div>").addClass("datepicker-months").append(e("<table>").addClass("table-sm").append(t.clone()).append(a.clone())),e("<div>").addClass("datepicker-years").append(e("<table>").addClass("table-sm").append(t.clone()).append(a.clone())),e("<div>").addClass("datepicker-decades").append(e("<table>").addClass("table-sm").append(t.clone()).append(a.clone()))]},P=function(){var t=e("<tr>"),a=e("<tr>"),i=e("<tr>");if(T("h")){t.append(e("<td>").append(e("<a>").attr({href:"#",tabindex:"-1",title:n.tooltips.incrementHour}).addClass("btn").attr("data-action","incrementHours").append(e("<span>").addClass(n.icons.up))));a.append(e("<td>").append(e("<span>").addClass("timepicker-hour").attr({"data-time-component":"hours",title:n.tooltips.pickHour}).attr("data-action","showHours")));i.append(e("<td>").append(e("<a>").attr({href:"#",tabindex:"-1",title:n.tooltips.decrementHour}).addClass("btn").attr("data-action","decrementHours").append(e("<span>").addClass(n.icons.down))))}if(T("m")){if(T("h")){t.append(e("<td>").addClass("separator"));a.append(e("<td>").addClass("separator").html(":"));i.append(e("<td>").addClass("separator"))}t.append(e("<td>").append(e("<a>").attr({href:"#",tabindex:"-1",title:n.tooltips.incrementMinute}).addClass("btn").attr("data-action","incrementMinutes").append(e("<span>").addClass(n.icons.up))));a.append(e("<td>").append(e("<span>").addClass("timepicker-minute").attr({"data-time-component":"minutes",title:n.tooltips.pickMinute}).attr("data-action","showMinutes")));i.append(e("<td>").append(e("<a>").attr({href:"#",tabindex:"-1",title:n.tooltips.decrementMinute}).addClass("btn").attr("data-action","decrementMinutes").append(e("<span>").addClass(n.icons.down))))}if(T("s")){if(T("m")){t.append(e("<td>").addClass("separator"));a.append(e("<td>").addClass("separator").html(":"));i.append(e("<td>").addClass("separator"))}t.append(e("<td>").append(e("<a>").attr({href:"#",tabindex:"-1",title:n.tooltips.incrementSecond}).addClass("btn").attr("data-action","incrementSeconds").append(e("<span>").addClass(n.icons.up))));a.append(e("<td>").append(e("<span>").addClass("timepicker-second").attr({"data-time-component":"seconds",title:n.tooltips.pickSecond}).attr("data-action","showSeconds")));i.append(e("<td>").append(e("<a>").attr({href:"#",tabindex:"-1",title:n.tooltips.decrementSecond}).addClass("btn").attr("data-action","decrementSeconds").append(e("<span>").addClass(n.icons.down))))}if(!p){t.append(e("<td>").addClass("separator"));a.append(e("<td>").append(e("<button>").addClass("btn btn-primary").attr({"data-action":"togglePeriod",tabindex:"-1",title:n.tooltips.togglePeriod})));i.append(e("<td>").addClass("separator"))}return e("<div>").addClass("timepicker-picker").append(e("<table>").addClass("table-sm").append([t,a,i]))},E=function(){var t=e("<div>").addClass("timepicker-hours").append(e("<table>").addClass("table-sm")),a=e("<div>").addClass("timepicker-minutes").append(e("<table>").addClass("table-sm")),n=e("<div>").addClass("timepicker-seconds").append(e("<table>").addClass("table-sm")),i=[P()];if(T("h")){i.push(t)}if(T("m")){i.push(a)}if(T("s")){i.push(n)}return i},H=function(){var t=[];if(n.showTodayButton){t.push(e("<td>").append(e("<a>").attr({"data-action":"today",title:n.tooltips.today}).append(e("<span>").addClass(n.icons.today))))}if(!n.sideBySide&&S()&&M()){t.push(e("<td>").append(e("<a>").attr({"data-action":"togglePicker",title:n.tooltips.selectTime}).append(e("<span>").addClass(n.icons.time))))}if(n.showClear){t.push(e("<td>").append(e("<a>").attr({"data-action":"clear",title:n.tooltips.clear}).append(e("<span>").addClass(n.icons.clear))))}if(n.showClose){t.push(e("<td>").append(e("<a>").attr({"data-action":"close",title:n.tooltips.close}).append(e("<span>").addClass(n.icons.close))))}return e("<table>").addClass("table-sm").append(e("<tbody>").append(e("<tr>").append(t)))},I=function(){var t=e("<div>").addClass("bootstrap-datetimepicker-widget dropdown-menu"),a=e("<div>").addClass("datepicker").append(O()),i=e("<div>").addClass("timepicker").append(E()),r=e("<ul>").addClass("list-unstyled"),o=e("<li>").addClass("picker-switch"+(n.collapse?" accordion-toggle":"")).append(H());if(n.inline){t.removeClass("dropdown-menu")}if(p){t.addClass("usetwentyfour")}if(T("s")&&!p){t.addClass("wider")}if(n.sideBySide&&S()&&M()){t.addClass("timepicker-sbs");if(n.toolbarPlacement==="top"){t.append(o)}t.append(e("<div>").addClass("row").append(a.addClass("col-md-6")).append(i.addClass("col-md-6")));if(n.toolbarPlacement==="bottom"){t.append(o)}return t}if(n.toolbarPlacement==="top"){r.append(o)}if(S()){r.append(e("<li>").addClass(n.collapse&&M()?"collapse show":"").append(a))}if(n.toolbarPlacement==="default"){r.append(o)}if(M()){r.append(e("<li>").addClass(n.collapse&&S()?"collapse":"").append(i))}if(n.toolbarPlacement==="bottom"){r.append(o)}return t.append(r)},Y=function(){var t,i={};if(a.is("input")||n.inline){t=a.data()}else{t=a.find("input").data()}if(t.dateOptions&&t.dateOptions instanceof Object){i=e.extend(true,i,t.dateOptions)}e.each(n,function(e){var a="date"+e.charAt(0).toUpperCase()+e.slice(1);if(t[a]!==undefined){i[e]=t[a]}});return i},q=function(){var t=(l||a).position(),i=(l||a).offset(),r=n.widgetPositioning.vertical,o=n.widgetPositioning.horizontal,s;if(n.widgetParent){s=n.widgetParent.append(f)}else if(a.is("input")){s=a.after(f).parent()}else if(n.inline){s=a.append(f);return}else{s=a;a.children().first().after(f)}if(r==="auto"){if(i.top+f.height()*1.5>=e(window).height()+e(window).scrollTop()&&f.height()+a.outerHeight()<i.top){r="top"}else{r="bottom"}}if(o==="auto"){if(s.width()<i.left+f.outerWidth()/2&&i.left+f.outerWidth()>e(window).width()){o="right"}else{o="left"}}if(r==="top"){f.addClass("top").removeClass("bottom")}else{f.addClass("bottom").removeClass("top")}if(o==="right"){f.addClass("float-right")}else{f.removeClass("float-right")}if(s.css("position")==="static"){s=s.parents().filter(function(){return e(this).css("position")!=="static"}).first()}if(s.length===0){throw new Error("datetimepicker component should be placed within a non-static positioned container")}f.css({top:r==="top"?"auto":t.top+a.outerHeight(),bottom:r==="top"?s.outerHeight()-(s===a?0:t.top):"auto",left:o==="left"?s===a?0:t.left:"auto",right:o==="left"?"auto":s.outerWidth()-a.outerWidth()-(s===a?0:t.left)})},B=function(e){if(e.type==="dp.change"&&(e.date&&e.date.isSame(e.oldDate)||!e.date&&!e.oldDate)){return}a.trigger(e)},j=function(e){if(e==="y"){e="YYYY"}B({type:"dp.update",change:e,viewDate:o.clone()})},A=function(e){if(!f){return}if(e){h=Math.max(c,Math.min(3,h+e))}f.find(".datepicker > div").hide().filter(".datepicker-"+y[h].clsName).show()},F=function(){var t=e("<tr>"),a=o.clone().startOf("w").startOf("d");if(n.calendarWeeks===true){t.append(e("<th>").addClass("cw").text("#"))}while(a.isBefore(o.clone().endOf("w"))){t.append(e("<th>").addClass("dow").text(a.format("dd")));a.add(1,"d")}f.find(".datepicker-days thead").append(t)},L=function(e){return n.disabledDates[e.format("YYYY-MM-DD")]===true},W=function(e){return n.enabledDates[e.format("YYYY-MM-DD")]===true},z=function(e){return n.disabledHours[e.format("H")]===true},N=function(e){return n.enabledHours[e.format("H")]===true},V=function(t,a){if(!t.isValid()){return false}if(n.disabledDates&&a==="d"&&L(t)){return false}if(n.enabledDates&&a==="d"&&!W(t)){return false}if(n.minDate&&t.isBefore(n.minDate,a)){return false}if(n.maxDate&&t.isAfter(n.maxDate,a)){return false}if(n.daysOfWeekDisabled&&a==="d"&&n.daysOfWeekDisabled.indexOf(t.day())!==-1){return false}if(n.disabledHours&&(a==="h"||a==="m"||a==="s")&&z(t)){return false}if(n.enabledHours&&(a==="h"||a==="m"||a==="s")&&!N(t)){return false}if(n.disabledTimeIntervals&&(a==="h"||a==="m"||a==="s")){var i=false;e.each(n.disabledTimeIntervals,function(){if(t.isBetween(this[0],this[1])){i=true;return false}});if(i){return false}}return true},Z=function(){var t=[],a=o.clone().startOf("y").startOf("d");while(a.isSame(o,"y")){t.push(e("<span>").attr("data-action","selectMonth").addClass("month").text(a.format("MMM")));a.add(1,"M")}f.find(".datepicker-months td").empty().append(t)},R=function(){var t=f.find(".datepicker-months"),a=t.find("th"),i=t.find("tbody").find("span");a.eq(0).find("span").attr("title",n.tooltips.prevYear);a.eq(1).attr("title",n.tooltips.selectYear);a.eq(2).find("span").attr("title",n.tooltips.nextYear);t.find(".disabled").removeClass("disabled");if(!V(o.clone().subtract(1,"y"),"y")){a.eq(0).addClass("disabled")}a.eq(1).text(o.year());if(!V(o.clone().add(1,"y"),"y")){a.eq(2).addClass("disabled")}i.removeClass("active");if(r.isSame(o,"y")&&!s){i.eq(r.month()).addClass("active")}i.each(function(t){if(!V(o.clone().month(t),"M")){e(this).addClass("disabled")}})},Q=function(){var e=f.find(".datepicker-years"),t=e.find("th"),a=o.clone().subtract(5,"y"),i=o.clone().add(6,"y"),d="";t.eq(0).find("span").attr("title",n.tooltips.prevDecade);t.eq(1).attr("title",n.tooltips.selectDecade);t.eq(2).find("span").attr("title",n.tooltips.nextDecade);e.find(".disabled").removeClass("disabled");if(n.minDate&&n.minDate.isAfter(a,"y")){t.eq(0).addClass("disabled")}t.eq(1).text(a.year()+"-"+i.year());if(n.maxDate&&n.maxDate.isBefore(i,"y")){t.eq(2).addClass("disabled")}while(!a.isAfter(i,"y")){d+='<span data-action="selectYear" class="year'+(a.isSame(r,"y")&&!s?" active":"")+(!V(a,"y")?" disabled":"")+'">'+a.year()+"</span>";a.add(1,"y")}e.find("td").html(d)},U=function(){var e=f.find(".datepicker-decades"),a=e.find("th"),i=t({y:o.year()-o.year()%100-1}),s=i.clone().add(100,"y"),d=i.clone(),l=false,p=false,c,u="";a.eq(0).find("span").attr("title",n.tooltips.prevCentury);a.eq(2).find("span").attr("title",n.tooltips.nextCentury);e.find(".disabled").removeClass("disabled");if(i.isSame(t({y:1900}))||n.minDate&&n.minDate.isAfter(i,"y")){a.eq(0).addClass("disabled")}a.eq(1).text(i.year()+"-"+s.year());if(i.isSame(t({y:2e3}))||n.maxDate&&n.maxDate.isBefore(s,"y")){a.eq(2).addClass("disabled")}while(!i.isAfter(s,"y")){c=i.year()+12;l=n.minDate&&n.minDate.isAfter(i,"y")&&n.minDate.year()<=c;p=n.maxDate&&n.maxDate.isAfter(i,"y")&&n.maxDate.year()<=c;u+='<span data-action="selectDecade" class="decade'+(r.isAfter(i)&&r.year()<=c?" active":"")+(!V(i,"y")&&!l&&!p?" disabled":"")+'" data-selection="'+(i.year()+6)+'">'+(i.year()+1)+" - "+(i.year()+12)+"</span>";i.add(12,"y")}u+="<span></span><span></span><span></span>";e.find("td").html(u);a.eq(1).text(d.year()+1+"-"+i.year())},G=function(){var t=f.find(".datepicker-days"),a=t.find("th"),i,d=[],l,p=[],c;if(!S()){return}a.eq(0).find("span").attr("title",n.tooltips.prevMonth);a.eq(1).attr("title",n.tooltips.selectMonth);a.eq(2).find("span").attr("title",n.tooltips.nextMonth);t.find(".disabled").removeClass("disabled");a.eq(1).text(o.format(n.dayViewHeaderFormat));if(!V(o.clone().subtract(1,"M"),"M")){a.eq(0).addClass("disabled")}if(!V(o.clone().add(1,"M"),"M")){a.eq(2).addClass("disabled")}i=o.clone().startOf("M").startOf("w").startOf("d");for(c=0;c<42;c++){if(i.weekday()===0){l=e("<tr>");if(n.calendarWeeks){l.append('<td class="cw">'+i.week()+"</td>")}d.push(l)}p=["day"];if(i.isBefore(o,"M")){p.push("old")}if(i.isAfter(o,"M")){p.push("new")}if(i.isSame(r,"d")&&!s){p.push("active")}if(!V(i,"d")){p.push("disabled")}if(i.isSame(x(),"d")){p.push("today")}if(i.day()===0||i.day()===6){p.push("weekend")}B({type:"dp.classify",date:i,classNames:p});l.append('<td data-action="selectDay" data-day="'+i.format("L")+'" class="'+p.join(" ")+'">'+i.date()+"</td>");i.add(1,"d")}t.find("tbody").empty().append(d);R();Q();U()},J=function(){var t=f.find(".timepicker-hours table"),a=o.clone().startOf("d"),n=[],i=e("<tr>");if(o.hour()>11&&!p){a.hour(12)}while(a.isSame(o,"d")&&(p||o.hour()<12&&a.hour()<12||o.hour()>11)){if(a.hour()%4===0){i=e("<tr>");n.push(i)}i.append('<td data-action="selectHour" class="hour'+(!V(a,"h")?" disabled":"")+'">'+a.format(p?"HH":"hh")+"</td>");a.add(1,"h")}t.empty().append(n)},K=function(){var t=f.find(".timepicker-minutes table"),a=o.clone().startOf("h"),i=[],r=e("<tr>"),s=n.stepping===1?5:n.stepping;while(o.isSame(a,"h")){if(a.minute()%(s*4)===0){r=e("<tr>");i.push(r)}r.append('<td data-action="selectMinute" class="minute'+(!V(a,"m")?" disabled":"")+'">'+a.format("mm")+"</td>");a.add(s,"m")}t.empty().append(i)},X=function(){var t=f.find(".timepicker-seconds table"),a=o.clone().startOf("m"),n=[],i=e("<tr>");while(o.isSame(a,"m")){if(a.second()%20===0){i=e("<tr>");n.push(i)}i.append('<td data-action="selectSecond" class="second'+(!V(a,"s")?" disabled":"")+'">'+a.format("ss")+"</td>");a.add(5,"s")}t.empty().append(n)},$=function(){var e,t,a=f.find(".timepicker span[data-time-component]");if(!p){e=f.find(".timepicker [data-action=togglePeriod]");t=r.clone().add(r.hours()>=12?-12:12,"h");e.text(r.format("A"));if(V(t,"h")){e.removeClass("disabled")}else{e.addClass("disabled")}}a.filter("[data-time-component=hours]").text(r.format(p?"HH":"hh"));a.filter("[data-time-component=minutes]").text(r.format("mm"));a.filter("[data-time-component=seconds]").text(r.format("ss"));J();K();X()},_=function(){if(!f){return}G();$()},ee=function(e){var t=s?null:r;if(!e){s=true;d.val("");a.data("date","");B({type:"dp.change",date:false,oldDate:t});_();return}e=e.clone().locale(n.locale);if(C()){e.tz(n.timeZone)}if(n.stepping!==1){e.minutes(Math.round(e.minutes()/n.stepping)*n.stepping).seconds(0);while(n.minDate&&e.isBefore(n.minDate)){e.add(n.stepping,"minutes")}}if(V(e)){r=e;o=r.clone();d.val(r.format(u));a.data("date",r.format(u));s=false;_();B({type:"dp.change",date:r.clone(),oldDate:t})}else{if(!n.keepInvalid){d.val(s?"":r.format(u))}else{B({type:"dp.change",date:e,oldDate:t})}B({type:"dp.error",date:e,oldDate:t})}},te=function(){var t=false;if(!f){return i}f.find(".collapse").each(function(){var a=e(this).data("collapse");if(a&&a.transitioning){t=true;return false}return true});if(t){return i}if(l&&l.hasClass("btn")){l.toggleClass("active")}f.hide();e(window).off("resize",q);f.off("click","[data-action]");f.off("mousedown",false);f.remove();f=false;B({type:"dp.hide",date:r.clone()});d.blur();o=r.clone();return i},ae=function(){ee(null)},ne=function(e){if(n.parseInputDate===undefined){if(!t.isMoment(e)||e instanceof Date){e=x(e)}}else{e=n.parseInputDate(e)}return e},ie={next:function(){var e=y[h].navFnc;o.add(y[h].navStep,e);G();j(e)},previous:function(){var e=y[h].navFnc;o.subtract(y[h].navStep,e);G();j(e)},pickerSwitch:function(){A(1)},selectMonth:function(t){var a=e(t.target).closest("tbody").find("span").index(e(t.target));o.month(a);if(h===c){ee(r.clone().year(o.year()).month(o.month()));if(!n.inline){te()}}else{A(-1);G()}j("M")},selectYear:function(t){var a=parseInt(e(t.target).text(),10)||0;o.year(a);if(h===c){ee(r.clone().year(o.year()));if(!n.inline){te()}}else{A(-1);G()}j("YYYY")},selectDecade:function(t){var a=parseInt(e(t.target).data("selection"),10)||0;o.year(a);if(h===c){ee(r.clone().year(o.year()));if(!n.inline){te()}}else{A(-1);G()}j("YYYY")},selectDay:function(t){var a=o.clone();if(e(t.target).is(".old")){a.subtract(1,"M")}if(e(t.target).is(".new")){a.add(1,"M")}ee(a.date(parseInt(e(t.target).text(),10)));if(!M()&&!n.keepOpen&&!n.inline){te()}},incrementHours:function(){var e=r.clone().add(1,"h");if(V(e,"h")){ee(e)}},incrementMinutes:function(){var e=r.clone().add(n.stepping,"m");if(V(e,"m")){ee(e)}},incrementSeconds:function(){var e=r.clone().add(1,"s");if(V(e,"s")){ee(e)}},decrementHours:function(){var e=r.clone().subtract(1,"h");if(V(e,"h")){ee(e)}},decrementMinutes:function(){var e=r.clone().subtract(n.stepping,"m");if(V(e,"m")){ee(e)}},decrementSeconds:function(){var e=r.clone().subtract(1,"s");if(V(e,"s")){ee(e)}},togglePeriod:function(){ee(r.clone().add(r.hours()>=12?-12:12,"h"))},togglePicker:function(t){var a=e(t.target),i=a.closest("ul"),r=i.find(".show"),o=i.find(".collapse:not(.show)"),s;if(r&&r.length){s=r.data("collapse");if(s&&s.transitioning){return}if(r.collapse){r.collapse("hide");o.collapse("show")}else{r.removeClass("show");o.addClass("show")}if(a.is("span")){a.toggleClass(n.icons.time+" "+n.icons.date)}else{a.find("span").toggleClass(n.icons.time+" "+n.icons.date)}}},showPicker:function(){f.find(".timepicker > div:not(.timepicker-picker)").hide();f.find(".timepicker .timepicker-picker").show()},showHours:function(){f.find(".timepicker .timepicker-picker").hide();f.find(".timepicker .timepicker-hours").show()},showMinutes:function(){f.find(".timepicker .timepicker-picker").hide();f.find(".timepicker .timepicker-minutes").show()},showSeconds:function(){f.find(".timepicker .timepicker-picker").hide();f.find(".timepicker .timepicker-seconds").show()},selectHour:function(t){var a=parseInt(e(t.target).text(),10);if(!p){if(r.hours()>=12){if(a!==12){a+=12}}else{if(a===12){a=0}}}ee(r.clone().hours(a));ie.showPicker.call(i)},selectMinute:function(t){ee(r.clone().minutes(parseInt(e(t.target).text(),10)));ie.showPicker.call(i)},selectSecond:function(t){ee(r.clone().seconds(parseInt(e(t.target).text(),10)));ie.showPicker.call(i)},clear:ae,today:function(){var e=x();if(V(e,"d")){ee(e)}},close:te},re=function(t){if(e(t.currentTarget).is(".disabled")){return false}ie[e(t.currentTarget).data("action")].apply(i,arguments);return false},oe=function(){var t,a={year:function(e){return e.month(0).date(1).hours(0).seconds(0).minutes(0)},month:function(e){return e.date(1).hours(0).seconds(0).minutes(0)},day:function(e){return e.hours(0).seconds(0).minutes(0)},hour:function(e){return e.seconds(0).minutes(0)},minute:function(e){return e.seconds(0)}};if(d.prop("disabled")||!n.ignoreReadonly&&d.prop("readonly")||f){return i}if(d.val()!==undefined&&d.val().trim().length!==0){ee(ne(d.val().trim()))}else if(s&&n.useCurrent&&(n.inline||d.is("input")&&d.val().trim().length===0)){t=x();if(typeof n.useCurrent==="string"){t=a[n.useCurrent](t)}ee(t)}f=I();F();Z();f.find(".timepicker-hours").hide();f.find(".timepicker-minutes").hide();f.find(".timepicker-seconds").hide();_();A();e(window).on("resize",q);f.on("click","[data-action]",re);f.on("mousedown",false);if(l&&l.hasClass("btn")){l.toggleClass("active")}q();f.show();if(n.focusOnShow&&!d.is(":focus")){d.focus()}B({type:"dp.show"});return i},se=function(){return f?te():oe()},de=function(e){var t=null,a,r,o=[],s={},d=e.which,l,p,c="p";D[d]=c;for(a in D){if(D.hasOwnProperty(a)&&D[a]===c){o.push(a);if(parseInt(a,10)!==d){s[a]=true}}}for(a in n.keyBinds){if(n.keyBinds.hasOwnProperty(a)&&typeof n.keyBinds[a]==="function"){l=a.split(" ");if(l.length===o.length&&k[d]===l[l.length-1]){p=true;for(r=l.length-2;r>=0;r--){if(!(k[l[r]]in s)){p=false;break}}if(p){t=n.keyBinds[a];break}}}}if(t){t.call(i,f);e.stopPropagation();e.preventDefault()}},le=function(e){D[e.which]="r";e.stopPropagation();e.preventDefault()},fe=function(t){var a=e(t.target).val().trim(),n=a?ne(a):null;ee(n);t.stopImmediatePropagation();return false},pe=function(){d.on({change:fe,blur:n.debug?"":te,keydown:de,keyup:le,focus:n.allowInputToggle?oe:""});if(a.is("input")){d.on({focus:oe})}else if(l){l.on("click",se);l.on("mousedown",false)}},ce=function(){d.off({change:fe,blur:blur,keydown:de,keyup:le,focus:n.allowInputToggle?te:""});if(a.is("input")){d.off({focus:oe})}else if(l){l.off("click",se);l.off("mousedown",false)}},ue=function(t){var a={};e.each(t,function(){var e=ne(this);if(e.isValid()){a[e.format("YYYY-MM-DD")]=true}});return Object.keys(a).length?a:false},me=function(t){var a={};e.each(t,function(){a[this]=true});return Object.keys(a).length?a:false},he=function(){var e=n.format||"L LT";u=e.replace(/(\[[^\[]*\])|(\\)?(LTS|LT|LL?L?L?|l{1,4})/g,function(e){var t=r.localeData().longDateFormat(e)||e;return t.replace(/(\[[^\[]*\])|(\\)?(LTS|LT|LL?L?L?|l{1,4})/g,function(e){return r.localeData().longDateFormat(e)||e})});m=n.extraFormats?n.extraFormats.slice():[];if(m.indexOf(e)<0&&m.indexOf(u)<0){m.push(u)}p=u.toLowerCase().indexOf("a")<1&&u.replace(/\[.*?\]/g,"").indexOf("h")<1;if(T("y")){c=2}if(T("M")){c=1}if(T("d")){c=0}h=Math.max(c,h);if(!s){ee(r)}};i.destroy=function(){te();ce();a.removeData("DateTimePicker");a.removeData("date")};i.toggle=se;i.show=oe;i.hide=te;i.disable=function(){te();if(l&&l.hasClass("btn")){l.addClass("disabled")}d.prop("disabled",true);return i};i.enable=function(){if(l&&l.hasClass("btn")){l.removeClass("disabled")}d.prop("disabled",false);return i};i.ignoreReadonly=function(e){if(arguments.length===0){return n.ignoreReadonly}if(typeof e!=="boolean"){throw new TypeError("ignoreReadonly () expects a boolean parameter")}n.ignoreReadonly=e;return i};i.options=function(t){if(arguments.length===0){return e.extend(true,{},n)}if(!(t instanceof Object)){throw new TypeError("options() options parameter should be an object")}e.extend(true,n,t);e.each(n,function(e,t){if(i[e]!==undefined){i[e](t)}else{throw new TypeError("option "+e+" is not recognized!")}});return i};i.date=function(e){if(arguments.length===0){if(s){return null}return r.clone()}if(e!==null&&typeof e!=="string"&&!t.isMoment(e)&&!(e instanceof Date)){throw new TypeError("date() parameter must be one of [null, string, moment or Date]")}ee(e===null?null:ne(e));return i};i.format=function(e){if(arguments.length===0){return n.format}if(typeof e!=="string"&&(typeof e!=="boolean"||e!==false)){throw new TypeError("format() expects a string or boolean:false parameter "+e)}n.format=e;if(u){he()}return i};i.timeZone=function(e){if(arguments.length===0){return n.timeZone}if(typeof e!=="string"){throw new TypeError("newZone() expects a string parameter")}n.timeZone=e;return i};i.dayViewHeaderFormat=function(e){if(arguments.length===0){return n.dayViewHeaderFormat}if(typeof e!=="string"){throw new TypeError("dayViewHeaderFormat() expects a string parameter")}n.dayViewHeaderFormat=e;return i};i.extraFormats=function(e){if(arguments.length===0){return n.extraFormats}if(e!==false&&!(e instanceof Array)){throw new TypeError("extraFormats() expects an array or false parameter")}n.extraFormats=e;if(m){he()}return i};i.disabledDates=function(t){if(arguments.length===0){return n.disabledDates?e.extend({},n.disabledDates):n.disabledDates}if(!t){n.disabledDates=false;_();return i}if(!(t instanceof Array)){throw new TypeError("disabledDates() expects an array parameter")}n.disabledDates=ue(t);n.enabledDates=false;_();return i};i.enabledDates=function(t){if(arguments.length===0){return n.enabledDates?e.extend({},n.enabledDates):n.enabledDates}if(!t){n.enabledDates=false;_();return i}if(!(t instanceof Array)){throw new TypeError("enabledDates() expects an array parameter")}n.enabledDates=ue(t);n.disabledDates=false;_();return i};i.daysOfWeekDisabled=function(e){if(arguments.length===0){return n.daysOfWeekDisabled.splice(0)}if(typeof e==="boolean"&&!e){n.daysOfWeekDisabled=false;_();return i}if(!(e instanceof Array)){throw new TypeError("daysOfWeekDisabled() expects an array parameter")}n.daysOfWeekDisabled=e.reduce(function(e,t){t=parseInt(t,10);if(t>6||t<0||isNaN(t)){return e}if(e.indexOf(t)===-1){e.push(t)}return e},[]).sort();if(n.useCurrent&&!n.keepInvalid){var t=0;while(!V(r,"d")){r.add(1,"d");if(t===31){throw"Tried 31 times to find a valid date"}t++}ee(r)}_();return i};i.maxDate=function(e){if(arguments.length===0){return n.maxDate?n.maxDate.clone():n.maxDate}if(typeof e==="boolean"&&e===false){n.maxDate=false;_();return i}if(typeof e==="string"){if(e==="now"||e==="moment"){e=x()}}var t=ne(e);if(!t.isValid()){throw new TypeError("maxDate() Could not parse date parameter: "+e)}if(n.minDate&&t.isBefore(n.minDate)){throw new TypeError("maxDate() date parameter is before options.minDate: "+t.format(u))}n.maxDate=t;if(n.useCurrent&&!n.keepInvalid&&r.isAfter(e)){ee(n.maxDate)}if(o.isAfter(t)){o=t.clone().subtract(n.stepping,"m")}_();return i};i.minDate=function(e){if(arguments.length===0){return n.minDate?n.minDate.clone():n.minDate}if(typeof e==="boolean"&&e===false){n.minDate=false;_();return i}if(typeof e==="string"){if(e==="now"||e==="moment"){e=x()}}var t=ne(e);if(!t.isValid()){throw new TypeError("minDate() Could not parse date parameter: "+e)}if(n.maxDate&&t.isAfter(n.maxDate)){throw new TypeError("minDate() date parameter is after options.maxDate: "+t.format(u))}n.minDate=t;if(n.useCurrent&&!n.keepInvalid&&r.isBefore(e)){ee(n.minDate)}if(o.isBefore(t)){o=t.clone().add(n.stepping,"m")}_();return i};i.defaultDate=function(e){if(arguments.length===0){return n.defaultDate?n.defaultDate.clone():n.defaultDate}if(!e){n.defaultDate=false;return i}if(typeof e==="string"){if(e==="now"||e==="moment"){e=x()}else{e=x(e)}}var t=ne(e);if(!t.isValid()){throw new TypeError("defaultDate() Could not parse date parameter: "+e)}if(!V(t)){throw new TypeError("defaultDate() date passed is invalid according to component setup validations")}n.defaultDate=t;if(n.defaultDate&&n.inline||d.val().trim()===""){ee(n.defaultDate)}return i};i.locale=function(e){if(arguments.length===0){return n.locale}if(!t.localeData(e)){throw new TypeError("locale() locale "+e+" is not loaded from moment locales!")}n.locale=e;r.locale(n.locale);o.locale(n.locale);if(u){he()}if(f){te();oe()}return i};i.stepping=function(e){if(arguments.length===0){return n.stepping}e=parseInt(e,10);if(isNaN(e)||e<1){e=1}n.stepping=e;return i};i.useCurrent=function(e){var t=["year","month","day","hour","minute"];if(arguments.length===0){return n.useCurrent}if(typeof e!=="boolean"&&typeof e!=="string"){throw new TypeError("useCurrent() expects a boolean or string parameter")}if(typeof e==="string"&&t.indexOf(e.toLowerCase())===-1){throw new TypeError("useCurrent() expects a string parameter of "+t.join(", "))}n.useCurrent=e;return i};i.collapse=function(e){if(arguments.length===0){return n.collapse}if(typeof e!=="boolean"){throw new TypeError("collapse() expects a boolean parameter")}if(n.collapse===e){return i}n.collapse=e;if(f){te();oe()}return i};i.icons=function(t){if(arguments.length===0){return e.extend({},n.icons)}if(!(t instanceof Object)){throw new TypeError("icons() expects parameter to be an Object")}e.extend(n.icons,t);if(f){te();oe()}return i};i.tooltips=function(t){if(arguments.length===0){return e.extend({},n.tooltips)}if(!(t instanceof Object)){throw new TypeError("tooltips() expects parameter to be an Object")}e.extend(n.tooltips,t);if(f){te();oe()}return i};i.useStrict=function(e){if(arguments.length===0){return n.useStrict}if(typeof e!=="boolean"){throw new TypeError("useStrict() expects a boolean parameter")}n.useStrict=e;return i};i.sideBySide=function(e){if(arguments.length===0){return n.sideBySide}if(typeof e!=="boolean"){throw new TypeError("sideBySide() expects a boolean parameter")}n.sideBySide=e;if(f){te();oe()}return i};i.viewMode=function(e){if(arguments.length===0){return n.viewMode}if(typeof e!=="string"){throw new TypeError("viewMode() expects a string parameter")}if(w.indexOf(e)===-1){throw new TypeError("viewMode() parameter must be one of ("+w.join(", ")+") value")}n.viewMode=e;h=Math.max(w.indexOf(e),c);A();return i};i.toolbarPlacement=function(e){if(arguments.length===0){return n.toolbarPlacement}if(typeof e!=="string"){throw new TypeError("toolbarPlacement() expects a string parameter")}if(v.indexOf(e)===-1){throw new TypeError("toolbarPlacement() parameter must be one of ("+v.join(", ")+") value")}n.toolbarPlacement=e;if(f){te();oe()}return i};i.widgetPositioning=function(t){if(arguments.length===0){return e.extend({},n.widgetPositioning)}if({}.toString.call(t)!=="[object Object]"){throw new TypeError("widgetPositioning() expects an object variable")}if(t.horizontal){if(typeof t.horizontal!=="string"){throw new TypeError("widgetPositioning() horizontal variable must be a string")}t.horizontal=t.horizontal.toLowerCase();if(g.indexOf(t.horizontal)===-1){throw new TypeError("widgetPositioning() expects horizontal parameter to be one of ("+g.join(", ")+")")}n.widgetPositioning.horizontal=t.horizontal}if(t.vertical){if(typeof t.vertical!=="string"){throw new TypeError("widgetPositioning() vertical variable must be a string")}t.vertical=t.vertical.toLowerCase();if(b.indexOf(t.vertical)===-1){throw new TypeError("widgetPositioning() expects vertical parameter to be one of ("+b.join(", ")+")")}n.widgetPositioning.vertical=t.vertical}_();return i};i.calendarWeeks=function(e){if(arguments.length===0){return n.calendarWeeks}if(typeof e!=="boolean"){throw new TypeError("calendarWeeks() expects parameter to be a boolean value")}n.calendarWeeks=e;_();return i};i.showTodayButton=function(e){if(arguments.length===0){return n.showTodayButton}if(typeof e!=="boolean"){throw new TypeError("showTodayButton() expects a boolean parameter")}n.showTodayButton=e;if(f){te();oe()}return i};i.showClear=function(e){if(arguments.length===0){return n.showClear}if(typeof e!=="boolean"){throw new TypeError("showClear() expects a boolean parameter")}n.showClear=e;if(f){te();oe()}return i};i.widgetParent=function(t){if(arguments.length===0){return n.widgetParent}if(typeof t==="string"){t=e(t)}if(t!==null&&(typeof t!=="string"&&!(t instanceof e))){throw new TypeError("widgetParent() expects a string or a jQuery object parameter")}n.widgetParent=t;if(f){te();oe()}return i};i.keepOpen=function(e){if(arguments.length===0){return n.keepOpen}if(typeof e!=="boolean"){throw new TypeError("keepOpen() expects a boolean parameter")}n.keepOpen=e;return i};i.focusOnShow=function(e){if(arguments.length===0){return n.focusOnShow}if(typeof e!=="boolean"){throw new TypeError("focusOnShow() expects a boolean parameter")}n.focusOnShow=e;return i};i.inline=function(e){if(arguments.length===0){return n.inline}if(typeof e!=="boolean"){throw new TypeError("inline() expects a boolean parameter")}n.inline=e;return i};i.clear=function(){ae();return i};i.keyBinds=function(e){if(arguments.length===0){return n.keyBinds}n.keyBinds=e;return i};i.getMoment=function(e){return x(e)};i.debug=function(e){if(typeof e!=="boolean"){throw new TypeError("debug() expects a boolean parameter")}n.debug=e;return i};i.allowInputToggle=function(e){if(arguments.length===0){return n.allowInputToggle}if(typeof e!=="boolean"){throw new TypeError("allowInputToggle() expects a boolean parameter")}n.allowInputToggle=e;return i};i.showClose=function(e){if(arguments.length===0){return n.showClose}if(typeof e!=="boolean"){throw new TypeError("showClose() expects a boolean parameter")}n.showClose=e;return i};i.keepInvalid=function(e){if(arguments.length===0){return n.keepInvalid}if(typeof e!=="boolean"){throw new TypeError("keepInvalid() expects a boolean parameter")}n.keepInvalid=e;return i};i.datepickerInput=function(e){if(arguments.length===0){return n.datepickerInput}if(typeof e!=="string"){throw new TypeError("datepickerInput() expects a string parameter")}n.datepickerInput=e;return i};i.parseInputDate=function(e){if(arguments.length===0){return n.parseInputDate}if(typeof e!=="function"){throw new TypeError("parseInputDate() sholud be as function")}n.parseInputDate=e;return i};i.disabledTimeIntervals=function(t){if(arguments.length===0){return n.disabledTimeIntervals?e.extend({},n.disabledTimeIntervals):n.disabledTimeIntervals}if(!t){n.disabledTimeIntervals=false;_();return i}if(!(t instanceof Array)){throw new TypeError("disabledTimeIntervals() expects an array parameter")}n.disabledTimeIntervals=t;_();return i};i.disabledHours=function(t){if(arguments.length===0){return n.disabledHours?e.extend({},n.disabledHours):n.disabledHours}if(!t){n.disabledHours=false;_();return i}if(!(t instanceof Array)){throw new TypeError("disabledHours() expects an array parameter")}n.disabledHours=me(t);n.enabledHours=false;if(n.useCurrent&&!n.keepInvalid){var a=0;while(!V(r,"h")){r.add(1,"h");if(a===24){throw"Tried 24 times to find a valid date"}a++}ee(r)}_();return i};i.enabledHours=function(t){if(arguments.length===0){return n.enabledHours?e.extend({},n.enabledHours):n.enabledHours}if(!t){n.enabledHours=false;_();return i}if(!(t instanceof Array)){throw new TypeError("enabledHours() expects an array parameter")}n.enabledHours=me(t);n.disabledHours=false;if(n.useCurrent&&!n.keepInvalid){var a=0;while(!V(r,"h")){r.add(1,"h");if(a===24){throw"Tried 24 times to find a valid date"}a++}ee(r)}_();return i};i.viewDate=function(e){if(arguments.length===0){return o.clone()}if(!e){o=r.clone();return i}if(typeof e!=="string"&&!t.isMoment(e)&&!(e instanceof Date)){throw new TypeError("viewDate() parameter must be one of [string, moment or Date]")}o=ne(e);j();return i};if(a.is("input")){d=a}else{d=a.find(n.datepickerInput);if(d.length===0){d=a.find("input")}else if(!d.is("input")){throw new Error('CSS class "'+n.datepickerInput+'" cannot be applied to non input element')}}if(a.hasClass("input-group")){if(a.find(".datepickerbutton").length===0){l=a.find(".input-group-addon")}else{l=a.find(".datepickerbutton")}}if(!n.inline&&!d.is("input")){throw new Error("Could not initialize DateTimePicker without an input element")}r=x();o=r.clone();e.extend(true,n,Y());i.options(n);he();pe();if(d.prop("disabled")){i.disable()}if(d.is("input")&&d.val().trim().length!==0){ee(ne(d.val().trim()))}else if(n.defaultDate&&d.attr("placeholder")===undefined){ee(n.defaultDate)}if(n.inline){oe()}return i};e.fn.datetimepicker=function(t){t=t||{};var n=Array.prototype.slice.call(arguments,1),i=true,r=["destroy","hide","show","toggle"],o;if(typeof t==="object"){return this.each(function(){var n=e(this),i;if(!n.data("DateTimePicker")){i=e.extend(true,{},e.fn.datetimepicker.defaults,t);n.data("DateTimePicker",a(n,i))}})}else if(typeof t==="string"){this.each(function(){var a=e(this),r=a.data("DateTimePicker");if(!r){throw new Error('bootstrap-datetimepicker("'+t+'") method was called on an element that is not using DateTimePicker')}o=r[t].apply(r,n);i=o===r});if(i||e.inArray(t,r)>-1){return this}return o}throw new TypeError("Invalid arguments for DateTimePicker: "+t)};e.fn.datetimepicker.defaults={timeZone:"",format:false,dayViewHeaderFormat:"MMMM YYYY",extraFormats:false,stepping:1,minDate:false,maxDate:false,useCurrent:true,collapse:true,locale:t.locale(),defaultDate:false,disabledDates:false,enabledDates:false,icons:{time:"fa fa-clock-o",date:"fa fa-calendar",up:"fa fa-chevron-up",down:"fa fa-chevron-down",previous:"fa fa-chevron-left",next:"fa fa-chevron-right",today:"fa fa-crosshairs",clear:"fa fa-trash",close:"fa fa-times"},tooltips:{today:"Go to today",clear:"Clear selection",close:"Close the picker",selectMonth:"Select Month",prevMonth:"Previous Month",nextMonth:"Next Month",selectYear:"Select Year",prevYear:"Previous Year",nextYear:"Next Year",selectDecade:"Select Decade",prevDecade:"Previous Decade",nextDecade:"Next Decade",prevCentury:"Previous Century",nextCentury:"Next Century",pickHour:"Pick Hour",incrementHour:"Increment Hour",decrementHour:"Decrement Hour",pickMinute:"Pick Minute",incrementMinute:"Increment Minute",decrementMinute:"Decrement Minute",pickSecond:"Pick Second",incrementSecond:"Increment Second",decrementSecond:"Decrement Second",togglePeriod:"Toggle Period",selectTime:"Select Time"},useStrict:false,sideBySide:false,daysOfWeekDisabled:false,calendarWeeks:false,viewMode:"days",toolbarPlacement:"default",showTodayButton:false,showClear:false,showClose:false,widgetPositioning:{horizontal:"auto",vertical:"auto"},widgetParent:null,ignoreReadonly:false,keepOpen:false,focusOnShow:true,inline:false,keepInvalid:false,datepickerInput:".datepickerinput",keyBinds:{up:function(e){if(!e){return}var t=this.date()||this.getMoment();if(e.find(".datepicker").is(":visible")){this.date(t.clone().subtract(7,"d"))}else{this.date(t.clone().add(this.stepping(),"m"))}},down:function(e){if(!e){this.show();return}var t=this.date()||this.getMoment();if(e.find(".datepicker").is(":visible")){this.date(t.clone().add(7,"d"))}else{this.date(t.clone().subtract(this.stepping(),"m"))}},"control up":function(e){if(!e){return}var t=this.date()||this.getMoment();if(e.find(".datepicker").is(":visible")){this.date(t.clone().subtract(1,"y"))}else{this.date(t.clone().add(1,"h"))}},"control down":function(e){if(!e){return}var t=this.date()||this.getMoment();if(e.find(".datepicker").is(":visible")){this.date(t.clone().add(1,"y"))}else{this.date(t.clone().subtract(1,"h"))}},left:function(e){if(!e){return}var t=this.date()||this.getMoment();if(e.find(".datepicker").is(":visible")){this.date(t.clone().subtract(1,"d"))}},right:function(e){if(!e){return}var t=this.date()||this.getMoment();if(e.find(".datepicker").is(":visible")){this.date(t.clone().add(1,"d"))}},pageUp:function(e){if(!e){return}var t=this.date()||this.getMoment();if(e.find(".datepicker").is(":visible")){this.date(t.clone().subtract(1,"M"))}},pageDown:function(e){if(!e){return}var t=this.date()||this.getMoment();if(e.find(".datepicker").is(":visible")){this.date(t.clone().add(1,"M"))}},enter:function(){this.hide()},escape:function(){this.hide()},"control space":function(e){if(!e){return}if(e.find(".timepicker").is(":visible")){e.find('.btn[data-action="togglePeriod"]').click()}},t:function(){this.date(this.getMoment())},delete:function(){this.clear()}},debug:false,allowInputToggle:false,disabledTimeIntervals:false,disabledHours:false,enabledHours:false,viewDate:false};return e.fn.datetimepicker});