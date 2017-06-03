var TeamManager = function(){



};

/**
 * Create a new project
 *
 * @param {object} vars
 *
 * @return void
 */
TeamManager.prototype.create = function(vars)
{

	App.get('api').basicCall('POST', '/user/teams', {
		params: vars.params,
		success: function(response) {
			vars.success(new Team(response.data.resources));
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
TeamManager.prototype.get = function(id, vars)
{
    App.get('api').basicCall('GET', '/user/teams/'+id , {
        success: function(response) {
            vars.success(new Team(response.data.resources));
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
TeamManager.prototype.update = function(id, vars)
{

    App.get('api').basicCall('PUT', '/user/teams/'+id , {
        params: vars.params,
        success: function(response) {
            vars.success(new Team(response.data.resources));
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
TeamManager.prototype.delete = function(id, vars)
{
    App.get('api').basicCall('DELETE', '/user/teams/'+id , {
        success: vars.success,
        error: vars.error
    });
};