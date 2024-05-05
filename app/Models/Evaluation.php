<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    protected $fillable = [
        'evaluator_id',
        'evaluated_id',
        'evaluator_type',
        'evaluated_type', // Add this line
        'rating',
        'comment'
    ];

    // Polymorphic relation to handle both users and enterprises
    public function evaluator()
    {
        return $this->morphTo();
    }

    public function evaluated()
    {
        return $this->morphTo();
    }
}
