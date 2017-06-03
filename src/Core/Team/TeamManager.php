<?php

namespace Core\Team;

use Railken\Laravel\Manager\ModelContract;
use Railken\Laravel\Manager\ModelManager;
use Railken\Laravel\Manager\Permission\AgentContract;

use Core\Team\Team;
use Core\User\UserManager;

class TeamManager extends ModelManager
{

	/**
	 * Construct
	 */
	public function __construct(AgentContract $agent = null)
	{
		$this->repository = new TeamRepository($this);
		$this->serializer = new TeamSerializer($this);

		parent::__construct($agent);
	}

	/**
	 * Fill the entity
	 *
	 * @param ModelContract $entity
	 * @param array $params
	 *
	 * @return ModelContract
	 */
	public function fill(ModelContract $entity, array $params)
	{

		$params = $this->getOnlyParams($params, ['name', 'description', 'user', 'user_id']);

        if (isset($params['user']) || isset($params['user_id'])) {
            $this->vars['user'] = $this->fillManyToOneById($entity, new UserManager(), $params, 'user');
        }

		$entity->fill($params);

		return $entity;

	}

	/**
	 * This will prevent from saving entity with null value
	 *
	 * @param ModelContract $entity
	 *
	 * @return ModelContract
	 */
	public function save(ModelContract $entity)
	{
        $entity->user()->associate($this->vars->get('user', $entity->user));

		$this->throwExceptionParamsNull([
			'name' => $entity->name,
		]);

        $this->throwExceptionAccessDenied('team.save', $entity);

		return parent::save($entity);
	}


}
