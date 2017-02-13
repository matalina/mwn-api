<?php

namespace App\Notebook;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable 
{
    use Notifiable;

    protected $guarded = ['id'];
    
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function isSelf(Model $model, $name = 'user_id')
    {
        if($model->{$name} === $this->attributes['id']) {
            return true;
        }
        
        return false;
    }
    
    public function isOwner()
    {
        return $this->attributes['is_owner'];
    }
}
