<?php

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
        Schema::create('templates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('nom');
            $table->string('prenom');
            $table->string('description');
            $table->float('prix');
            $table->string('statut');
            $table->string('categorie');
            $table->string('langage');
            $table->timestamps();
            $table->integer('telechargement')->default(0);
            $table->float('note',3,2)->nullable();
            $table->string('image')->nullable();
            $table->string('dossier')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('templates');
        
    }
};
