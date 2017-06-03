<?php

namespace Core\User;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Railken\Laravel\Manager\ModelContract;

use Core\Project\Project;
use Core\Company\Company;
use Railken\Laravel\Manager\Permission\UserContract;

class User extends Authenticatable implements ModelContract, UserContract
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'name', 'email', 'password', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Retrieve projects
     */
    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    /**
     * Retrieve companies
     */
    public function companies()
    {
        return $this->hasMany(Company::class);
    }

    public function getIdentifier()
    {
        return $this->id;
    }
}
