<?php

namespace Core\Project;

use Railken\Laravel\Manager\ModelContract;
use Railken\Laravel\Manager\ModelManager;

use Core\Project\Project;

use Core\User\UserManager;
use Core\Team\TeamManager;

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
        $params = $this->getOnlyParams($params, ['name', 'description', 'user', 'user_id', 'team', 'team_id', 'avatar']);

        if (isset($params['user']) || isset($params['user_id'])) {
            $this->vars['user'] = $this->fillManyToOneById($entity, new UserManager(), $params, 'user');
        }

        if (isset($params['team']) || isset($params['team_id'])) {
            $this->vars['team'] = $this->fillManyToOneById($entity, new TeamManager(), $params, 'team');
        }

        if (isset($params['avatar'])) {
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
        $this->throwExceptionAccessDenied('team.show', $entity->team);
        $this->throwExceptionAccessDenied('project.save', $entity);

        $entity->user()->associate($this->vars->get('user', $entity->user));
        $entity->team()->associate($this->vars->get('team', $entity->team));

        $this->throwExceptionParamsNull([
            'name' => $entity->name,
            'user' => $entity->user,
            'team' => $entity->team
        ]);


        if ($this->vars->get('avatar')) {
            $filename = $entity->uid.'.'.$this->vars->get('avatar')->guessExtension();
            $this->vars->get('avatar')->storeAs('project', $filename);
            $filename = 'project/'.$filename;
            $entity->avatar = $filename;
        }

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
