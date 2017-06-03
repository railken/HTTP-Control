var TeamResolver = function()
{	

	this.manager = new TeamManager();
};

/**
 * Reload template
 *
 * @return void
 */
TeamResolver.prototype.template = function()
{

	template.load('side-left');
	template.load('header');
}

/**
 * Create a new team
 *
 * @var {object} attributes
 *
 * @return void
 */
TeamResolver.prototype.create = function(vars)
{

	var self = this;
	var team = Team.create(vars.attributes);
	var tmp_id = team.uid;
	App.get('user').teams.push(team);

	self.template();
	self.manager.create({
		params: vars.attributes,
		success: function(team) {

			App.get('user').getTeamBy('uid', tmp_id).fill(team);
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
 * Remove a team
 *
 * @param {integer} id
 *
 * @return void
 */
TeamResolver.prototype.remove = function(id, vars)
{

	var self = this;

	App.get('user').removeTeamBy('id', id);
	
	self.template();


	self.manager.delete(
		id,
		{
			success: function() {

				if (App.get('route').name == 'team' && App.get('route').data.id == id) {


					App.set('team', null);
					self.template();
					App.get('router').navigate('/');
				}

				if (vars.success)
					vars.success();


				self.template();
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
 * Update a team
 *
 * @param {integer} id
 * @param {object} attributes
 *
 * @return void
 */
TeamResolver.prototype.update = function(id, vars)
{

	var self = this;

	App.get('user').getTeamById(id).fill(vars.attributes);

	self.template();

	self.manager.update(
		id,
		{
			params: vars.attributes,
			success: function(team) {

				App.get('user').getTeamById(team.id).fill(team);
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