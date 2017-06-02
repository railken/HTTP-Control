<?php

namespace Core\Project;

class ProjectSerializer
{
    public function serialize(Project $project)
    {

        return [
            'id' => $project->id,
            'name' => $project->name,
            'description' => $project->description,
        ];
    }
}
