<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Roles
            <div class="float-right">
                @can('product-create')
                    <a href="{{ route('roles.create') }}"
                        class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-base font-medium rounded-md text-white bg-green-500 hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        <i class="fa-solid fa-plus mr-2"></i> Create Role
                    </a>
                @endcan
            </div>
        </h2>
    </x-slot>

    @if ($message = Session::get('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{ $message }}</span>
        </div>
    @endif

    <div class="mx-auto w-full max-w-7xl my-5">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider float-right">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($roles as $key => $role)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $role->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center float-right">
                                @can('role-list')
                                    <a href="{{ route('roles.show', $role->id) }}"
                                        class="inline-flex items-center justify-center bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded mr-2">
                                        <i class="fas fa-eye mr-2"></i>
                                        Show
                                    </a>
                                @endcan
                                @can('role-edit')
                                    <a href="{{ route('roles.edit', $role->id) }}"
                                        class="inline-flex items-center justify-center bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mr-2">
                                        <i class="fas fa-edit mr-2"></i>
                                        Edit
                                    </a>
                                @endcan
                                @can('role-delete')
                                    <form action="{{ route('roles.destroy', $role->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="inline-flex items-center justify-center bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">
                                            <i class="fas fa-trash mr-2"></i>
                                            Delete
                                        </button>
                                    </form>
                                @endcan
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot class="bg-gray-100">
                <tr>
                    <td colspan="2"
                        class="px-6 py-4 text-center text-sm font-medium text-gray-500 uppercase tracking-wider">
                        {!! $roles->render() !!}
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</x-app-layout>
