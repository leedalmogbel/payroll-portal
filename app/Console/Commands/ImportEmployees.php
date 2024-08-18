<?php

namespace App\Console\Commands;
use App\Models\Employee;
use Carbon\Carbon;

use Illuminate\Console\Command;

class ImportEmployees extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:employees {file}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import employees from a CSV file';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $file = $this->argument('file');
        $csv = array_map('str_getcsv', file($file));
        $header = array_map('strtolower', array_shift($csv)); // Convert header to lowercase

        foreach ($csv as $row) {
            $data = array_combine($header, $row);

            Employee::updateOrCreate(
                ['emp_no' => $data['emp no']],
                [
                    'fname' => $data['first name'] ?? '',
                    'mname' => $data['middle name'] ?? '',
                    'lname' => $data['last name'] ?? '',
                    'gender' => $data['gender'] ?? '',
                    'location' => $data['location'] ?? '',
                    'designation' => $data['designation'] ?? '',
                    'position' => $data['item'] ?? '',
                    'position_category' => $data['category'] ?? '',
                    'salary_grade' => $data['salary_grade'] ?? '',
                    'daily_rate' => $data['daily_rate'] ?? '',
                    'monthly_rate' => $data['monthly_rate'] ?? '',
                    'hazard_pay' => $data['hazard_pay'] ?? '',
                    'subs_allowance' => $data['subs_allowance'] ?? '',
                    'pera' => $data['pera'] ?? '',
                    'bank' => $data['acct no. landbank'] ?? '',
                    'gsis_id' => $data['gsis id # (crn)'] ?? '',
                    'sss' => $data['sss'] ?? '',
                    'pagibig' => $data['pag ibig'] ?? '',
                    'philhealth' => $data['philhealth'] ?? '',
                    'tin_no' => $data['tin #'] ?? '',
                    'date_hired' => $data['date hired'] !== 'N/A' ? Carbon::parse($data['date hired']) : null,
                    'start_date_cch' => $data['start date cch'] !== 'N/A' ? Carbon::parse($data['start date cch']) : null,
                    'years_service' => $data['yrs. of service'] ?? '',
                    'birthdate' => $data['birthdate'] !== 'N/A' ? Carbon::parse($data['birthdate'])->format('Y-m-d') : null,
                    'civil_status' => $data['civil status'] ?? '',
                    'ed_attainment' => $data['ed attainment'] ?? '',
                    'prc_no' => $data['prc no.'] ?? '',
                    'prc_valid_date' => $data['valid date'] !== 'N/A' ? Carbon::parse($data['valid date']) : null,
                    'board_rating' => $data['board rating'] ?? '',
                    'csc_eligible' => $data['csc eligibility'] ?? '',
                    'contact_no' => $data['contact no.'] ?? '',
                    'address' => $data['address'] ?? '',
                    'email' => $data['email'] ?? '',
                    'active' => true
                ]
            );
        }

        $this->info('Employees imported successfully!');
    }
}
