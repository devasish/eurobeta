$(document).ready(function() {
  $('#flash_success').animate({opacity: 1.0}, 3000).fadeOut();
  $('#flash_danger').animate({opacity: 1.0}, 3000).fadeOut();
  $('#flash_warning').animate({opacity: 1.0}, 4000).fadeOut();
  $('#flash_info').animate({opacity: 1.0}, 4000).fadeOut();
  
  $('.close_flash').on('click', function(){
    $('#flash_success').hide();
    $('#flash_danger').hide();
    $('#flash_warning').hide();
    $('#flash_info').hide();
  });
});