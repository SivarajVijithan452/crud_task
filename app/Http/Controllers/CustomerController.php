<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Nette\Schema\ValidationException;

class CustomerController extends Controller
{
    public function loadAllCustomers()
    {
        try {
            $customers = Customer::all();
            return view('dashboard', ['customers' => $customers]);
        } catch (\Exception $e) {
            flash()->error('Failed to load customers: ' . $e->getMessage());
            return redirect()->route('dashboard');
        }
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:customers,email',
                'phone' => 'required|string|max:20',
                'address' => 'required|string|max:255',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $imageName = null;
            if ($request->hasFile('image')) {
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('images'), $imageName);
            }

            Customer::create(array_merge($request->all(), ['image' => $imageName]));
            flash()->success('Customer added successfully.');
            return redirect()->route('dashboard');
        } catch (ValidationException $e) {
            flash()->error('Validation error: ' . $e->getMessage());
        } catch (\Exception $e) {
            flash()->error('Failed to add customer: ' . $e->getMessage());
            return redirect()->route('dashboard');
        }
    }

    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    public function view($id)
    {
        $customer = Customer::findOrFail($id);
        return view('customers.view', compact('customer'));
    }


    public function update(Request $request, Customer $customer)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'nullable|string|max:20',
                'address' => 'nullable|string|max:255',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            if ($request->hasFile('image')) {
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('images'), $imageName);

                if ($customer->image && file_exists(public_path('images/' . $customer->image))) {
                    unlink(public_path('images/' . $customer->image));
                }

                $customer->update(array_merge($request->only(['name', 'email', 'phone', 'address']), ['image' => $imageName]));
            } else {
                $customer->update($request->only(['name', 'email', 'phone', 'address']));
            }

            flash()->success('Customer updated successfully.');
            return redirect()->route('dashboard');
        } catch (ValidationException $e) {
            flash()->error('Validation error: ' . $e->getMessage());
        } catch (\Exception $e) {
            flash()->error('Failed to update customer: ' . $e->getMessage());
            return redirect()->route('dashboard');
        }
    }

    public function destroy(Customer $customer)
    {
        try {
            // Check if the customer has an associated image
            if ($customer->image) {
                // Construct the full path to the image
                $imagePath = public_path('images/' . $customer->image);

                // Delete the image file if it exists
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }

            // Delete the customer record
            $customer->delete();
            flash()->success('Customer deleted successfully.');
            return redirect()->route('dashboard');
        } catch (\Exception $e) {
            flash()->error('Failed to delete customer: ' . $e->getMessage());
            return redirect()->route('dashboard');
        }
    }

}
