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
        Schema::create('edit_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('article_id')->nullable();
            $table->text('network_name')->nullable();
            $table->text('paper_title')->nullable();
            $table->text('categories')->nullable();
            $table->text('tags')->nullable();
            $table->text('year')->nullable();
            $table->text('paper_doi')->nullable();
            $table->text('link_to_paper')->nullable();
            $table->text('authors')->nullable();
            $table->text('google_scholar')->nullable();
            $table->text('bibtex')->nullable();
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
        Schema::dropIfExists('edit_requests');
    }
};
