<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_orders', function (Blueprint $table) {
            $table->id();
            $table->string('name_req');
            $table->enum('dept',['HRGA','PRODUKSI','RND-QC','FIN-ACC','SALES-MARKETING','PURCHASING','WAREHOUSE-PPIC','IT','COO-OFFICE']);
            $table->enum('priority',['Normal','Urgent','Safety']);
            $table->string('name_receipt');
            $table->string('issue');
            $table->string('action');
            $table->string('status');
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
        Schema::dropIfExists('work_orders');
    }
}
