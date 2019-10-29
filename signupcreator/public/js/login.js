// var server = location.protocol +'//'+location.host+'/project/signupcreator/';
var server = location.protocol +'//'+location.host+'/signupcreator/';

login();
	function login()
	{

		$('#login_form').on('submit',function(e){

			e.preventDefault();
			var data = $(this).serialize();

			$.ajax({
			url: server+'login/run',
			type: 'POST',
			dataType:'json',
			data: data,
			success:function(res)
			{

				// console.log(res);
				if(res.responsecode == 1)
				{
					window.location.reload();
				}else
				{
					alert(res.responsemsg);
				}
				
			}

			})

		});
		
	}