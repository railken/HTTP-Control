var Company = function(attributes)
{


	this.fill(attributes);

};


Company.prototype = Object.create(Entity.prototype);
Company.prototype.constructor = Company;

/**
 * Create a new instance of project
 *
 * @param {object} attributes
 *
 * @return {Company}
 */
Company.create = function(attributes)
{
	var project = new Company({id: null, name: name});

	project.uid = uid();
	project.fill(attributes);

	return project;
}

