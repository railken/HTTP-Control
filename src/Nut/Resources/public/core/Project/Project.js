var Project = function(attributes)
{


	this.fill(attributes);

};


Project.prototype = Object.create(Entity.prototype);
Project.prototype.constructor = Project;

/**
 * Create a new instance of project
 *
 * @param {object} attributes
 *
 * @return {Project}
 */
Project.create = function(attributes)
{
	var project = new Project({id: null, name: name});

	project.uid = uid();
	project.fill(attributes);

	return project;
}

