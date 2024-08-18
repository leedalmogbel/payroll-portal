<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'emp_no',
        'fname',
        'mname',
        'lname',
        'gender',
        'location',
        'designation',
        'position',
        'position_category',
        'salary_grade',
        'daily_rate',
        'monthly_rate',
        'hazard_pay',
        'subs_allowance',
        'pera',
        'bank',
        'bank_account',
        'gsis_id',
        'sss',
        'pagibig',
        'philhealth',
        'tin_no',
        'date_hired',
        'start_date_cch',
        'years_service',
        'birthdate',
        'civil_status',
        'ed_attainment',
        'prc_no',
        'prc_valid_date',
        'board_rating',
        'csc_eligible',
        'contact_no',
        'address',
        'email',
        'active'
    ];
}
