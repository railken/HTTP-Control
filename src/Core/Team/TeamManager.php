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
     * Create a new ModelContract given array
     *
     * @param array $params
     *
     * @return Railken\Laravel\Manager\ModelContract
     */
    public function create(array $params)
    {     
        $entity = $this->getRepository()->newEntity();
        $entity->uid = $this->getRepository()->generateUID();
        return $this->update($entity, $params);

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

		$params = $this->getOnlyParams($params, ['name', 'description', 'user', 'user_id', 'avatar']);

        if (isset($params['user']) || isset($params['user_id'])) {
            $this->vars['user'] = $this->fillManyToOneById($entity, new UserManager(), $params, 'user');
        }

        if (!empty($params['avatar'])) {
            $this->vars['avatar'] = $this->base64ToUploadedFile($params['avatar']);
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

        if ($this->vars->get('avatar')) {
        	$filename = $entity->uid.'.'.$this->vars->get('avatar')->guessExtension();
            $this->vars->get('avatar')->storeAs('teams', $filename);
            $filename = 'teams/'.$filename;
            $entity->avatar = $filename;
        }

        $this->throwExceptionAccessDenied('team.save', $entity);

		return parent::save($entity);
	}


}
