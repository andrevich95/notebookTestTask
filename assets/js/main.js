$( document ).ready(function() {
    //$('footer').css('margin-top', ($(window).height()*0.9));
    $('#preview').hide();

    $('#preview-btn').click(function(){
    	$('#preview_name').text($('#name').val());
    	$('#preview_email').text($('#email').val());
    	$('#preview_task').text($('#txt').val());
 		$('#preview').show();
  	});
    

});
