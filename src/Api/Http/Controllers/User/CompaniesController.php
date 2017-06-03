<?php

namespace Api\Http\Controllers\User;

use Api\Http\Controllers\RestController as Controller;
use Railken\Laravel\Manager\ModelContract;
use Core\Company\CompanyManager;

class CompaniesController extends Controller
{

    /**
     * Construct
     *
     * @param CompanyManager $manager
     */
    public function __construct(CompanyManager $manager)
    {
        $this->manager = $manager;
    }
}
