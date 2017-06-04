function getParamsByForm(form)
{
	var params = {};

	$.map(form.find("[name]"), function(element) {
		params[$(element).attr('name')] = $(element).val();
	});

	return params;
}

var ButtonAjaxLoader = function(button)
{
	this.element = button;
	this.start = function()
	{
		this.loader = $("<span><i class='fa fa-refresh rotate-1'></i>&nbsp;&nbsp;</span>");
		this.element.prepend(this.loader);
	};

	this.end = function()
	{
		this.loader.remove();
	};
};


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

	var next = function() { 
		resolver.update(params.id, {
			attributes: params,
			success: function()
			{
				$(this).find("[name]").val('');
				btn_loader.end();
			}
		});
	}

	var btn_loader = new ButtonAjaxLoader($(this).find("[type='submit']"));
	btn_loader.start();

	if (typeof params.avatar !== "undefined") {

		File.onLoad('avatar', function(value) {
			params.avatar = value;
			next()
		});
	}

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

$('body').on('show.bs.modal', "[data-modal-type='team']", function (event) {

	var button = $(event.relatedTarget);

	var modal = $(this);
	var info;

	modal.find("[name='id']").val(App.get('team').id);
	modal.find("[data-team='avatar']").html("<img src='"+App.get('team').avatar+"'>");

});

$('body').on('hide.bs.modal', "[data-modal-type='team']", function (event) {

	var button = $(event.relatedTarget);

	var modal = $(this);
	var info;

	modal.find("[data-modal-reset='input']").val('');
	modal.find("[data-modal-reset='html']").html('');
	modal.find("[data-modal-reset='hide']").hide();

});
