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

var BasicResource = function(resolver)
{
	this.resolver = resolver;

	this.create = function(form)
	{

		var params = getParamsByForm(form);

		var resolver = this.resolver;

		resolver.create({
			attributes: params,
			success: function()
			{
				form.find("[name]").val('');
			}
		});
	};

	this.update = function(form)
	{

		var params = getParamsByForm(form);

		var resolver = this.resolver;

		var next = function() { 
			resolver.update(params.id, {
				attributes: params,
				success: function()
				{
					form.find("[name]").val('');
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
		} else {
			next();
		}
	}

	this.remove = function(form)
	{
		$('.modal').modal('hide');
		var id = form.find("[name='id']").val();

		var resolver = this.resolver;

		setTimeout(function() {
			resolver.remove(id, {});
		}, 100);
	}
};

$('body').on('submit', "[name='projects.create']", function(e) {
	e.preventDefault();
	br = new BasicResource(new ProjectResolver());
	br.create($(this));
});

$('body').on('submit', "[name='projects.update']", function(e) {
	e.preventDefault();
	br = new BasicResource(new ProjectResolver());
	br.update($(this));
});

$('body').on('submit', "[name='projects.remove']", function(e) {
	e.preventDefault();
	br = new BasicResource(new ProjectResolver());
	br.remove($(this));
});

$('body').on('submit', "[name='teams.create']", function(e) {
	e.preventDefault();
	br = new BasicResource(new TeamResolver());
	br.create($(this));
});

$('body').on('submit', "[name='teams.update']", function(e) {
	e.preventDefault();
	br = new BasicResource(new TeamResolver());
	br.update($(this));
});

$('body').on('submit', "[name='teams.remove']", function(e) {
	e.preventDefault();
	br = new BasicResource(new TeamResolver());
	br.remove($(this));
});

$('body').on('show.bs.modal', "[data-modal-type='team']", function (event) {

	var button = $(event.relatedTarget);
	var id = button.attr('data-id');
	var modal = $(this);

	var team = App.get('user').getTeamById(id);

	modal.html(template.get(modal.attr('data-modal-template'), {team: team}));

});


$('body').on('show.bs.modal', "[data-modal-type='project']", function (event) {


	var button = $(event.relatedTarget);
	var id = button.attr('data-id');
	var team_id = button.attr('data-team-id');

	var team = App.get('user').getTeamById(team_id);
	var project = team.getProjectById(id);

	var modal = $(this);

	modal.html(template.get(modal.attr('data-modal-template'), {team: team, project: project}));

});

$('body').on('hide.bs.modal', ".modal", function (event) {

	var button = $(event.relatedTarget);

	var modal = $(this);
	var info;

	modal.find("[data-modal-reset='input']").val('');
	modal.find("[data-modal-reset='html']").html('');
	modal.find("[data-modal-reset='hide']").hide();

});