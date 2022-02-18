
$('.submit_story').click(function(e){
	e.preventDefault()

	let title =  $.trim( $('.title').val());

	

	let time  = $.trim($('.time').val());

	let date  = $.trim($('.date').val());

	let content = $.trim($('.content').val());



	if(title === ''   || content  === "" || time === null || date ===  null){
			const div = document.createElement('div');
			div.innerHTML = 'Please fill all Story fields ';
			div.className = 'notification is-warning has-text-semtbold';

			const cotain = document.querySelector('.tops');
			const shift = document.querySelector('.add');
			cotain.insertBefore(div,shift);
			setTimeout(()=>{
				div.remove();
			},9000)
	}else{
		$.ajax({
			url:"http://localhost/jamb/ZBLOG/Dashboard/uploadBlog/uploadDatabase/uploadstory.php",
			method:  'post',
			data:{

				title:title,
				time:time,
				date:date,
				content:content
			},
				beforeSend:function(){
				$('.spinner').html("<img src='Skype.gif'/> Please wait");
				$('.spinner').delay(10000).fadeOut(2000)
				
			},
			success:function(data){
				$('.shows').hide().delay(12000).fadeIn('slow')
				$('.shows').html(data)
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

























