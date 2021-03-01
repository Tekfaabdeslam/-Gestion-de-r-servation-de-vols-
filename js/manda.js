$(document).ready(function() {
	$('#username').on('input', function() {
		var input=$(this);
		var is_name=input.val();
		if(is_name)
		{
			input.removeClass("invalide").addClass("valide");
			input.parent().next().next().hide();
		}
		else
		{
			input.removeClass("valide").addClass("invalide");
			input.parent().next().next().show();
		}
	});
	$('#pwd1').on('input', function() {
		var input=$(this);
		var is_pwd=input.val();
		if(is_pwd)
		{
			input.removeClass("invalide").addClass("valide");
			input.parent().next().hide();
		}
		else
		{
			input.removeClass("valide").addClass("invalide");
			input.parent().next().show();
		}
	});
	$('#firstname').on('input', function() {
		var input=$(this);
		var is_fn=input.val();
		if(is_fn)
		{
			input.removeClass("invalide").addClass("valide");
			input.parent().next().hide();
		}
		else
		{
			input.removeClass("valide").addClass("invalide");
			input.parent().next().show();
		}
	});
	$('#lastname').on('input', function() {
		var input=$(this);
		var is_ln=input.val();
		if(is_ln)
		{
			input.removeClass("invalide").addClass("valide");
			input.parent().next().hide();
		}
		else
		{
			input.removeClass("valide").addClass("invalide");
			input.parent().next().show();
		}
	});
	$('#email').on('input', function() {
		var input=$(this);
		var is_email=input.val();
		if(is_email)
		{
			input.removeClass("invalide").addClass("valide");
			input.parent().next().hide();
		}
		else
		{
			input.removeClass("valide").addClass("invalide");
			input.parent().next().show();
		}
	});
	$('#tel').on('input', function() {
		var input=$(this);
		var is_tel=input.val();
		if(is_tel)
		{
			input.removeClass("invalide").addClass("valide");
			input.parent().next().hide();
		}
		else
		{
			input.removeClass("valide").addClass("invalide");
			input.parent().next().show();
		}
	});
});