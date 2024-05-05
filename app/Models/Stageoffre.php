<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Schema\Blueprint;
// use Illuminate\Support\Facades\Schema;


class Stageoffre extends Model
{
    protected $table = 'Stageoffre';
    protected $primarykey = 'id';
    protected $filable = ['Titre','Description','Date_Debut','duree'];

    use HasFactory;
}
