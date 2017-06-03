var User = function(attributes)
{

	// Convert Array into Collection;
	attributes.projects = attributes.projects.map(function(project) {
		return new Project(project);
	});


	attributes.teams = attributes.teams.map(function(team) {
		return new Team(team);
	});

	this.fill(attributes);

};

User.prototype = Object.create(Entity.prototype);
User.prototype.constructor = User;


/**
 * Find a project by attribute and value
 *
 * @param {string} name
 * @param {mixed} value
 *
 * @return {Project}
 */
User.prototype.getProjectBy = function(name, value)
{
	return this.projects.getByAttribute(name, value);
}

/**
 * Get project by id
 *
 * @param {integer} id
 *
 * @return {Project}
 */
User.prototype.getProjectById = function(id)
{
	return this.getProjectBy('id', id);
};

/**
 * Remove a project by attribute and value
 *
 * @param {string} name
 * @param {mixed} value
 *
 * @return void
 */
User.prototype.removeProjectBy = function(name, value)
{
	return this.projects.removeByAttribute(name, value);
};

/**
 * Find a project by attribute and value
 *
 * @param {string} name
 * @param {mixed} value
 *
 * @return {Team}
 */
User.prototype.getTeamBy = function(name, value)
{
	return this.teams.getByAttribute(name, value);
}

/**
 * Get project by id
 *
 * @param {integer} id
 *
 * @return {Team}
 */
User.prototype.getTeamById = function(id)
{
	return this.getTeamBy('id', id);
};

/**
 * Remove a project by attribute and value
 *
 * @param {string} name
 * @param {mixed} value
 *
 * @return void
 */
User.prototype.removeTeamBy = function(name, value)
{
	return this.teams.removeByAttribute(name, value);
};