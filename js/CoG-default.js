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
