/**
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

/* A 1.3.1 -Warning
* i used to format text
*/
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
if ($("h1").length == 0) {
  $("<h1 class='visually-hidden' role='complementary' aria-label='hidden title'> "+ $("h2").text() + " </h1>").insertAfter( "#main-header");
}
