function getParamsByForm(form)
{
	var params = {};

	$.map(form.find("[name]"), function(element) {
		params[$(element).attr('name')] = $(element).val();
	});

	return params;
}

$('body').on('submit', "[name='projects-create']", function(e) {
		e.preventDefault();

	var params = getParamsByForm($(this));

	var resolver = new ProjectResolver();

	resolver.create({
		params: {	
			name: params.name,
			description: params.description
		},
		success: function()
		{
			$(this).find("[name]").val();
		}
	});
});

$('body').on('submit', '.projects-delete', function(e) {
	e.preventDefault();
	$('.modal').modal('hide');
	var id = $(this).find("[name='id']").val();

	var resolver = new ProjectResolver();
	resolver.remove(id);
	
});


$('body').on('submit', '.projects-edit', function(e) {
	
	e.preventDefault();

	var id = $(this).find("[name='id']").val();
	var input_name = $(this).find("[name='name']");
	var input_description = $(this).find("[name='description']");

	var resolver = new ProjectResolver();

	resolver.update(id, {
		name: input_name.val(),
		description: input_description.val()
	});

	input_name.val('');
	input_description.val('');

});


$('body').on('submit', "[name='teams.create']", function(e) {
	e.preventDefault();

	var params = getParamsByForm($(this));

	var resolver = new TeamResolver();

	resolver.create({
		attributes: {	
			name: params.name,
			description: params.description
		},
		success: function()
		{
			$(this).find("[name]").val('');
		}
	});

});

$('body').on('submit', "[name='teams.update']", function(e) {
	e.preventDefault();

	var params = getParamsByForm($(this));

	var resolver = new TeamResolver();

	
	resolver.update(params.id, {
		attributes: {	
			name: params.name,
			description: params.description
		},
		success: function()
		{
			$(this).find("[name]").val('');
		}
	});

});

$('body').on('submit', "[name='teams.remove']", function(e) {
	e.preventDefault();
	$('.modal').modal('hide');
	var params = getParamsByForm($(this));
	var resolver = new TeamResolver();

	setTimeout(function() {
		resolver.remove(params.id, {});
	}, 100);
	
});