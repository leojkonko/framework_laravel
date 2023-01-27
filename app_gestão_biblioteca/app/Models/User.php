<?php

namespace App\Models;

use App\Notifications\RedefinirSenhaNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Notifications\VerificarEmailNotification;
use App\Models\Tarefa;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sendPasswordResetNotification($token){
        //dd('sadna');
        $this->notify(new RedefinirSenhaNotification($token, $this->email, $this->name));
    }

    public function sendEmailVerificationNotification(){
        //dd('sadna');
        $this->notify(new VerificarEmailNotification($this->name));
    }

    public function tarefas(){
        return $this->hasMany('App\Models\Tarefa');
    }
   
}


