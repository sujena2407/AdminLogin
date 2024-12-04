<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Customer;
use App\Models\Project;
use App\Models\Unit;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    // Display the list of sales
    public function index()
    {
        $sales = Sale::all(); // Fetch all sales
        return view('admin.sales.index', compact('sales'));
    }

    // Show the form to create a new sale
    public function create()
    {
        // Get necessary data for the form (e.g., customers, projects, units)
        $customers = Customer::all();
        $projects = Project::all();
        $units = Unit::all();

        // Return the view with data
        return view('admin.sales.new-sales', compact('customers', 'projects', 'units'));
    }

    // Store a newly created sale
    public function store(Request $request)
    {
        // Validate incoming request
        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'project_id' => 'required|exists:projects,id',
            'unit_id' => 'required|exists:units,id',
            'sale_date' => 'required|date',
            'sale_unit_price' => 'required|numeric',
            'sale_unit_discount_price' => 'nullable|numeric',
            'sale_by' => 'required',
            // Add any other fields as necessary
        ]);

        // Create the sale
        $sale = Sale::create([
            'customer_id' => $validated['customer_id'],
            'project_id' => $validated['project_id'],
            'unit_id' => $validated['unit_id'],
            'sale_date' => $validated['sale_date'],
            'sale_unit_price' => $validated['sale_unit_price'],
            'sale_unit_discount_price' => $validated['sale_unit_discount_price'] ?? null,
            'sale_by' => $validated['sale_by'],
            // Add any other fields as necessary
        ]);

        // Redirect to a specific page after successful creation
        return redirect()->route('admin.sales')->with('success', 'Sale created successfully');
    }

    // Show the details of a specific sale
    public function show($id)
    {
        $sale = Sale::findOrFail($id); // Fetch the sale by ID
        return view('admin.sales.show', compact('sale'));
    }

    // Show the form to edit an existing sale
    public function edit($id)
    {
        $sale = Sale::findOrFail($id); // Fetch the sale by ID
        $customers = Customer::all();
        $projects = Project::all();
        $units = Unit::all();

        return view('admin.sales.edit', compact('sale', 'customers', 'projects', 'units'));
    }

    // Update an existing sale
    public function update(Request $request, $id)
    {
        // Validate incoming request
        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'project_id' => 'required|exists:projects,id',
            'unit_id' => 'required|exists:units,id',
            'sale_date' => 'required|date',
            'sale_unit_price' => 'required|numeric',
            'sale_unit_discount_price' => 'nullable|numeric',
            'sale_by' => 'required',
        ]);

        // Find the sale and update
        $sale = Sale::findOrFail($id);
        $sale->update($validated);

        // Redirect to the sales list
        return redirect()->route('admin.sales')->with('success', 'Sale updated successfully');
    }

    // Delete an existing sale
    public function destroy($id)
    {
        $sale = Sale::findOrFail($id);
        $sale->delete();

        return redirect()->route('admin.sales')->with('success', 'Sale deleted successfully');
    }
}
