<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accessions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('accession_no_from', 100);
            $table->string('accession_no_to', 100);
            $table->integer('total_number_of_object');
            $table->timestamp('collection_date')->nullable();
            $table->string('file_no', 100);
            $table->string('made_of_collection', 100);
            $table->float('input_price');
            $table->float('insurance_value')->nullable();
            $table->text('description_of_object')->nullable();
            $table->integer('classification_of_object')->unsigned();
            $table->string('measurement')->nullable();
            $table->text('provenance_and_acquisition_history')->nullable();
            $table->string('period', 100)->nullable();
            $table->string('Personal_info', 100)->nullable();
            $table->string('propsed_price', 100)->nullable();
            $table->string('branch_museum', 100)->nullable();
            $table->boolean('status')->default(false);
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
        Schema::dropIfExists('accessions');
    }
}
