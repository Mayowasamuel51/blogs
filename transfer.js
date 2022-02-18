
$('.transfer-btn').click(function(e){
	e.preventDefault()

	let note =  $.trim( $('.note').val());

	

	let email = $.trim($('.email').val());




	if(note === ''   || email  === "" ){
			const div = document.createElement('div');
			div.innerHTML = 'Please fill all  fields ';
			div.className = 'notification is-warning has-text-semtbold';

			const cotain = document.querySelector('.tops');
			const shift = document.querySelector('.add');
			cotain.insertBefore(div,shift);
			setTimeout(()=>{
				div.remove();
			},9000)
	}else{
		$.ajax({
			url:"http://localhost/jamb/ZBLOG/Dashboard/uploadBlog/uploadDatabase/uploadtransfer.php",
			method:  'post',
			data:{

				note:note,
				email:email
			},
				beforeSend:function(){
				$('.spinner').html("<img src='Skype.gif'/> ");
				$('.spinner').delay(10000).fadeOut(2000)
				
			},
			success:function(data){
				$('.show').hide().delay(12000).fadeIn('slow')
				$('.show').html(data)
				console.log(`it showing `)
				

		
			},

			// success:function(data){
			// 	// console.log(data)
			// 	$('.show').html(data)
			// },
			datatype:'string'

			






		})
	}





})





