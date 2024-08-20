<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Employee') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="flex justify-between items-center mb-4">
                    <a href="{{ route('employees.index') }}"
                        class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                        Back
                    </a>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger text-red-700 mb-4">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('employees.update', $employee->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Employee Information -->
                    <div class="mb-8 columns-2">
                        <div class="col">
                            <label for="emp_no" class="block text-gray-700 font-bold mb-2">Employee No:</label>
                            <input type="text" name="emp_no" id="emp_no" value="{{ $employee->emp_no }}"
                                class="form-input rounded-md shadow-sm w-full" placeholder="Employee Number">
                        </div>
                        <div class="col">
                            <label for="salary_grade" class="block text-gray-700 font-bold mb-2">Salary Grade:</label>
                            <input type="text" name="salary_grade" id="salary_grade"
                                value="{{ $employee->salary_grade }}" class="form-input rounded-md shadow-sm w-full"
                                placeholder="Salary Grade">
                        </div>
                    </div>
                    <div class="mb-8 columns-3">
                        <div class="col">
                            <label for="fname" class="block text-gray-700 font-bold mb-2">First Name:</label>
                            <input type="text" name="fname" id="fname" value="{{ $employee->fname }}"
                                class="form-input rounded-md shadow-sm w-full" placeholder="First Name">
                        </div>
                        <div class="col">
                            <label for="mname" class="block text-gray-700 font-bold mb-2">Middle Name:</label>
                            <input type="text" name="mname" id="mname" value="{{ $employee->mname }}"
                                class="form-input rounded-md shadow-sm w-full" placeholder="Middle Name">
                        </div>
                        <div class="col">
                            <label for="lname" class="block text-gray-700 font-bold mb-2">Last Name:</label>
                            <input type="text" name="lname" id="lname" value="{{ $employee->lname }}"
                                class="form-input rounded-md shadow-sm w-full" placeholder="Last Name">
                        </div>
                    </div>
                    <div class="mb-8 columns-2">
                        <div class="col">
                            <label for="gender" class="block text-gray-700 font-bold mb-2">Gender:</label>
                            <select name="gender" id="gender" class="form-input rounded-md shadow-sm w-full">
                                <option value="male" {{ $employee->gender == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ $employee->gender == 'female' ? 'selected' : '' }}>Female
                                </option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="contact_no" class="block text-gray-700 font-bold mb-2">Contact No:</label>
                            <input type="text" name="contact_no" id="contact_no" value="{{ $employee->contact_no }}"
                                class="form-input rounded-md shadow-sm w-full" placeholder="Contact No">
                        </div>
                    </div>

                    <div class="mb-8 columns-2">
                        <div class="col">
                            <label for="monthly_rate" class="block text-gray-700 font-bold mb-2">Monthly Rate:</label>
                            <input type="text" name="monthly_rate" id="monthly_rate"
                                value="{{ $employee->monthly_rate }}" class="form-input rounded-md shadow-sm w-full"
                                placeholder="Monthly Rate">
                        </div>
                        <div class="col">
                            <label for="daily_rate" class="block text-gray-700 font-bold mb-2">Daily Rate:</label>
                            <input type="text" name="daily_rate" id="daily_rate" value="{{ $employee->daily_rate }}"
                                class="form-input rounded-md shadow-sm w-full" placeholder="Daily Rate">
                        </div>
                    </div>
                    <div class="mb-8 columns-2">
                        <div class="col">
                            <label for="hazard_pay" class="block text-gray-700 font-bold mb-2">Hazard Pay:</label>
                            <input type="text" name="hazard_pay" id="hazard_pay"
                                value="{{ $employee->hazard_pay }}" class="form-input rounded-md shadow-sm w-full"
                                placeholder="Hazard Pay">
                        </div>
                        <div class="col">
                            <label for="pera" class="block text-gray-700 font-bold mb-2">PERA:</label>
                            <input type="text" name="pera" id="pera" value="{{ $employee->pera }}"
                                class="form-input rounded-md shadow-sm w-full" placeholder="PERA">
                        </div>
                    </div>
                    <div class="mb-4 columns-2">
                        <div class="col">
                            <label for="location" class="block text-gray-700 font-bold mb-2">Location:</label>
                            <input type="text" name="location" id="location" value="{{ $employee->location }}"
                                class="form-input rounded-md shadow-sm w-full" placeholder="Location">
                        </div>
                        <div class="col">
                            <label for="designation" class="block text-gray-700 font-bold mb-2">Designation:</label>
                            <input type="text" name="designation" id="designation"
                                value="{{ $employee->designation }}" class="form-input rounded-md shadow-sm w-full"
                                placeholder="Designation">
                        </div>
                    </div>

                    <div class="mb-4 columns-2">
                        <div class="col">
                            <label for="position" class="block text-gray-700 font-bold mb-2">Position:</label>
                            <input type="text" name="position" id="position" value="{{ $employee->position }}"
                                class="form-input rounded-md shadow-sm w-full" placeholder="Position">
                        </div>
                        <div class="col">
                            <label for="position_category" class="block text-gray-700 font-bold mb-2">Position
                                Category:</label>
                            <select name="position_category" id="position_category"
                                class="form-input rounded-md shadow-sm w-full">
                                <option value="Casual"
                                    {{ $employee->position_category == 'Casual' ? 'selected' : '' }}>Casual</option>
                                <option value="Permanent"
                                    {{ $employee->position_category == 'Permanent' ? 'selected' : '' }}>Permanent
                                </option>
                                <option value="Job Order"
                                    {{ $employee->position_category == 'Job Order' ? 'selected' : '' }}>Job Order
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="subs_allowance" class="block text-gray-700 font-bold mb-2">Subsistence
                            Allowance:</label>
                        <input type="text" name="subs_allowance" id="subs_allowance"
                            value="{{ $employee->subs_allowance }}" class="form-input rounded-md shadow-sm w-full"
                            placeholder="Subsistence Allowance">
                    </div>

                    <div class="mb-8 columns-2">
                        <div class="col">
                            <label for="bank" class="block text-gray-700 font-bold mb-2">Bank:</label>
                            <input type="text" name="bank" id="bank" value="{{ $employee->bank }}"
                                class="form-input rounded-md shadow-sm w-full" placeholder="Bank">
                        </div>
                        <div class="col">
                            <label for="bank_account" class="block text-gray-700 font-bold mb-2">Bank Account
                                Number:</label>
                            <input type="text" name="bank_account" id="bank_account"
                                value="{{ $employee->bank_account }}" class="form-input rounded-md shadow-sm w-full"
                                placeholder="Bank Account Number">
                        </div>
                    </div>

                    <div class="mb-8 columns-3">
                        <div class="col">
                            <label for="gsis_id" class="block text-gray-700 font-bold mb-2">GSIS ID:</label>
                            <input type="text" name="gsis_id" id="gsis_id" value="{{ $employee->gsis_id }}"
                                class="form-input rounded-md shadow-sm w-full" placeholder="GSIS ID">
                        </div>
                        <div class="col">
                            <label for="sss" class="block text-gray-700 font-bold mb-2">SSS:</label>
                            <input type="text" name="sss" id="sss" value="{{ $employee->sss }}"
                                class="form-input rounded-md shadow-sm w-full" placeholder="SSS">
                        </div>
                        <div class="col">
                            <label for="pagibig" class="block text-gray-700 font-bold mb-2">Pag-IBIG:</label>
                            <input type="text" name="pagibig" id="pagibig" value="{{ $employee->pagibig }}"
                                class="form-input rounded-md shadow-sm w-full" placeholder="Pag-IBIG">
                        </div>
                    </div>

                    <div class="mb-8 columns-2">
                        <div class="col">
                            <label for="philhealth" class="block text-gray-700 font-bold mb-2">PhilHealth:</label>
                            <input type="text" name="philhealth" id="philhealth"
                                value="{{ $employee->philhealth }}" class="form-input rounded-md shadow-sm w-full"
                                placeholder="PhilHealth">
                        </div>
                        <div class="col">
                            <label for="tin_no" class="block text-gray-700 font-bold mb-2">TIN No:</label>
                            <input type="text" name="tin_no" id="tin_no" value="{{ $employee->tin_no }}"
                                class="form-input rounded-md shadow-sm w-full" placeholder="TIN No">
                        </div>
                    </div>

                    <div class="mb-4 columns-2">
                        <div class="col">
                            <label for="date_hired" class="block text-gray-700 font-bold mb-2">Date Hired:</label>
                            <input type="date" name="date_hired" id="date_hired"
                                value="{{ $employee->date_hired }}" class="form-input rounded-md shadow-sm w-full">
                        </div>

                        <div class="col">
                            <label for="start_date_cch" class="block text-gray-700 font-bold mb-2">Start Date
                                CCH:</label>
                            <input type="date" name="start_date_cch" id="start_date_cch"
                                value="{{ $employee->start_date_cch }}"
                                class="form-input rounded-md shadow-sm w-full">
                        </div>
                    </div>

                    <div class="mb-4 columns-2">
                        <div class="col">
                            <label for="years_service" class="block text-gray-700 font-bold mb-2">Years of
                                Service:</label>
                            <input type="text" name="years_service" id="years_service"
                                value="{{ $employee->years_service }}" class="form-input rounded-md shadow-sm w-full"
                                placeholder="Years of Service">
                        </div>

                        <div class="col">
                            <label for="birthdate" class="block text-gray-700 font-bold mb-2">Birthdate:</label>
                            <input type="date" name="birthdate" id="birthdate"
                                value="{{ $employee->birthdate }}" class="form-input rounded-md shadow-sm w-full">
                        </div>
                    </div>

                    <div class="mb-4 columns-2">
                        <div class="col">
                            <label for="civil_status" class="block text-gray-700 font-bold mb-2">Civil Status:</label>
                            <select name="civil_status" id="civil_status"
                                class="form-input rounded-md shadow-sm w-full">
                                <option value="Single" {{ $employee->civil_status == 'Single' ? 'selected' : '' }}>
                                    Single</option>
                                <option value="Married" {{ $employee->civil_status == 'Married' ? 'selected' : '' }}>
                                    Married
                                </option>
                                <option value="Widowed" {{ $employee->civil_status == 'Widowed' ? 'selected' : '' }}>
                                    Widowed
                                </option>
                                <option value="Separated"
                                    {{ $employee->civil_status == 'Separated' ? 'selected' : '' }}>
                                    Separated
                                </option>
                            </select>
                        </div>

                        <div class="col">
                            <label for="ed_attainment" class="block text-gray-700 font-bold mb-2">Educational
                                Attainment:</label>
                            <input type="text" name="ed_attainment" id="ed_attainment"
                                value="{{ $employee->ed_attainment }}" class="form-input rounded-md shadow-sm w-full"
                                placeholder="Educational Attainment">
                        </div>
                    </div>

                    <div class="mb-4 columns-2">
                        <div class="col">
                            <label for="prc_no" class="block text-gray-700 font-bold mb-2">PRC No:</label>
                            <input type="text" name="prc_no" id="prc_no" value="{{ $employee->prc_no }}"
                                class="form-input rounded-md shadow-sm w-full" placeholder="PRC No">
                        </div>

                        <div class="col">
                            <label for="prc_valid_date" class="block text-gray-700 font-bold mb-2">PRC Valid
                                Date:</label>
                            <input type="date" name="prc_valid_date" id="prc_valid_date"
                                value="{{ $employee->prc_valid_date }}"
                                class="form-input rounded-md shadow-sm w-full">
                        </div>
                    </div>

                    <div class="mb-4 columns-2">
                        <div class="col">
                            <label for="board_rating" class="block text-gray-700 font-bold mb-2">Board Rating:</label>
                            <input type="text" name="board_rating" id="board_rating"
                                value="{{ $employee->board_rating }}" class="form-input rounded-md shadow-sm w-full"
                                placeholder="Board Rating">
                        </div>

                        <div class="col">
                            <label for="csc_eligible" class="block text-gray-700 font-bold mb-2">CSC Eligible:</label>
                            <select name="csc_eligible" id="csc_eligible"
                                class="form-input rounded-md shadow-sm w-full">
                                <option value="yes" {{ $employee->csc_eligible == 'yes' ? 'selected' : '' }}>Yes
                                </option>
                                <option value="no" {{ $employee->csc_eligible == 'no' ? 'selected' : '' }}>No
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="address" class="block text-gray-700 font-bold mb-2">Address:</label>
                        <textarea name="address" id="address" rows="3" class="form-input rounded-md shadow-sm w-full"
                            placeholder="Address">{{ old('address', $employee->address) }}</textarea>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
