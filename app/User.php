<?php

namespace Otman;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

/**
 * @uses    \Illuminate\Database\Eloquent\Model
 * @package Otman
 * @author  Mahendra Rai
 */
class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['email', 'password', 'role', 'manager_id'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * @return \Otman\UserProfile
     */
    public function profile()
    {
        return $this->hasOne('Otman\UserProfile');
    }

    /**
     * @return \Otman\Overtime
     */
    public function overtimes()
    {
        return $this->hasMany('Otman\Overtime');
    }

    /**
     * @return \Otman\User
     */
    public function getManager()
    {
        return static::find($this->manager_id);
    }
}
