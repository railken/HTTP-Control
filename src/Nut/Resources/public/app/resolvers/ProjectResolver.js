var ProjectResolver = function()
{	

	this.manager = new ProjectManager();
};

/**
 * Reload template
 *
 * @return void
 */
ProjectResolver.prototype.template = function()
{

	template.load('side-left');
	template.load('header');
}

/**
 * Create a new project
 *
 * @var {object} attributes
 *
 * @return void
 */
ProjectResolver.prototype.create = function(vars)
{

	var self = this;
	var project = Project.create(vars.attributes);
	var tmp_id = project.uid;
	App.get('team').projects.push(project);


	self.template();

	self.manager.create({
		params: vars.attributes,
		success: function(project) {

			App.get('team').getProjectBy('uid', tmp_id).fill(project);

			self.template();

			$('.modal').modal('hide');

			if (vars.success)
				vars.success();
		},
		error: function(response) {
			App.get('flash').error(response.message);

			if (vars.error)
				vars.error();
		},
	})

};

/**
 * Remove a project
 *
 * @param {integer} id
 *
 * @return void
 */
ProjectResolver.prototype.remove = function(id, vars)
{

	var self = this;

	App.get('team').removeProjectBy('id', id);
	
	self.template();

	self.manager.delete(
		id,
		{
			success: function() {
				self.template();

				if (App.get('route').name == 'project' && App.get('route').data.id == id) {
					App.get('router').navigate('/');
				}

				if (vars.success)
					vars.success();
			},
			error: function(response) {
				App.get('flash').error(response.message);

				if (vars.error)
					vars.error();
			},
		}
	)

};

/**
 * Update a project
 *
 * @param {integer} id
 * @param {object} attributes
 *
 * @return void
 */
ProjectResolver.prototype.update = function(id, vars)
{

	var self = this;

	App.get('team').getProjectById(id).fill(vars.attributes);

	self.template();

	self.manager.update(
		id,
		{
			params: vars.attributes,
			success: function(project) {

				App.get('team').getProjectById(project.id).fill(project);
				self.template();
				
				$('.modal').modal('hide');

				if (vars.success)
					vars.success();
			},
			error: function(response) {
				App.get('flash').error(response.message);
				self.template();

				if (vars.error)
					vars.error();
			},
		}
	)

}