<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Customer</title>
    @vite('resources/css/app.css')
    <!-- Add FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                        class="btn btn-ghost text-gray-700 hover:text-gray-900 py-2 px-4 rounded-md">
                        Login
                    </a>
                    <a href="{{ route('register') }}" class="btn btn-primary py-2 px-4 rounded-md">
                        Register
                    </a>
                @endauth
            </div>
        </div>
    </nav>

    <div class="py-12 bg-gray-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md sm:rounded-lg border border-gray-200">
                <div class="p-6">
                    <!-- Add Customer Form -->
                    <div class="mb-4">
                        <h2 class="text-xl font-bold">Add New Customer</h2>
                    </div>
                    <form method="POST" action="{{ route('customers.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <div>
                                <label for="name" class="block text-gray-700">Name</label>
                                <input type="text" id="name" name="name" class="input input-bordered w-full" required>
                            </div>
                            <div>
                                <label for="email" class="block text-gray-700">Email</label>
                                <input type="email" id="email" name="email" class="input input-bordered w-full"
                                    required>
                            </div>
                            <div>
                                <label for="phone" class="block text-gray-700">Phone</label>
                                <input type="text" id="phone" name="phone" class="input input-bordered w-full" required>
                            </div>
                            <div>
                                <label for="address" class="block text-gray-700">Address</label>
                                <input type="text" id="address" name="address" class="input input-bordered w-full"
                                    required>
                            </div>
                            <div>
                                <label for="image" class="block text-gray-700">Upload Image</label>
                                <input type="file" id="image" name="image" class="input input-bordered w-full"
                                    accept="image/*">
                            </div>
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">Add Customer</button>
                            <a href="{{ route('dashboard') }}" class="btn btn-ghost ml-4">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>