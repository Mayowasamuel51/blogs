
$('.submit').click(function(e){
	e.preventDefault()

	let title =  $.trim( $('.title').val());

	

	let time  = $.trim($('.time').val());

	let date  = $.trim($('.date').val());

	let content = $.trim($('.content').val());

	let wirter = $.trim($('.wirter').val())



	if(title === ''   || content  === "" || time === null || date ===  null || wirter === ''){
			const div = document.createElement('div');
			div.innerHTML = 'Please fill all content ';
			div.className = 'notification is-warning has-text-semtbold';

			const cotain = document.querySelector('.col');
			const shift = document.querySelector('.shift');
			cotain.insertBefore(div,shift);
			setTimeout(()=>{
				div.remove();
			},9000)
	}else{
		$.ajax({
			url:"http://localhost/jamb/ZBLOG/Dashboard/uploadBlog/uploadDatabase/uploadblog.php",
			method:  'post',
			data:{
				title:title,
				time:time,
				date:date,
				content:content,
				wirter:wirter
			},
				beforeSend:function(){
				$('.spinner').html("<img src='Skype.gif'/> Please wait");
				$('.spinner').delay(10000).fadeOut(2000)
				
			},
			success:function(data){
				$('.show').hide().delay(12000).fadeIn('slow')
				$('.show').html(data)
				

		
			},

			// success:function(data){
			// 	// console.log(data)
			// 	$('.show').html(data)
			// },
			datatype:'string'







		})
	}


});












