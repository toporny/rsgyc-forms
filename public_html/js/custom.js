

  function toggleOwner23(button, inte) {

    if( $('#additional_owner_'+inte+'_info').is(':visible') ) {
      $('.additional_owner_'+inte+'_info_class').removeAttr('required');
      $('#demo-form').parsley().reset();
      $('#additional_owner_'+inte+'_info').hide('slow', function() {
        $(button).text('Add Additional Owner '+inte);
      });
    } else {
      $('.additional_owner_'+inte+'_info_class').attr('required', 'required');
      $('#demo-form').parsley().reset();
      $('#additional_owner_'+inte+'_info').show('slow', function() {
        $(button).text('Remove Additional Owner '+inte);
      });
    }
  }



 
