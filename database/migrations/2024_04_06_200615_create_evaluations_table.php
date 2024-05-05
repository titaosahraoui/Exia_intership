<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluationsTable extends Migration
{
    public function up()
    {
        Schema::create('evaluations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('evaluator_id'); // The one who gives the evaluation
            $table->string('evaluator_type'); // 'user' or 'enterprise' to identify the evaluator's type
            $table->unsignedBigInteger('evaluatable_id'); // Polymorphic relation: The one who receives the evaluation
            $table->string('evaluatable_type'); // Polymorphic relation: 'user' or 'enterprise' to identify the evaluated entity's type
            $table->float('rating');
            $table->text('comment')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('evaluations');
    }
}
