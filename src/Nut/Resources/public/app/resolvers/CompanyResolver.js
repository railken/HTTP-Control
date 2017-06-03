var CompanyResolver = function()
{	

	this.manager = new CompanyManager();
};

/**
 * Reload template
 *
 * @return void
 */
CompanyResolver.prototype.template = function()
{

	template.load('side-left');
	template.load('header');
}

/**
 * Create a new company
 *
 * @var {object} attributes
 *
 * @return void
 */
CompanyResolver.prototype.create = function(vars)
{

	var self = this;
	var company = Company.create(vars.attributes);
	var tmp_id = company.uid;
	App.get('user').companies.push(company);

	self.template();
	self.manager.create({
		params: vars.attributes,
		success: function(company) {

			App.get('user').getCompanyBy('uid', tmp_id).fill(company);
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
 * Remove a company
 *
 * @param {integer} id
 *
 * @return void
 */
CompanyResolver.prototype.remove = function(id, vars)
{

	var self = this;

	App.get('user').removeCompanyBy('id', id);
	
	self.template();

	self.manager.delete(
		id,
		{
			success: function() {
				self.template();

				if (App.get('route').name == 'company' && App.get('route').data.id == id) {
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
 * Update a company
 *
 * @param {integer} id
 * @param {object} attributes
 *
 * @return void
 */
CompanyResolver.prototype.update = function(id, attributes)
{

	var self = this;

	App.get('user').getCompanyById(id).fill(attributes);

	self.template();

	self.manager.update(
		id,
		{
			params: attributes,
			success: function(company) {

				App.get('user').getCompanyById(company.id).fill(company);
				self.template();
				
				$('.modal').modal('hide');
			},
			error: function(response) {
				App.get('flash').error(response.message);
				self.template();
			},
		}
	)

}