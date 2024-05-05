<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OffreStage extends Model
{
    use HasFactory;

    protected $fillable = ['titre', 'competance', 'description', 'date_debut', 'duree', 'entreprise_id'];



    public function condidatures()
    {
        return $this->hasMany(Condidature::class);
    }
    public function offreStage()
    {
        return $this->belongsTo(OffreStage::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function wishlistingUsers()
    {
        return $this->belongsToMany(User::class, 'wishlist');
    }

    // public function competences()
    // {
    //     return $this->belongsToMany(Competence::class, 'nécessite');
    // }
}
