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

}
