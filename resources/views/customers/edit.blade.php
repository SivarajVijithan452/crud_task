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

    <div class="max-w-7xl mx-auto bg-white shadow-md rounded-lg p-6 mt-8">
        <h2 class="text-lg font-bold mb-4">Edit Customer</h2>
        <form method="POST" action="{{ route('customers.update', $customer) }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <input type="hidden" name="id" value="{{ $customer->id }}">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" id="name" name="name"
                        class="mt-1 block w-full border border-gray-300 rounded-md p-2" value="{{ $customer->name }}"
                        required>
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email"
                        class="mt-1 block w-full border border-gray-300 rounded-md p-2" value="{{ $customer->email }}"
                        required>
                </div>

                <div class="mb-4">
                    <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                    <input type="text" id="phone" name="phone"
                        class="mt-1 block w-full border border-gray-300 rounded-md p-2" value="{{ $customer->phone }}"
                        required>
                </div>

                <div class="mb-4">
                    <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                    <input type="text" id="address" name="address"
                        class="mt-1 block w-full border border-gray-300 rounded-md p-2" value="{{ $customer->address }}"
                        required>
                </div>

                <div class="mb-4 col-span-2">
                    <label class="block text-sm font-medium text-gray-700">Current Image</label>
                    @if($customer->image)
                        <img src="{{ asset('images/' . $customer->image) }}" alt="Current Image"
                            class="w-16 h-16 object-cover mb-2">
                    @endif
                </div>

                <div class="mb-4 col-span-2">
                    <label for="image" class="block text-sm font-medium text-gray-700">Upload New Image
                        (optional)</label>
                    <input type="file" id="image" name="image"
                        class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                </div>
            </div>

            <div class="flex justify-between mt-6">
                <button type="button" class="bg-gray-200 text-gray-700 py-2 px-4 rounded-md"
                    onclick="window.history.back();">Cancel</button>
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md">Save Changes</button>
            </div>
        </form>
    </div>
</body>

</html>