<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Employees
            <div class="float-right">
                <a href="{{ route('employees.create') }}"
                    class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-base font-medium rounded-md text-white bg-green-500 hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                    <i class="fa-solid fa-plus mr-2"></i> Create Employee
                </a>
            </div>
        </h2>
    </x-slot>

    <!-- Search Form -->
    <div class="search-form grid justify-end">
        <form action="{{ route('employees.index') }}" method="GET" class="mb-4">
            <select name="position" id="position-filter"
                class="px-auto py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-green-500"
                onchange="this.form.submit()">
                <option value="" {{ request('position') == '' ? 'selected' : '' }}>All Positions</option>
                <option value="casual" {{ request('position') == 'casual' ? 'selected' : '' }}>Casual</option>
                <option value="permanent" {{ request('position') == 'permanent' ? 'selected' : '' }}>Permanent</option>
                <option value="job order" {{ request('position') == 'job order' ? 'selected' : '' }}>Job Order</option>
            </select>
            <input type="text" name="search" placeholder="Search employees..."
                class="px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
            <button type="submit"
                class="px-4 py-2 border border-transparent text-base font-medium rounded-md text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Search
            </button>
        </form>
    </div>


    @if ($message = Session::get('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{ $message }}</span>
        </div>
    @endif

    <div class="mx-auto w-full my-5">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Emp
                            No
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Location
                            / Designation
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Position
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Daily
                            Rate
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date
                            Hired
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider float-right">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($emps as $emp)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $emp->emp_no }}</td>
                            <td class="px-6 py-4 whitespace-nowrap"><span>{{ $emp->lname }}, {{ $emp->fname }}
                                    {{ $emp->mname }}</span></td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <p>{{ $emp->location }}</p>
                                <p><small>{{ $emp->designation }}</small></p>
                                <p><small>{{ $emp->position }}</small></p>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap"><span
                                    class="inline-flex items-center rounded-md bg-blue-50 px-2 py-1 text-xs font-medium text-gray-600 ring-1 ring-inset ring-gray-500/10">{{ $emp->position_category }}</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap"><span>{{ $emp->daily_rate }}</span></td>
                            <td class="px-6 py-4 whitespace-nowrap"><span>{{ $emp->date_hired }}</span></td>
                            <td class="px-6 py-4 whitespace-nowrap float-right">
                                <div class="flex items-center">
                                    <button type="button" data-modal-target="modal-{{ $emp->id }}"
                                        data-modal-toggle="modal-{{ $emp->id }}"
                                        class="inline-flex items-center justify-center bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded mr-2 text-xs sm:text-sm">
                                        <i class="fas fa-eye mr-2"></i>
                                        Show
                                    </button>
                                    <a href="{{ route('employees.edit', $emp->id) }}"
                                        class="inline-flex items-center justify-center bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mr-2">
                                        <i class="fas fa-edit mr-2"></i>
                                        Edit
                                    </a>
                                    <form action="{{ route('employees.destroy', $emp->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="inline-flex items-center justify-center bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">
                                            <i class="fas fa-trash mr-2"></i>
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <!-- Modal -->
                        <div id="modal-{{ $emp->id }}"
                            class="fixed inset-0 flex items-center justify-center z-50 hidden bg-black bg-opacity-50 transition-opacity duration-300">
                            <div
                                class="relative bg-white p-6 rounded-lg shadow-lg w-full max-w-lg mx-4 md:mx-auto transform transition-transform duration-300 scale-95">
                                <button type="button" data-modal-toggle="modal-{{ $emp->id }}"
                                    class="absolute top-2 right-2 text-gray-400 hover:text-gray-600">
                                    <i class="fas fa-times"></i>
                                </button>
                                <h3 class="text-lg font-semibold mb-4">Employee Details</h3>
                                <p><strong>Employee No:</strong> {{ $emp->emp_no }}</p>
                                <p><strong>Name:</strong> {{ $emp->lname }}, {{ $emp->fname }}
                                    {{ $emp->mname }}</p>
                                <p><strong>Location:</strong> {{ $emp->location }}</p>
                                <p><strong>Designation:</strong> {{ $emp->designation }}</p>
                                <p><strong>Position:</strong> {{ $emp->position }}</p>
                                <p><strong>Daily Rate:</strong> {{ $emp->daily_rate }}</p>
                                <p><strong>Date Hired:</strong> {{ $emp->date_hired }}</p>
                            </div>
                        </div>
                    @endforeach
                </tbody>
                <tfoot class="bg-gray-100">
                    <tr>
                        <td colspan="3"
                            class="px-6 py-4 text-center text-sm font-medium text-gray-500 uppercase tracking-wider">
                            {!! $emps->render() !!}
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('[data-modal-toggle]').forEach(button => {
                button.addEventListener('click', () => {
                    const modalId = button.getAttribute('data-modal-toggle');
                    const modal = document.getElementById(modalId);
                    if (modal.classList.contains('hidden')) {
                        modal.classList.remove('hidden');
                        setTimeout(() => modal.classList.add('opacity-100', 'scale-100'), 10);
                    } else {
                        modal.classList.remove('opacity-100', 'scale-100');
                        setTimeout(() => modal.classList.add('hidden'), 300);
                    }
                });
            });

            document.querySelectorAll('.modal button[data-modal-toggle]').forEach(button => {
                button.addEventListener('click', () => {
                    const modal = button.closest('.modal');
                    modal.classList.remove('opacity-100', 'scale-100');
                    setTimeout(() => modal.classList.add('hidden'), 300);
                });
            });
        });
    </script>
</x-app-layout>
