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
			'uid' => $entity->uid,
			'name' => $entity->name,
			'description' => $entity->description,
            'avatar' => $entity->avatar ? \Storage::url($entity->avatar)."?=".\Storage::lastModified($entity->avatar) : null,
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
