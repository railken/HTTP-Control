<?php

namespace Api\Http\Controllers\User;

use Api\Http\Controllers\RestController as Controller;
use Railken\Laravel\Manager\ModelContract;
use Core\Team\TeamManager;

class CompaniesController extends Controller
{

    /**
     * Construct
     *
     * @param TeamManager $manager
     */
    public function __construct(TeamManager $manager)
    {
        $this->manager = $manager;
    }
}
