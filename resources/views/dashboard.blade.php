<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Management</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <nav>
        <div class="navbar bg-base-100 shadow-md">
            <div class="navbar-start">
                <a href="{{ route('dashboard') }}" class="btn btn-ghost normal-case text-xl font-bold text-gray-900">
                    Customer Management
                </a>
            </div>
            <div class="navbar-end flex items-center space-x-4">
                @auth
                    <div class="flex items-center space-x-4">
                        <span class="text-sm font-medium text-gray-700 py-2 px-4 border border-gray-300 rounded-md">
                            {{ Auth::user()->name }}
                        </span>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit"
                                class="btn btn-error btn-sm flex items-center space-x-1 py-2 px-4 rounded-md">
                                <i class="fas fa-sign-out-alt"></i>
                                <span>Logout</span>
                            </button>
                        </form>
                    </div>
                @else
                    <a href="{{ route('login') }}"
                        class="btn btn-ghost text-gray-700 hover:text-gray-900 py-2 px-4 rounded-md">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-primary py-2 px-4 rounded-md">Register</a>
                @endauth
            </div>
        </div>
    </nav>

    <div class="py-12 bg-gray-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md sm:rounded-lg border border-gray-200">
                <div class="p-6">
                    <div class="mb-4">
                        <a href="{{ route('customers.create') }}" class="btn btn-primary">Add Customer</a>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="table w-full border-collapse">
                            <thead class="bg-gray-200 border-b border-gray-300">
                                <tr>
                                    <th class="px-4 py-2 text-left text-gray-600 font-semibold">Image</th>
                                    <th class="px-4 py-2 text-left text-gray-600 font-semibold">ID</th>
                                    <th class="px-4 py-2 text-left text-gray-600 font-semibold">Name</th>
                                    <th class="px-4 py-2 text-left text-gray-600 font-semibold">Email</th>
                                    <th class="px-4 py-2 text-left text-gray-600 font-semibold">Phone</th>
                                    <th class="px-4 py-2 text-left text-gray-600 font-semibold">Address</th>
                                    <th class="px-4 py-2 text-left text-gray-600 font-semibold">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($customers as $customer)
                                    <tr class="border-b border-gray-300 hover:bg-gray-50">
                                        <td class="px-4 py-2">
                                            @if($customer->image)
                                                <img src="{{ asset('images/' . $customer->image) }}" alt="Customer Image"
                                                    class="w-16 h-16 object-cover">
                                            @endif
                                        </td>
                                        <td class="px-4 py-2">{{ $customer->id }}</td>
                                        <td class="px-4 py-2">{{ $customer->name }}</td>
                                        <td class="px-4 py-2">{{ $customer->email }}</td>
                                        <td class="px-4 py-2">{{ $customer->phone }}</td>
                                        <td class="px-4 py-2">{{ $customer->address }}</td>
                                        <td class="px-4 py-2">
                                            <div class="flex space-x-2">
                                                <a href="{{ route('customers.view', $customer->id) }}"
                                                    class="btn btn-sm btn-info">View</a>
                                                <a href="{{ route('customers.edit', $customer->id) }}"
                                                    class="btn btn-sm btn-primary">Edit</a>
                                                <form method="POST" action="{{ route('customers.destroy', $customer) }}"
                                                    class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-error">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</body>

</html>