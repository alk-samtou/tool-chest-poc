<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('added_by_user');
            $table->uuid('document_category_id')->nullable();
            $table->tinyInteger('document_permission')->default(0);
            $table->string('password')->nullable();
            $table->string('title');
            $table->string('description')->nullable();
            $table->string('original_file_name')->nullable();
            $table->string('file_name')->nullable();
            $table->string('file_path')->nullable();
            $table->tinyInteger('is_featured')->default(0);
            $table->tinyInteger('is_hidden')->default(0);
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
        Schema::dropIfExists('documents');
    }
}
