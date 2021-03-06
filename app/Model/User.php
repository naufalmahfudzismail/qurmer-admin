<?php

namespace App\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Concerns\HasAttributes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{

    use HasApiTokens, Notifiable, EntrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama', 'email', 'password', 'tanggal_lahir', 'alamat', 'pekerjaan', 'gender', 'username'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $guarded = [
        'id',
	    'created_at',
	    'updated_at'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function history(){
        return $this->hasMany('App\Model\History');
    }

    public function task(){
        return $this->hasMany('App\Model\Task');
    }

    public function progress(){
        return $this->hasMany('App\Model\Progress');
    }

    public function playlist(){
        return $this->hasMany('App\Model\Playlist');
    }

    public function score(){
        return $this->hasOne('App\Model\Score');
    }
}
