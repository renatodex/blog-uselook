jQuery(document).ready(function($) {
	$('#meta_dph_featured').click(function() {
  		$('#hidese').fadeToggle(400);
	});
	$('#meta_dph_review').click(function() {
  		$('#hidereview').fadeToggle(400);
	});

	if ($('#meta_dph_featured:checked').val() !== undefined) {
		$('#hidese').show();
	}
	if ($('#meta_dph_review:checked').val() !== undefined) {
		$('#hidereview').show();
	}

	$('#bgcolor, #textcolor').wpColorPicker();


});


jQuery.fn.live = function (types, data, fn) {
        jQuery(this.context).on(types,this.selector,data,fn);
        return this;
    };

    // add new input
      (function($){ 
          $(function(){ 

            var num = 2;


            $('#addnew').click(function(){
                $('#myfor').append('<p><label>Param  '+ num +' key "test" </label><br ><input type="text" name="test" value=""  size="60" /> <span>Delete</span></p>');
                num ++;
            });

            $('span').live( 'click' , function(){       
                $(this).parent('p').remove();
            });     

        });  
    })(jQuery) 