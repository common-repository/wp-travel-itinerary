function wpti_schedule_toggle( txt_show, txt_hide ) {

	var schedule = jQuery( '#wpti-schedule' );
	var text = jQuery( '#wpti-schedule-link' );
	var meetup = jQuery( '#wpti-meetup' );
	var success = jQuery( '#wpti-meetup-success' );
	
	if( schedule.css( 'display' ) == 'block' ) {
		schedule.slideUp( 'fast' );
		text.text( txt_show );
  }
	else {
		meetup.hide();
		success.hide();
		text.text( txt_hide );
		schedule.slideDown( 'fast' );
	}
	
}

function wpti_meetup_toggle( index ) {

	var schedule = jQuery( '#wpti-schedule' );
	var text = jQuery( '#wpti-schedule-link' );
	var meetup = jQuery( '#wpti-meetup' );
	var location = jQuery( '#wpti-meetup-location' );
	var name = jQuery( '#wpti-meetup-name' );
	var email = jQuery( '#wpti-meetup-email' );
	var message = jQuery( '#wpti-meetup-message' );
	var success = jQuery( '#wpti-meetup-success' );
	
	if( meetup.css( 'display' ) == 'none' ) {
  	meetup.slideDown( 'fast' );
  	success.hide();	  	
		location.attr( 'selectedIndex', index );		
		
		name.removeClass( 'wpti-form-error' );
		email.removeClass( 'wpti-form-error' );
		message.removeClass( 'wpti-form-error' );
		
		message.val( '' );
	}
	else {
  	location.attr( 'selectedIndex', index );
	}
	
}

function wpti_meetup_success() {

	var meetup = jQuery( '#wpti-meetup' );
	var success = jQuery( '#wpti-meetup-success' );
	var button = jQuery( '#wpti-meetup-submit' );
	var sending = jQuery( '#wpti-meetup-sending' );	
	
  meetup.hide();
  success.show();
  
	button.removeAttr( 'disabled' );
	sending.hide();	  
  
  setTimeout( function() { success.slideUp( 'fast' ); }, 2000 );

}

function wpti_meetup_send( admin_ajax ) {

	var name = jQuery( '#wpti-meetup-name' );
	var email = jQuery( '#wpti-meetup-email' );
	var message = jQuery( '#wpti-meetup-message' );
	var location = jQuery( '#wpti-meetup-location' );
	
	if( name.val().length == 0 || message.val().length == 0 || ! wpti_is_email_valid( email.val() ) ) {
	
		if( name.val().length == 0 ) {			
			name.addClass( 'wpti-form-error' );
		}
		else {
			name.removeClass( 'wpti-form-error' );
		}
		
		if( wpti_is_email_valid( email.val() ) ) {
			email.removeClass( 'wpti-form-error' );
		}
		else {
			email.addClass( 'wpti-form-error' );
		}
				
		if( message.val().length == 0 ) {
			message.addClass( 'wpti-form-error' );
		}
		else {	
			message.removeClass( 'wpti-form-error' );
		}	
	
	} else {	
	
		var button = jQuery( '#wpti-meetup-submit' );
		var sending = jQuery( '#wpti-meetup-sending' );	
		
		button.attr( 'disabled', 'disabled' );
		sending.show();
		
		jQuery.post( admin_ajax , { 
		
			'action': 'wpti_meetup_process',  
		 	'wpti_name': name.val(),
		 	'wpti_email': email.val(),
		 	'wpti_message': message.val(),
			'wpti_location': location.val(),		 
		 	'success': function() { wpti_meetup_success(); }
		 
		 } );	
	
	}

}

function wpti_meetup_close() {

	var meetup = jQuery( '#wpti-meetup' );
	
	meetup.slideUp( 'fast' );

}

function wpti_is_email_valid( emailAddress ) {

	var pattern = new RegExp( /^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i );
	
	return( pattern.test( emailAddress ) );
	
}