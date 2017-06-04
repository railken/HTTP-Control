<?php

namespace Core\Team;

use Railken\Laravel\Manager\ModelRepository;

class TeamRepository extends ModelRepository
{

	/**
	 * Class name entity
	 *
	 * @var string
	 */
	public $entity = Team::class;

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
