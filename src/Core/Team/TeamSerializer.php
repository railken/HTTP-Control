<?php

namespace Core\Team;

use Railken\Laravel\Manager\ModelSerializer;
use Railken\Laravel\Manager\ModelContract;
use Core\Project\ProjectManager;

class TeamSerializer extends ModelSerializer
{

	/**
	 * Serialize entity
	 *
	 * @param ModelContract $entity
	 *
	 * @return array
	 */
	public function serialize(ModelContract $entity)
	{
		return [
			'id' => $entity->id,
			'name' => $entity->name,
			'description' => $entity->description,
            'projects' => $this->projects($entity->projects),
		];
	}


    public function projects($projects)
    {
        $serializer = (new ProjectManager)->serializer;

        return $projects->map(function ($project) use ($serializer) {
            return $serializer->serialize($project);
        });
    }

}
