var $ = jQuery ;
$(function () {
  $('#gg-utility-pane').on( {
    'mouseenter': function(){
      $(this).css('right', '0px');
    },
    'mouseleave':function(){
      $(this).css('right', '-420px');
    }
  });
});
