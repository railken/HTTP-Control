<?php

namespace Api\Http\Controllers\User;

use Api\Http\Controllers\RestController as Controller;
use Railken\Laravel\Manager\ModelContract;
use Core\Project\ProjectManager;

class ProjectsController extends Controller
{

    /**
     * Construct
     *
     * @param ProjectManager $manager
     */
    public function __construct(ProjectManager $manager)
    {
        $this->manager = $manager;
    }
}
