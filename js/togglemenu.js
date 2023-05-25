jQuery(function($){
$(document).ready(function(){
  $('.wp-toggle').click(function(){
	$(this).next('ul').toggleClass('dep-visible');
	$(this).toggleClass('dep-visible');
 });
});
});