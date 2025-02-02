<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

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

    /**
     * Get the todos the user created.
     * See https://laravel.com/docs/8.x/eloquent-relationships#one-to-many
     */
    public function accounts()
    {
        return $this->hasMany(Account::class);
    }

    /**
     * Get the todos the user assigned to.
     * See https://laravel.com/docs/8.x/eloquent-relationships#many-to-many
     */
    public function accounts_assigned()
    {
        return $this->belongsToMany(Account::class);
    }
}
