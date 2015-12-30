<?php
namespace Otman;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    const ROLE_ADMIN = 'admin';

    const ROLE_USER = 'user';

    /**
     * @var string
     */
    protected $table = 'user_profile';

    /**
     * @var array
     */
    protected $fillable = array(
        'salutation',
        'firstname',
        'lastname', 
        'job_title',
        'profile_image'
    );
}