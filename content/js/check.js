$ (document).ready(function(){
    
    console.log("ok"); 

    $('#confLoginRegister').keyup(function(event){
		var login = $('#loginRegister').val();
        var conflogin = $('#confLoginRegister').val(); 
		$('#errConfLogin').toggle(login != conflogin);
	}) ; 


    $('#passRegister').keyup(function(event){
		var pass = $('#passRegister').val();
		$('#errPass').toggle(pass.length < 8);
	}) ; 
		


    $('#registration').submit(function(event){
			if($('.error:visible').length!==0){
				event.preventDefault() ;
				alert('Merci de corriger les erreurs.');
			}
		});



});