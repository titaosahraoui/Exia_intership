<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\OffreStage;
use App\Models\Wishlist;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', 'prenom', 'email', 'password', 'role', 'photo', "promotion",
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

    /**
     * Get the user's full name.
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        return $this->prenom . ' ' . $this->nom;
    }

    /**
     * Determine if the user has a specific role.
     *
     * @param  string  $role
     * @return bool
     */
    public function hasRole($role)
    {
        return $this->role === $role;
    }
    public function givenEvaluations()
    {
        return $this->morphMany(Evaluation::class, 'evaluator');
    }

    public function receivedEvaluations()
    {
        return $this->morphMany(Evaluation::class, 'evaluated');
    }
    // Inside your User model

    // In User model
    public function wishlistedOffres()
    {
        return $this->belongsToMany(OffreStage::class, 'wishlist')
            ->using(Wishlist::class);
    }
}
