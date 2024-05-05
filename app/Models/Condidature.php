<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Condidature extends Model
{
    use HasFactory;

    protected $table = 'condidature';

    // Fillable fields for mass assignment
    protected $fillable = [
        'user_id',
        'offre_stage_id',
        'cv_path',
        'lettre_de_motivation',
        'date_de_soumission',
        'etat',
        // other fields as necessary
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the job offer (OffreStage) that the Condidature is for.
     */
    public function offreStage()
    {
        return $this->belongsTo(OffreStage::class, 'offre_stage_id');
    }

    /**
     * Add any additional methods you need for business logic related to applications.
     */

    // For example, a method to check the application's status:
    public function isAccepted()
    {
        return $this->etat === 'accepted';
    }
    public function isRejected()
    {
        return $this->etat === 'rejected';
    }
}
