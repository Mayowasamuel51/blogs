  // var time = new Date().getTime();
  //    $(document.body).bind("focus keypress", function(e) {
  //        time = new Date().getTime();
  //    });

  //    function refresh() {
  //        if(new Date().getTime() - time >= 60000) 
  //            window.location.reload(true);
  //        else 
  //            setTimeout(refresh, 10000);
  //    }

  //    setTimeout(refresh, 10000);

$('.btn').click(function(e){
	e.preventDefault()

	let email =  $.trim( $('.email').val());

	let password = $.trim($('.password').val());


	if(email === ''  || password === ''){
			const div = document.createElement('div');
			div.innerHTML = 'Please fill the input  ';
			div.className = 'notification is-warning has-text-semtbold';

			const cotain = document.querySelector('.column');
			const shift = document.querySelector('.shift');
			cotain.insertBefore(div,shift);
			setTimeout(()=>{
				div.remove();
			},6000)
	}else {

		$.ajax({

			url: "http://localhost/jamb/ZBLOG/Database/login.php",
				global: false,
			method:'POST',

			data:
			{

				email:email,
				pass:password
			},
			async:true,
			beforeSend:function(){
				$('.spinner').html("<img src='Spinner-3.gif'/> Please wait");
				$('.spinner').delay(10000).fadeOut(2000)
				
			},
			success:function(data){
				$('.final').hide().delay(12000).fadeIn('slow')
				$('.final').html(data)
				

		
			},
				error:function(error){
					$('.final').html(error)
				},
			// beforeSend:function(){
			// 	$('.pageloader').show()
			// },

			// complete:function(){
			// 	$('.pageloader').fadeOut(1000)
			// },

			// success:function(data){
				// data =' http://localhost/jamb/Dashboard/check.php'
				// window.location.replace("http://localhost/jamb/Dashboard/check.php");
				// window.location.replace(data)
				// console.log(data)
				// $('.final').html(data)

			// },
			datatype:'string'




		})
	// }



	
// })

}

})