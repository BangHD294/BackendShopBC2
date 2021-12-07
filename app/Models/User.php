<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles(){
        return $this->belongsToMany(Role::class, 'role_user','user_id','role_id');
    }
    public function checkPermissionAccess($pemissionCheck){
        //b1 lay cac quyen cua user trong he thong
        //b2 so sanh gia tri dua vao cua  router hien tai xem co ton tai trong cac quyen ma minh lay duoc hay khong

        $roles = auth()->user()->roles;
        foreach ($roles as $rolesItem){
            $permission = $rolesItem->permissions;
            if ($permission->contains('key_code', $pemissionCheck)){
                return true;
            }
        }
        return false;
    }
}
