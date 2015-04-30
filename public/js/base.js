//Object for validating registration form
var registrationForm = {
	setValidation: function() {
		$('#registerform').validate({
			rules: {
				username: {
					required: true,
					minlength: 5,
					maxlength: 25,
					alphanumeric: true
				},
				email: {
					required: true,
					email: true
				},
				cemail: {
					required: true,
					equalTo: '#email'
				},
				password: {
					required: true,
					minlength: 5
				},
				cpassword: {
					required: true,
					equalTo: '#password'
				},
				accepttos: 'required'				
			},
			messages: {
				username: {
					required: 'Don\'t forget your username',
					alphanumeric: 'Usernames may only contain letters, numbers and underscores'
				},
				email: {
					required: 'Don\'t forget your email'
				},
				cemail: {
					required: 'Please repeat your email',
					equalTo: 'Your confirmed email does not match your email'
				},
				password: {
					required: 'Don\'t forget your password'
				},
				cpassword: {
					required: 'Please repeat your password',
					equalTo: 'Your confirmed password does not match your password'
				},
				accepttos: 'Please agree with our terms of service and privacy policy'
			},
			submitHandler: function(form) {
				form.submit();
			}			
		});
	}
};

//Hide the change forms on the profile page and bind events to links/buttons for changing info
function prepareProfile(){
	$('#emailchangeform').hide();
	$('#passwordchangeform').hide();
	
	$('#emailchange').click(function(event){
		event.preventDefault();
		$('#emailchange').hide();
		$('#emailchangeform').show();
		
		$('#passwordchange').show();
		$('#passwordchangeform').hide();
	});
	
	$('#passwordchange').click(function(event){
		event.preventDefault();
		$('#passwordchange').hide();
		$('#passwordchangeform').show();
		
		$('#emailchange').show();
		$('#emailchangeform').hide();
	});
}


//Validate and submit a registration
function submitRegistration() {
	registrationForm.setValidation();
}


/*
 * Document ready function 
 * 
 * Calls all the necessary functions and objects when the document is ready
 */
$( document ).ready(function() {    
    prepareProfile();
    submitRegistration();      
});