<?php

namespace Core\Permission;

use Railken\Laravel\Manager\Permission\Agent;
use Railken\Laravel\Manager\Permission\ResourceContract;

class UserAgent extends Agent
{

	/**
	 * List of all permissions.
	 *
	 * @var array
	 */
	protected $permissions = [
		'profile.*|o',
		'project.*|o',
		'company.*|o'
	];

	/**
	 * Retrieve true/false given a permission and resource
	 *
	 * @param string $permission
	 * @param ModelResource $resource
	 *
	 * @return boolean
	 */
	public function can($permission, ResourceContract $resource) {
		return parent::can($permission, $resource);
	}
}