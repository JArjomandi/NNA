<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('network_name')->nullable();
            $table->text('categories')->nullable();
            $table->text('paper_title')->nullable();
            $table->text('authors')->nullable();
            $table->text('tags')->nullable();
            $table->string('year')->nullable();
            $table->text('paper_doi')->nullable();
            $table->text('link_to_paper')->nullable();
            $table->text('google_scholar')->nullable();
            $table->text('conference')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
};
