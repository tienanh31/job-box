<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('description');
            $table->string('experience');
            $table->string('position');
            $table->bigInteger('vacancy');
            $table->date('deadline_for_filing');
            $table->string('type');
            $table->bigInteger('min_salary')->nullable();
            $table->bigInteger('max_salary')->nullable();
            $table->string('status')->default('hide');
            $table->softDeletes();
            $table->foreignId('company_id');
            $table->foreignId('category_id');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
