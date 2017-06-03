var Team = function(attributes)
{


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

