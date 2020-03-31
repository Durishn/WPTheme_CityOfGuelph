/**
 * AODAfixes.js
 * Licensed under the MIT license - http://opensource.org/licenses/MIT
 *
 *   WARNING: If links have scripts attached to their id, things may break!
 *
 * @summary Quickfixes for WCAG errors.
 * @author Nic Durish <nic.durish@guelph.com>
 * @author_uri nicdurish.ca
 * @date 2020-03-17
 *
 * Copyright (c) 2020 Nic Durish
 */

var topbtn = $('#top-return-btn');
var $root = $('html, body');

/* Show Back To Top button when height is more than 2.5 times window */
/* $(window).scrollTop() + $(window).height() >= $(document).height() - 300   <-- add for only bottom*/
$(window).scroll(function() {
  if( $(window).scrollTop() > $(window).height()) {
    topbtn.addClass('show');
  } else {
    topbtn.removeClass('show');
  }
});

topbtn.on('click', function(e) {
  e.preventDefault();
  $root.animate({scrollTop:0}, '500');
  return false;
});






/*
* WCAG QUICKFIXES
* author: Nic Durish (code@nicdurish.ca)
*/

/* A 1.1.1 - Error
* Non-text Content
*/
//EMAIL SUBSCRIBERS PLUGIN
$('.es_spinner_image img').attr('alt', '');

/* A 1.3.1 - Error
* Input field has no description
*/
//EMAIL SUBSCRIBERS PLUGIN
$('.es_required_field').attr('aria-label', 'Required Field');
//MAPLISTPRO PLUGIN
$('.prettyMapList #Map-List-Search input.prettySearchValue').attr('aria-label', 'Search map by keyword');


/* A 1.3.1 - Error
* Select box has no description
*/
//EVENTS CALENDER PLUGIN
$('#tribe-events .select2-results').attr('aria-label', 'Filter Results');

/* A 1.3.1 - Error
* HTML is used to format content
*/
//GENERAL
$('iframe').removeAttr("frameborder");
$('iframe').removeAttr("marginwidth");
$('iframe').removeAttr("marginheight");
$('iframe').removeAttr("scrolling");
$('img').removeAttr("align");

/* A 1.3.1 - Error
* Local-link does not exist
*/
//EVENTS CALENDER PLUGIN
$('div#tribe-events .tribe-events-before-html').attr('id', 'content');

/* A 1.3.1 - Error
* Form control label is missing text
*/
//EMAIL SUBSCRIBERS PLUGIN
$('.emaillist form.es_subscription_form label').append("<span class='sr-only'>- Email Subscription Form</span>");
//EVENTS CALENDER PLUGIN
//$('div#tribe-events form#tribe_events_filters_form label').append("<span class='sr-only'>- Filter Selection</span>");

/* A 1.3.1 -Warning
* i used to format text
*/
//GENERAL
$('i').each(function() {
  var outer = this.outerHTML;

  // Replace opening tag
  var regex = new RegExp('<' + this.tagName, 'i');
  var newTag = outer.replace(regex, '<' + 'span');

  // Replace closing tag
  regex = new RegExp('</' + this.tagName, 'i');
  newTag = newTag.replace(regex, '</' + 'span');

  $(this).replaceWith(newTag);
});

/* A 1.3.1 - Warning
* No top-level heading on the page
*/
//GENERAL
if ($("h1").length == 0) {
  $("<h1 class='visually-hidden' role='complementary' aria-label='hidden title'> "+ $("h2").text() + " </h1>").insertAfter( "#main-header");
}

/* A 1.3.1 - Warning
* Non-distinguishing landmark
*/
//WORDPRESS
$('#custom_html-2').attr('aria-label', 'Footer Widgets');
$('#secondary').attr('aria-label', 'Sidebar');
//BU NAVIGATION PLUGIN
$('.widget_bu_pages').attr('aria-label', 'BU navigation');
//TWITTER EMBED
$('#text-147').attr('aria-label', 'Twitter Widget');

/* A 3.2.2
* Missing button in form
*/
// SWIFTYPE EMBED
$("<input class='sr-only' type='submit' value='Submit'>").insertAfter( ".st-default-search-input");

/* A 3.2.2
* Select box has no submit button
*/
// SWIFTYPE EMBED
$("#Map-List-Search a.doPrettySearch").wrap('<button type="submit" style="  border: none; background: none;"></button>')

/* A 3.2.2 - Error
* Select box has no description
*/
//MAPLISTPRO PLUGIN
$('.prettyMapList #Map-List-Search select.distanceSelector').attr('aria-label', 'Distance Selector');

/* A 4.1.2 Error
* iFrame is missing a title
*/
// TWITTER EMBED
$('#twitter-widget-0').attr('title', "Twitter Widget");
// DARKSKY EMBED
$('#forecast_embed').attr('title', "Forecast Widget");
