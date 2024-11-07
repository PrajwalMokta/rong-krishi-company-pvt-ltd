<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Request;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    static public function getAdmin(){
        $return = User::select('users.*');
        if(!empty(Request::get('name'))){
            $return = $return->where('name', '=', Request::get('name'));
        }
        if(!empty(Request::get('email'))){
            $return = $return->where('email', '=', Request::get('email'));
        }
        $return = $return->where('is_admin','=', 1)
        ->where('is_delete','=', 0)
        ->orderBy('id', 'asc')
        ->paginate(20);
        return $return;
    }

    static public function getSingle($id){
        return User::find($id);
    }

    static public function getMember(){
        $return = User::select('users.*');
        if(!empty(Request::get('name'))){
            $return = $return->where('name', '=', Request::get('name'));
        }
        if(!empty(Request::get('email'))){
            $return = $return->where('email', '=', Request::get('email'));
        }
        $return = $return->where('is_admin','=', 0)
        ->where('is_delete','=', 0)
        ->orderBy('id', 'asc')
        ->paginate(20);

        return $return;
    }

    static public function checkEmail($email){
        return User::select('users.*')
        ->where('email','=', $email)
        ->first();
    }
}
