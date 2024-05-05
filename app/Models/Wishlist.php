<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Wishlist extends Model
{
    protected $table = 'wishlist'; // Explicitly define the table if not using Laravel's naming convention

    // If your wishlist table has additional columns apart from user_id and offre_stage_id, list them here
    protected $fillable = [
        'user_id',
        'offre_stage_id',
        // Add other fields here
    ];

    // Define relationships if necessary, for example:
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function offreStage()
    {
        return $this->belongsTo(OffreStage::class);
    }

    // Add other model methods and properties as needed
}
