<?php
 
namespace App;
 
use Illuminate\Database\Eloquent\Model;
 
class Permission extends \Spatie\Permission\Models\Permission
{
    public function setNameAttribute($value)
    {
     $this->attributes['name'] = ucwords($value);
    }
    public static function defaultPermissions()
    {
        return [           
            'View Post',
            'Add Post',
            'Edit Post',
            'Delete Post',
        ];
    }
}