<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangePermissions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $permissionsTable = config('acl.tables.permissions', 'permissions');
        Schema::table($permissionsTable, function (Blueprint $table) {
            $table->integer('id_modulo')->nullable();
            $table->string('icone')->nullable();
            $table->enum('visable', [1, 0])->default(0);
            $table->foreign('id_modulo')
                ->references('id')
                ->on('modulos')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
