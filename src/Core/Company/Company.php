<?php

namespace Core\Company;

use Illuminate\Database\Eloquent\Model;
use Railken\Laravel\Manager\ModelContract;
use Illuminate\Database\Eloquent\SoftDeletes;

use Core\User\User;

class Company extends Model implements ModelContract
{
	use SoftDeletes;

	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'companies';

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
	protected $fillable = ['name', 'description', 'user_id'];

    /**
     * User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function getUser()
    {
        return $this->user;
    }
}