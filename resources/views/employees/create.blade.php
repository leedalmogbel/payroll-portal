<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Employee') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="flex justify-between items-center mb-4">
                    <div>
                        <!-- Link to go back to employees index -->
                        <a href="{{ route('employees.index') }}"
                            class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Back</a>
                    </div>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger text-red-700">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Employee Information -->
                    <div class="mb-8 columns-2">
                        <div class="col">
                            <label for="emp_no" class="block text-gray-700 font-bold mb-2">Employee No:</label>
                            <input type="text" name="emp_no" id="emp_no" value="{{ old('emp_no') }}"
                                class="form-input rounded-md shadow-sm w-full" placeholder="Employee Number">
                        </div>
                        <div class="col">
                            <label for="salary_grade" class="block text-gray-700 font-bold mb-2">Salary Grade:</label>
                            <input type="text" name="salary_grade" id="salary_grade"
                                value="{{ old('salary_grade') }}" class="form-input rounded-md shadow-sm w-full"
                                placeholder="Salary Grade">
                        </div>
                    </div>
                    <div class="mb-8 columns-3">
                        <div class="col">
                            <label for="fname" class="block text-gray-700 font-bold mb-2">First Name:</label>
                            <input type="text" name="fname" id="fname" value="{{ old('fname') }}"
                                class="form-input rounded-md shadow-sm w-full" placeholder="First Name">
                        </div>
                        <div class="col">
                            <label for="mname" class="block text-gray-700 font-bold mb-2">Middle Name:</label>
                            <input type="text" name="mname" id="mname" value="{{ old('mname') }}"
                                class="form-input rounded-md shadow-sm w-full" placeholder="Middle Name">
                        </div>
                        <div class="col">
                            <label for="lname" class="block text-gray-700 font-bold mb-2">Last Name:</label>
                            <input type="text" name="lname" id="lname" value="{{ old('lname') }}"
                                class="form-input rounded-md shadow-sm w-full" placeholder="Last Name">
                        </div>
                    </div>

                    <div class="mb-8 columns-2">
                        <div class="col">
                            <label for="gender" class="block text-gray-700 font-bold mb-2">Gender:</label>
                            <select name="gender" id="gender" class="form-input rounded-md shadow-sm w-full">
                                <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female
                                </option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="contact_no" class="block text-gray-700 font-bold mb-2">Contact Number:</label>
                            <input type="text" name="contact_no" id="contact_no" value="{{ old('contact_no') }}"
                                class="form-input rounded-md shadow-sm w-full" placeholder="Contact Number">
                        </div>
                    </div>

                    <div class="mb-8 columns-2">
                        <div class="col">
                            <label for="monthly_rate" class="block text-gray-700 font-bold mb-2">Monthly Rate:</label>
                            <input type="text" name="monthly_rate" id="monthly_rate"
                                value="{{ old('monthly_rate') }}"" class="form-input rounded-md shadow-sm w-full"
                                placeholder="Monthly Rate">
                        </div>
                        <div class="col">
                            <label for="daily_rate" class="block text-gray-700 font-bold mb-2">Daily Rate:</label>
                            <input type="text" name="daily_rate" id="daily_rate" value="{{ old('daily_rate') }}"
                                class="form-input rounded-md shadow-sm w-full" placeholder="Daily Rate">
                        </div>
                    </div>
                    <div class="mb-8 columns-2">
                        <div class="col">
                            <label for="hazard_pay" class="block text-gray-700 font-bold mb-2">Hazard Pay:</label>
                            <input type="text" name="hazard_pay" id="hazard_pay" value="{{ old('hazard_pay') }}"
                                class="form-input rounded-md shadow-sm w-full" placeholder="Hazard Pay">
                        </div>
                        <div class="col">
                            <label for="pera" class="block text-gray-700 font-bold mb-2">PERA:</label>
                            <input type="text" name="pera" id="pera" value="{{ old('pera') }}"
                                class="form-input rounded-md shadow-sm w-full" placeholder="PERA">
                        </div>
                    </div>
                    <div class="mb-4 columns-2">
                        <div class="col">
                            <label for="location" class="block text-gray-700 font-bold mb-2">Location:</label>
                            <input type="text" name="location" id="location" value="{{ old('location') }}"
                                class="form-input rounded-md shadow-sm w-full" placeholder="Location">
                        </div>
                        <div class="col">
                            <label for="designation" class="block text-gray-700 font-bold mb-2">Designation:</label>
                            <input type="text" name="designation" id="designation"
                                value="{{ old('designation') }}" class="form-input rounded-md shadow-sm w-full"
                                placeholder="Designation">
                        </div>
                    </div>


                    <div class="mb-4 columns-2">
                        <div class="col">
                            <label for="position" class="block text-gray-700 font-bold mb-2">Position:</label>
                            <input type="text" name="position" id="position" value="{{ old('position') }}"
                                class="form-input rounded-md shadow-sm w-full" placeholder="Position">
                        </div>
                        <div class="col">
                            <label for="position_category" class="block text-gray-700 font-bold mb-2">Position
                                Category:</label>
                            <select name="position_category" id="position_category"
                                class="form-input rounded-md shadow-sm w-full">
                                <option value="Casual" {{ old('position_category') == 'Casual' ? 'selected' : '' }}>
                                    Casual</option>
                                <option value="Permanent"
                                    {{ old('position_category') == 'Permanent' ? 'selected' : '' }}>Permanent</option>
                                <option value="Job Order"
                                    {{ old('position_category') == 'Job Order' ? 'selected' : '' }}>Job Order</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="subs_allowance" class="block text-gray-700 font-bold mb-2">Subsistence
                            Allowance:</label>
                        <input type="text" name="subs_allowance" id="subs_allowance"
                            value="{{ old('subs_allowance') }}" class="form-input rounded-md shadow-sm w-full"
                            placeholder="Subsistence Allowance">
                    </div>

                    <div class="mb-8 columns-2">
                        <div class="col">
                            <label for="bank" class="block text-gray-700 font-bold mb-2">Bank:</label>
                            <input type="text" name="bank" id="bank" value="{{ old('bank') }}"
                                class="form-input rounded-md shadow-sm w-full" placeholder="Bank">
                        </div>
                        <div class="col">
                            <label for="bank_account" class="block text-gray-700 font-bold mb-2">Bank Account
                                Number:</label>
                            <input type="text" name="bank_account" id="bank_account"
                                value="{{ old('bank_account') }}" class="form-input rounded-md shadow-sm w-full"
                                placeholder="Bank Account Number">
                        </div>
                    </div>

                    <div class="mb-8 columns-3">
                        <div class="col">
                            <label for="gsis_id" class="block text-gray-700 font-bold mb-2">GSIS ID:</label>
                            <input type="text" name="gsis_id" id="gsis_id" value="{{ old('gsis_id') }}"
                                class="form-input rounded-md shadow-sm w-full" placeholder="GSIS ID">
                        </div>
                        <div class="col">
                            <label for="sss" class="block text-gray-700 font-bold mb-2">SSS:</label>
                            <input type="text" name="sss" id="sss" value="{{ old('sss') }}"
                                class="form-input rounded-md shadow-sm w-full" placeholder="SSS">
                        </div>
                        <div class="col">
                            <label for="pagibig" class="block text-gray-700 font-bold mb-2">Pag-IBIG:</label>
                            <input type="text" name="pagibig" id="pagibig" value="{{ old('pagibig') }}"
                                class="form-input rounded-md shadow-sm w-full" placeholder="Pag-IBIG">
                        </div>
                    </div>

                    <div class="mb-8 columns-2">
                        <div class="mb-4">
                            <label for="philhealth" class="block text-gray-700 font-bold mb-2">PhilHealth:</label>
                            <input type="text" name="philhealth" id="philhealth" value="{{ old('philhealth') }}"
                                class="form-input rounded-md shadow-sm w-full" placeholder="PhilHealth">
                        </div>
                        <div class="mb-4">
                            <label for="tin_no" class="block text-gray-700 font-bold mb-2">TIN No:</label>
                            <input type="text" name="tin_no" id="tin_no" value="{{ old('tin_no') }}"
                                class="form-input rounded-md shadow-sm w-full" placeholder="TIN No">
                        </div>
                    </div>

                    <div class="mb-8 columns-2">
                        <div class="col">
                            <label for="date_hired" class="block text-gray-700 font-bold mb-2">Date Hired:</label>
                            <input type="date" name="date_hired" id="date_hired" value="{{ old('date_hired') }}"
                                class="form-input rounded-md shadow-sm w-full">
                        </div>
                        <div class="col">
                            <label for="start_date_cch" class="block text-gray-700 font-bold mb-2">Start Date
                                CCH:</label>
                            <input type="date" name="start_date_cch" id="start_date_cch"
                                value="{{ old('start_date_cch') }}" class="form-input rounded-md shadow-sm w-full">
                        </div>
                    </div>

                    <div class="mb-8 columns-2">
                        <div class="col">
                            <label for="years_service" class="block text-gray-700 font-bold mb-2">Years of
                                Service:</label>
                            <input type="number" name="years_service" id="years_service"
                                value="{{ old('years_service') }}" class="form-input rounded-md shadow-sm w-full"
                                placeholder="Years of Service">
                        </div>
                        <div class="col">
                            <label for="birthdate" class="block text-gray-700 font-bold mb-2">Birthdate:</label>
                            <input type="date" name="birthdate" id="birthdate" value="{{ old('birthdate') }}"
                                class="form-input rounded-md shadow-sm w-full">
                        </div>
                    </div>


                    <div class="mb-8 columns-2">
                        <div class="col">
                            <label for="civil_status" class="block text-gray-700 font-bold mb-2">Civil Status:</label>
                            <select name="civil_status" id="civil_status"
                                class="form-input rounded-md shadow-sm w-full">
                                <option value="Single" {{ old('position_category') == 'Single' ? 'selected' : '' }}>
                                    Single</option>
                                <option value="Married" {{ old('position_category') == 'Married' ? 'selected' : '' }}>
                                    Married</option>
                                <option value="Widowed" {{ old('position_category') == 'Widowed' ? 'selected' : '' }}>
                                    Widowed</option>
                                <option value="Separated"
                                    {{ old('position_category') == 'Separated' ? 'selected' : '' }}>Separated</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="ed_attainment" class="block text-gray-700 font-bold mb-2">Educational
                                Attainment:</label>
                            <input type="text" name="ed_attainment" id="ed_attainment"
                                value="{{ old('ed_attainment') }}" class="form-input rounded-md shadow-sm w-full"
                                placeholder="Educational Attainment">
                        </div>
                    </div>

                    <div class="mb-8 columns-2">
                        <div class="col">
                            <label for="prc_no" class="block text-gray-700 font-bold mb-2">PRC No:</label>
                            <input type="text" name="prc_no" id="prc_no" value="{{ old('prc_no') }}"
                                class="form-input rounded-md shadow-sm w-full" placeholder="PRC No">
                        </div>
                        <div class="col">
                            <label for="prc_valid_date" class="block text-gray-700 font-bold mb-2">PRC Valid
                                Date:</label>
                            <input type="date" name="prc_valid_date" id="prc_valid_date"
                                value="{{ old('prc_valid_date') }}" class="form-input rounded-md shadow-sm w-full">
                        </div>
                    </div>

                    <div class="mb-8 columns-2">
                        <div class="col">
                            <label for="board_rating" class="block text-gray-700 font-bold mb-2">Board Rating:</label>
                            <input type="text" name="board_rating" id="board_rating"
                                value="{{ old('board_rating') }}" class="form-input rounded-md shadow-sm w-full"
                                placeholder="Board Rating">
                        </div>
                        <div class="col">
                            <label for="csc_eligible" class="block text-gray-700 font-bold mb-2">CSC Eligible:</label>
                            <input type="text" name="csc_eligible" id="csc_eligible"
                                value="{{ old('csc_eligible') }}" class="form-input rounded-md shadow-sm w-full"
                                placeholder="CSC Eligible">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="address" class="block text-gray-700 font-bold mb-2">Address:</label>
                        <textarea name="address" id="address" rows="3" class="form-input rounded-md shadow-sm w-full"
                            placeholder="Address">{{ old('address') }}</textarea>
                    </div>
                    {{-- <div class="mb-4">
                        <label for="email" class="block text-gray-700 font-bold mb-2">Email:</label>
                        <input type="email" name="email" id="email"
                            class="form-input rounded-md shadow-sm w-full" placeholder="Email">
                    </div> --}}
                    {{-- <div class="mb-4">
                        <label for="active" class="block text-gray-700 font-bold mb-2">Active:</label>
                        <select name="active" id="active" class="form-input rounded-md shadow-sm w-full">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div> --}}
                    <div class="text-right">
                        <button type="submit"
                            class="inline-block bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
