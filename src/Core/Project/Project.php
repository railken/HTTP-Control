<?php

namespace Core\Project;

use Illuminate\Database\Eloquent\Model;
use Railken\Laravel\Manager\ModelContract;
use Railken\Laravel\Manager\Permission\ResourceContract;
use Illuminate\Database\Eloquent\SoftDeletes;

use Core\User\User;
use Core\Team\Team;

class Project extends Model implements ModelContract, ResourceContract
{

    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'projects';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['uid', 'name', 'description', 'user_id', 'team_id', 'avatar'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * User
     */
    public function team()
    {
        return $this->belongsTo(Team::class);
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
