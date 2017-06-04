<?php

namespace Core\Project;

class ProjectSerializer
{
    public function serialize(Project $entity)
    {

        return [
            'id' => $entity->id,
            'uid' => $entity->uid,
            'name' => $entity->name,
            'avatar' => \Storage::url($entity->avatar)."?=".\Storage::lastModified($entity->avatar),
            'description' => $entity->description,
        ];
    }
}
