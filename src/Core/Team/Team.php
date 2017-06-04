<?php

namespace Core\Team;

use Illuminate\Database\Eloquent\Model;
use Railken\Laravel\Manager\ModelContract;
use Illuminate\Database\Eloquent\SoftDeletes;
use Railken\Laravel\Manager\Permission\ResourceContract;

use Core\User\User;
use Core\Project\Project;

class Team extends Model implements ModelContract,  ResourceContract
{
	use SoftDeletes;

	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'teams';

	/**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['uid', 'name', 'description', 'user_id', 'avatar'];



    /**
     * User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    /**
     * Retrieve projects
     */
    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    /**
     * Retrieve the user
     *
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }
}