<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNationalRegistriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('national_registries', function (Blueprint $table) {
            $table->id();
            $table->string('firstName')->nullable();
            $table->string('middleName')->nullable();
            $table->string('lastName')->nullable();
            $table->string('dateBirth')->nullable();
            $table->string('sex')->nullable();
            $table->string('identityId')->nullable();
            $table->string('isValidNID')->nullable();
            $table->string('fathersFirstName')->nullable();
            $table->string('fatherMiddleName')->nullable();
            $table->string('fatherLastName')->nullable();
            $table->string('mothersFirstName')->nullable();
            $table->string('motherMiddleName')->nullable();
            $table->string('motherLastName')->nullable();
            $table->string('natRegId')->nullable();
            $table->string('activeFlag')->nullable();
            $table->string('birthDistrict')->nullable();
            $table->string('birthTown')->nullable();
            $table->string('citizen')->nullable();
            $table->string('createdBy')->nullable();
            $table->string('createdDt')->nullable();
            $table->string('dbirth')->nullable();
            $table->string('dbirth2')->nullable();
            $table->string('fatherBirthDistrict')->nullable();
            $table->string('fatherBirthTown')->nullable();
            $table->string('fatherDateBirth')->nullable();
            $table->string('fatherIdentityId')->nullable();
            $table->string('fingerPrint')->nullable();
            $table->string('isAlreadyRegistered')->nullable();
            $table->string('Mig')->nullable();
            $table->string('issueDate')->nullable();
            $table->string('issuePlace')->nullable();
            $table->string('maritalStatus')->nullable();
            $table->string('motherBirthDistrict')->nullable();
            $table->string('motherBirthTown')->nullable();
            $table->string('motherDateBirth')->nullable();
            $table->string('motherIdentityId')->nullable();
            $table->string('photo')->nullable();
            $table->string('physicalAddress')->nullable();
            $table->string('pinNoforRegNIDMig')->nullable();
            $table->string('replicationDt')->nullable();
            $table->string('spouseBirthDistrict')->nullable();
            $table->string('spouseBirthTown')->nullable();
            $table->string('spouseDateBirth')->nullable();
            $table->string('spouseFirstName')->nullable();
            $table->string('spouseIdentityId')->nullable();
            $table->string('spouseLastName')->nullable();
            $table->string('spouseMiddleName')->nullable();
            $table->string('updatedBy')->nullable();
            $table->string('updatedDt')->nullable();
            $table->longText('meta')->nullable();
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
        Schema::dropIfExists('national_registries');
    }
}
