<?php

namespace Core\Project;

use Railken\Laravel\Manager\ModelContract;
use Railken\Laravel\Manager\ModelManager;

use Core\Project\Project;

use Core\User\UserManager;
use Core\Company\CompanyManager;

class ProjectManager extends ModelManager
{

    /**
     * Construct
     */
    public function __construct()
    {
        $this->repository = new ProjectRepository();
        $this->serializer = new ProjectSerializer();
        parent::__construct();
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
        $params = $this->getOnlyParams($params, ['name', 'description', 'user', 'user_id', 'company', 'company_id']);

        if (isset($params['user']) || isset($params['user_id'])) {
            $this->vars['user'] = $this->fillManyToOneById($entity, new UserManager(), $params, 'user');
        }

        if (isset($params['company']) || isset($params['company_id'])) {
            $this->vars['company'] = $this->fillManyToOneById($entity, new CompanyManager(), $params, 'company');
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
        $entity->company()->associate($this->vars->get('company', $entity->company));

        $this->throwExceptionParamsNull([
            'name' => $entity->name,
            'user' => $entity->user,
            'company' => $entity->company
        ]);

        $this->throwExceptionAccessDenied('projects.save', $entity);

        return parent::save($entity);
    }


    /**
     * Remove a ModelContract
     *
     * @param Railken\Laravel\Manager\ModelContract $entity
     *
     * @return void
     */
    public function delete(ModelContract $entity)
    {

        return parent::delete($entity);
    }
}
