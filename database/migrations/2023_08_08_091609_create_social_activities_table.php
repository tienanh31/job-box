<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('social_activities', function (Blueprint $table) {
            $table->id();
            $table->string('organization');
            $table->string('position');
            $table->date('start_at')->nullable();
            $table->date('end_at')->nullable();
            $table->longText('description');
            $table->foreignId('student_id');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('social_activities');
    }
};
