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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('emp_no')->nullable()->unique()->index();
            $table->string('fname')->nullable()->index();
            $table->string('mname')->nullable()->index();
            $table->string('lname')->nullable()->index();
            $table->string('gender')->nullable();
            $table->string('location')->nullable()->index();
            $table->string('designation')->nullable()->index();
            $table->string('position')->nullable()->index();
            $table->string('position_category')->nullable()->index();
            $table->string('salary_grade')->nullable();
            $table->string('daily_rate')->nullable();
            $table->string('monthly_rate')->nullable();
            $table->string('hazard_pay')->nullable();
            $table->string('subs_allowance')->nullable();
            $table->string('pera')->nullable();
            $table->string('bank')->nullable();
            $table->string('bank_account')->nullable();
            $table->string('gsis_id')->nullable()->index();
            $table->string('sss')->nullable()->index();
            $table->string('pagibig')->nullable()->index();
            $table->string('philhealth')->nullable()->index();
            $table->string('tin_no')->nullable()->index();
            $table->date('date_hired')->nullable()->index();
            $table->string('start_date_cch')->nullable();
            $table->string('years_service')->nullable();
            $table->date('birthdate')->nullable();
            $table->string('civil_status')->nullable();
            $table->string('ed_attainment')->nullable();
            $table->string('prc_no')->nullable();
            $table->date('prc_valid_date')->nullable();
            $table->string('board_rating')->nullable();
            $table->string('csc_eligible')->nullable();
            $table->string('contact_no')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->nullable();
            $table->boolean('active')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
