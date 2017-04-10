$( "#connexionOn" ).click(function() {
  $('.fil').addClass('filter');
  $('.wrapper').css('display', 'flex');
  $('.coco').css('position', 'fixed');
  $('.coco').css('display', 'flex');
  $('#overlay-close').css('visibility', 'visible');
  $('#overlay-close').css('opacity', '1');
});

$( "#inscriptionOn" ).click(function() {
  $('.fil').addClass('filter');
  $('.wrapper2').css('display', 'flex');
  $('.coco2').css('position', 'absolute');
  $('.coco2').css('display', 'flex');
  $('#overlay-close').css('visibility', 'visible');
  $('#overlay-close').css('opacity', '1');
});

$('#menu').click(function() {
  $('.fil').addClass('filter');
  $("#menu_full").addClass("menu");
  $('#menu_full').css('display', 'flex');
  $('#menu_full').css('overflow', 'visible');

});
$('#overlay-close').click(function() {
  $('.wrapper').css('display', 'none');
  $('.coco').css('display', 'none');
  $( "#fil" ).removeClass( "filter" );
  $('#overlay-close').css('visibility', 'hidden');
  $('#overlay-close').css('opacity', '0');
  $('.wrapper2').css('display', 'none');
  $('.coco2').css('display', 'none');
});
