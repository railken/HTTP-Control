var Team = function(attributes)
{


	attributes.projects = attributes.projects.map(function(project) {
		return new Project(project);
	});

	this.fill(attributes);

};


Team.prototype = Object.create(Entity.prototype);
Team.prototype.constructor = Team;

/**
 * Create a new instance of project
 *
 * @param {object} attributes
 *
 * @return {Team}
 */
Team.create = function(attributes)
{
	var project = new Team({id: null, name: name});

	project.uid = uid();
	project.fill(attributes);

	return project;
}

/**
 * Find a project by attribute and value
 *
 * @param {string} name
 * @param {mixed} value
 *
 * @return {Project}
 */
Team.prototype.getProjectBy = function(name, value)
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
Team.prototype.getProjectById = function(id)
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
Team.prototype.removeProjectBy = function(name, value)
{
	return this.projects.removeByAttribute(name, value);
};