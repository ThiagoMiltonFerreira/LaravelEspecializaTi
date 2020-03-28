<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() //criar tabela
    {
         Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 150);
            $table->integer('number');
            $table->boolean('active');
            $table->string('image', 200)->nullable(); // campo nao pode ser nulo
            $table->enum('ctegory', ['eletronicos','moveis','limpeza','banho']);
            $table->text('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() //deletar tabela
    {
        Schema::drop('products');
    }
}
