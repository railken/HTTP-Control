<?php

namespace Core\Permission;

use Railken\Laravel\Manager\Permission\Agent;
use Railken\Laravel\Manager\ModelContract;

class SystemAgent extends Agent
{

	protected $permissions = [
		'*'
	];

	/**
	 * Retrieve true/false given a permission and resource
	 *
	 * @param string $permission
	 * @param ModelResource $resource
	 *
	 * @return boolean
	 */
	public function can($permission, ModelContract $resource) {

	

		return parent::can($permission, $resource);
	}
}