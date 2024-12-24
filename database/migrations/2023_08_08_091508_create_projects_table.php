<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('customer');
            $table->integer('number_of_members');
            $table->string('position');
            $table->string('technology');
            $table->date('start_at')->nullable();
            $table->date('end_at')->nullable();
            $table->longText('description')->nullable();
            $table->foreignId('student_id');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
