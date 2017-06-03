var User = function(attributes)
{

	// Convert Array into Collection;
	attributes.projects = attributes.projects.map(function(project) {
		return new Project(project);
	});


	attributes.companies = attributes.companies.map(function(company) {
		return new Company(company);
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
 * @return {Company}
 */
User.prototype.getCompanyBy = function(name, value)
{
	return this.companies.getByAttribute(name, value);
}

/**
 * Get project by id
 *
 * @param {integer} id
 *
 * @return {Company}
 */
User.prototype.getCompanyById = function(id)
{
	return this.getCompanyBy('id', id);
};

/**
 * Remove a project by attribute and value
 *
 * @param {string} name
 * @param {mixed} value
 *
 * @return void
 */
User.prototype.removeCompanyBy = function(name, value)
{
	return this.companies.removeByAttribute(name, value);
};