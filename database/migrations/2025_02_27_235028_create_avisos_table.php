<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use League\CommonMark\Extension\CommonMark\Renderer\Block\BlockQuoteRenderer;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('avisos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 20);
            $table->text('descricao');
            $table->string('link', 500)->nullable();
            //$table->text('palavras_chave')->nullable()->comment('Palavras para categorização dos avisos.');

            // $table->foreignId('id_usuario')->references('id', 'fk_avisos_usuarios')->on('usuarios');
            // $table->foreignId('id_usuario')->references('id')->on('usuarios');
            // $table->foreignId('id_usuario')->constrained('usuarios', 'id', 'fk_avisos_usuarios');

            $table->foreignId('id_usuario')->constrained('usuarios', 'id');


            // $table->timestamps(); // created_at || updated_at
            $table->timestamp('data_cadastro')->useCurrent();
            $table->timestamp('data_edicao')->useCurrent()->useCurrentOnUpdate();
        });

        // Schema::table('avisos', function(Blueprint $table){
        //     $table->renameColumn('created_at', 'data_cadastro');
        //     $table->renameColumn('updated_at', 'data_edicao');
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('avisos', function(Blueprint $table){
            // $table->dropForeign('fk_avisos_usuarios');
            $table->dropForeign(['id_usuario']);
        });

        Schema::dropIfExists('avisos');
    }
};
