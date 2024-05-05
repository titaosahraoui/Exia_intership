<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entreprise extends Model
{
    use HasFactory;

    protected $table = 'entreprises';
    protected $primarykey = 'id';
    protected $fillable = ['name', 'secteur', 'address', 'contact', 'description', 'photo'];

    public function offreStages()
    {
        return $this->hasMany(OffreStage::class);
    }
    public function givenEvaluations()
    {
        return $this->morphMany(Evaluation::class, 'evaluator');
    }

    public function evaluations()
    {
        return $this->hasMany(Evaluation::class, 'enterprise_id');
    }

    public function receivedEvaluations()
    {
        return $this->morphMany(Evaluation::class, 'evaluated');
    }
}
