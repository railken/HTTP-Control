function getParamsByForm(form)
{
	var params = {};

	$.map(form.find("[name]"), function(element) {
		params[$(element).attr('name')] = $(element).val();
	});

	return params;
}

$('body').on('submit', "[name='projects.create']", function(e) {
	e.preventDefault();

	var params = getParamsByForm($(this));

	var resolver = new ProjectResolver();

	resolver.create({
		attributes: {	
			name: params.name,
			description: params.description,
			team_id: params.team_id
		},
		success: function()
		{
			$(this).find("[name]").val('');
		}
	});
});

$('body').on('submit', "[name='projects.remove']", function(e) {
	e.preventDefault();
	$('.modal').modal('hide');
	var id = $(this).find("[name='id']").val();

	var resolver = new ProjectResolver();

	setTimeout(function() {
		resolver.remove(id, {});
	}, 100);

});


$('body').on('submit', "[name='projects.update']", function(e) {
	
	e.preventDefault();

	var params = getParamsByForm($(this));

	var resolver = new ProjectResolver();


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