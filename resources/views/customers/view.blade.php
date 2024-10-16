<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Customer</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="bg-gray-100">
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

    <div class="py-6 flex items-center justify-center">
        <div class="max-w-2xl w-full bg-white shadow-lg rounded-lg p-6 flex">
            <div class="flex-grow">
                <h2 class="text-2xl font-bold mb-4 text-gray-800">Customer Details</h2>
                <div class="mb-6">
                    <strong class="text-gray-700">Name:</strong>
                    <p class="text-gray-600">{{ $customer->name }}</p>
                </div>
                <div class="mb-6">
                    <strong class="text-gray-700">Email:</strong>
                    <p class="text-gray-600">{{ $customer->email }}</p>
                </div>
                <div class="mb-6">
                    <strong class="text-gray-700">Phone:</strong>
                    <p class="text-gray-600">{{ $customer->phone }}</p>
                </div>
                <div class="mb-6">
                    <strong class="text-gray-700">Address:</strong>
                    <p class="text-gray-600">{{ $customer->address }}</p>
                </div>
                <a href="{{ route('dashboard') }}" class="btn btn-primary mt-4">Back to Customers</a>
            </div>
            @if($customer->image)
                <div class="ml-6 flex-shrink-0">
                    <strong class="text-gray-700">Image:</strong>
                    <img src="{{ asset('images/' . $customer->image) }}" alt="Customer Image"
                        class="w-48 h-48 mt-4 object-cover rounded border border-gray-300">
                </div>
            @endif
        </div>
    </div>
</body>

</html>