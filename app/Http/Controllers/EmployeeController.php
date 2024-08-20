<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Employee::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('emp_no', 'LIKE', "%{$search}%")
                    ->orWhere('fname', 'LIKE', "%{$search}%")
                    ->orWhere('mname', 'LIKE', "%{$search}%")
                    ->orWhere('lname', 'LIKE', "%{$search}%")
                    ->orWhere('location', 'LIKE', "%{$search}%")
                    ->orWhere('designation', 'LIKE', "%{$search}%")
                    ->orWhere('position', 'LIKE', "%{$search}%");
            });
        }

        if ($request->has('position') && $request->input('position') != '') {
            $positionCategory = $request->input('position');
            $query->where('position_category', $positionCategory);
        }

        $emps = $query->paginate(50);

        return view('employees.index', compact('emps'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'emp_no' => 'required|unique:employees,emp_no',
        ]);

        $data = $request->all();
        $data['active'] = 1;
        Employee::create($data);

        return redirect()->route('employees.index')
            ->with('success', 'Employee created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Find the employee by ID
        $employee = Employee::findOrFail($id);

        // correct date format
        $employee->start_date_cch = \Carbon\Carbon::parse($employee->start_date_cch)->format('Y-m-d');

        // Return the edit view with the employee data
        return view('employees.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $employee = Employee::findOrFail($id);

        $fields = [
            'emp_no', 'salary_grade', 'fname', 'mname', 'lname', 'gender', 
            'monthly_rate', 'daily_rate', 'hazard_pay', 'pera', 'location', 
            'designation', 'position', 'position_category', 'subs_allowance', 
            'bank', 'bank_account', 'gsis_id', 'sss', 'pagibig', 'philhealth', 
            'tin_no', 'date_hired', 'start_date_cch', 'years_service', 'birthdate',
            'civil_status', 'ed_attainment', 'prc_no', 'prc_valid_date', 'board_rating',
            'csc_eligible', 'contact_no', 'address'
        ];

        foreach ($fields as $field) {
            if ($request->has($field) && $request->$field != $employee->$field) {
                $employee->$field = $request->$field;
            }
        }

        $employee->save();

        return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
