<?php

namespace Core\Project;

use Railken\Laravel\Manager\ModelRepository;

class ProjectRepository extends ModelRepository
{

    /**
     * Class name entity
     *
     * @var string
     */
    public $entity = Project::class;

    /**
     * Generate a unique uid
     *
     * @return string
     */
    public function generateUID()
    {
    	do {
    		$uid = sha1(microtime());
    	} while ($this->getQuery()->where('uid', $uid)->count());

    	return $uid;
    }
}
