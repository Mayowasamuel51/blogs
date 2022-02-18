

// document.querySelector('#forms').addEventListener('submit', LoadUsers)
//  document.querySelector('.btn').addEventListener('click',LoadUsers )


$('.btn').click(function(e){
	e.preventDefault()

	let username =  $.trim( $('.username').val());

	

	let email  = $.trim($('.email').val());

	let password = $.trim($('.password').val());


	if(username === ''  || password === '' || email === '' ){
			const div = document.createElement('div');
			div.innerHTML = 'Please fill the input  ';
			div.className = 'notification is-warning has-text-semtbold';

			const cotain = document.querySelector('.col');
			const shift = document.querySelector('.shift');
			cotain.insertBefore(div,shift);
			setTimeout(()=>{
				div.remove();
			},6000)
	}else {
		
		$.ajax({

			url: "http://localhost/jamb/ZBLOG/Database/sigh.php",

			method:'POST',

			data:
			{

				email:email,
				pass:password,
				username:username
			},
			// beforeSend:function(){
			// 	$('.pageloader').show(9000)
			// },

			// complete:function(){
			// 	$('.pageloader').fadeOut()
			// },

			success:function(data, status){
				// data =' http://localhost/jamb/Dashboard/check.php'
				// window.location.replace("http://localhost/jamb/Dashboard/check.php");
				// window.location.replace(data)
				// console.log(data)
				$('.error').html(data)
	
			},
			datatype:'string',




		})
	}



	
})