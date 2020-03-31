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
*/
/* A 1.1.1 - Error
* Non-text Content
*/
//EMAIL SUBSCRIBERS PLUGIN
$('.es_spinner_image img').attr('alt', '');

/* A 1.3.1 - Error
* Input field has no description
*/
$('.es_required_field').attr('aria-label', 'Required Field');


/* A 1.3.1 - Error
* HTML is used to format content
*/
//GENERAL
$('iframe').removeAttr("frameborder");
$('img').removeAttr("align");

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

/* A 1.3.1
* No top-level heading on the page - Warning
*/
//GENERAL
if ($("h1").length == 0) {
  $("<h1 class='visually-hidden' role='complementary' aria-label='hidden title'> "+ $("h2").text() + " </h1>").insertAfter( "#main-header");
}

/* A 1.3.1
* Non-distinguishing landmark - Warning
*/
//WORDPRESS
$('#custom_html-2').attr('aria-label', 'Footer Widgets');
$('#secondary').attr('aria-label', 'Sidebar');
//BU NAVIGATION PLUGIN
$('.widget_bu_pages').attr('aria-label', 'BU navigation');
//TWITTER EMBED
$('#text-147').attr('aria-label', 'Twitter Widget');

/* A 3.2.2
* Missing Button in form
*/
// SWIFTYPE EMBED
$("<input class='sr-only' type='submit' value='Submit'>").insertAfter( ".st-default-search-input");

/* A 4.1.2 Error
* iFrame is missing a title
*/
// TWITTER EMBED
$('#twitter-widget-0').attr('title', "Twitter Widget");
