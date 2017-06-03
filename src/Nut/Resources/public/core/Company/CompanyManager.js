var CompanyManager = function(){



};

/**
 * Create a new project
 *
 * @param {object} vars
 *
 * @return void
 */
CompanyManager.prototype.create = function(vars)
{

	App.get('api').basicCall('POST', '/user/companies', {
		params: vars.params,
		success: function(response) {
			vars.success(new Company(response.data.resources));
		},
		error: vars.error,
	});

};


/**
 * Retrieve a project given id
 *
 * @param {integer} id
 * @param {object} vars
 *
 * @return void
 */
CompanyManager.prototype.get = function(id, vars)
{
    App.get('api').basicCall('GET', '/user/companies/'+id , {
        success: function(response) {
            vars.success(new Company(response.data.resources));
        },
        error: vars.error
    });
};


/**
 * Update a project
 *
 * @param {integer} id
 * @param {object} vars
 *
 * @return void
 */
CompanyManager.prototype.update = function(id, vars)
{

    App.get('api').basicCall('PUT', '/user/companies/'+id , {
        params: vars.params,
        success: function(response) {
            vars.success(new Company(response.data.resources));
        },
        error: vars.error,
    });

};

/**
 * Delete project given id
 *
 * @param {integer} id
 * @param {object} vars
 *
 * @return void
 */
CompanyManager.prototype.delete = function(id, vars)
{
    App.get('api').basicCall('DELETE', '/user/companies/'+id , {
        success: vars.success,
        error: vars.error
    });
};