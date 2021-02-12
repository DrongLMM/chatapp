(function($){


	jQuery(document).ready(function(){



		jQuery('.msg-form').submit(function(){

			var text = jQuery("input[name='msg']").val();

			$.ajax({
				'url' : 'chat.php',
				'type': 'POST',
				'data':{
					'chatstart' : 'hobe',
						'msg': text 
				},

				'success' : function(){
					jQuery("input[name='msg']").val("");
				}
			})

			return false;
		})
		

		jQuery('.signin-form').submit(function(){

			var email = jQuery("input[type='email']").val();
			var password = jQuery("input[type='password']").val();

			$.ajax({

				'url' : 'signin.php',
				'type': 'POST',
				'data': {
					'login' : 'hobe',
					'email' : email,
					'password' : password
				},
				'success' : function(output){

					jQuery('.container').html(output);
				}

			})

			return false;
		})





		jQuery('.signup').click(function(){

			$.ajax({
				 'url' : 'signup.php',
				 'type': 'POST',
				 'data': {
				 	'signup' : 'hobe',
				 	
				 },
				 'success' : function(output){

				 	jQuery(".box").html(output);

				 }
			})

			
			return false;
		})

		jQuery('.signin').click(function(){
	
			
			$.ajax({
				 'url' : 'signin.php',
				 'type': 'POST',
				 'data': {
				 	'signin' : 'hobe',
				 	
				 },
				 'success' : function(output){

				 	jQuery(".box").html(output);

				 }
			})

			
			return false;
		})

		




		jQuery('.registration').submit(function(){


			var firstname = jQuery("input[name='firstname']").val();
			var lastname = jQuery("input[name='lastname']").val();
			var email = jQuery("input[name='email']").val();
			var password = jQuery("input[name='password']").val();

			

			$.ajax({
				'url'  : 'signup.php',
				'type' : 'POST',
				'data' : {
					'register' : 'hobe',
					'firstname' : firstname,
					'lastname'	: lastname,
					'email'		: email,
					'password'	: password
				},
				'success' : function(register){

					jQuery('.signup-ipt').val('');
					jQuery('.regi-suc').html(register);

				}
			})

			return false;
		})


		setInterval(function(){

			$.ajax({

			'url' : 'chat.php',
			'type': 'POST',
			'data':{
				'updatehobe' : ''
			},
			'success': function(output){

				jQuery('.msg').html(output);
			}
		})

		return false;
		}, 1000)

		


	})

}(jQuery))



