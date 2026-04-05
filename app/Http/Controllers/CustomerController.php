<?php
namespace App\Http\Controllers;

use App\Http\Requests\CustomerStoreRequest;
use App\Models\Customer;
use App\Services\ImageService;

class CustomerController extends Controller
{

    protected $imageService;

    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }

    public function index()
    {
        $customers = Customer::paginate(10);

        return view('customer.index', compact('customers'));
    }

    public function create()
    {
        return view('customer.create');
    }

    public function store(CustomerStoreRequest $request)
    {
        $customer = new Customer();

        $customer = Customer::create($request->only([
            'first_name', 'last_name', 'email', 'phone', 'account_no', 'about',
        ]));

        // Handle image file
        if ($request->hasFile('image')) {
            // store in public files
            $customer->image = $this->imageService->generateFilePath($request->File('image'));
        }
        $customer->save();

        return redirect()->route('customers.index')->with('status-success', 'Customer added successfully!');
    }

    public function show(string $id)
    {
        $customer = Customer::findOrFail($id);
        return view('customer.show', compact('customer'));
    }

    public function edit(string $id)
    {
        $customer = Customer::findOrFail($id);
        return view('customer.edit', compact('customer'));
    }

    public function update(CustomerStoreRequest $request, string $id)
    {
        $customer = Customer::findOrFail($id);

        // Handle image file
        if ($request->hasFile('image')) {
            // assign new image file
            $image = $request->file('image');
            // delete old profile image from storage
            $this->imageService->deleteFromStorage($image);
            // assign new file path and save file in storage
            $customer->image = $this->imageService->generateFilePath($image);
        }

        $customer->first_name = $request->first_name;
        $customer->last_name  = $request->last_name;
        $customer->email      = $request->email;
        $customer->phone      = $request->phone;
        $customer->account_no = $request->account_no;
        $customer->about      = $request->about;
        $customer->save();

        // Session::flash('status', 'Customer updated successfully!');

        return redirect()->route('customers.index')->with('status-success', 'Customer updated successfully!');
    }

    public function destroy(string $id)
    {
        $customer = Customer::findOrFail($id);
        $this->imageService->deleteFromStorage($customer->image);
        $customer->delete();

        return redirect()->route('customers.index')->with('status-success', 'Customer deleted successfully!');
    }

}