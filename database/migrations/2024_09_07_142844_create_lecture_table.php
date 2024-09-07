<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('lecture', function (Blueprint $table) {
            $table->id();
            $table->string("titre_1");
            $table->string("description_1");
            $table->string("titre_2");
            $table->string("description_2");
            $table->string("titre_3");
            $table->string("description_3");
            $table->string("meditation");
            $table->date("date");
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lecture');
    }
};
