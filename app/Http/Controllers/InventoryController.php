<?php
namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\User;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    /**
     * Display a listing of the item.
     */
    public function index()
    {
        $approvedItems = Inventory::where('appstatus', 'approved')->get();

        return response()->json($approvedItems);
    }


    /**
     * Form for creating a new resource.
     */
    public function create()
    {
        return view('inventory.addItem');
    }

    /**
     * Store a newly created item in inventory.
     */
    public function add(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'quantity' => 'required|numeric',
            'price' => 'required|decimal:0,2',
            'expirydate' => 'required|date',
        ]);
        
        //item with the pending status
        $inventoryItem=new Inventory();
        $inventoryItem->name=$validatedData['name'];
        $inventoryItem->quantity=$validatedData['quantity'];
        $inventoryItem->price=$validatedData['price'];
        $inventoryItem->expirydate=$validatedData['expirydate'];
        $inventoryItem->appstatus='pending';
        $inventoryItem->apprequest='add';

        //$inventoryItem->users_id=$request->User()->id;

        $inventoryItem->save();

        return response()->json(['message'=>'Item added successfully and pending approval']);
    }

    public function approve(Request $request, $itemId)
    {
        //admin approve request
        $inventoryItem=Inventory::findOrFail($itemId);
        $inventoryItem->status = 'approved';
        $inventoryItem->save();

        return response()->json(['message'=>'Item approved successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $searchQuery=$request->input('query');

        $inventoryItems=Inventory::where('name', 'LIKE', "%{$searchQuery}%")->get();

        return response()->json($inventoryItems);
    }

    /**
     * Show the form for editing
     */
    public function edit(Request $request, $itemId)
    {
        $inventoryItem=Inventory::findOrFail($itemId);

        return response()->json($inventoryItem);
    }

    /**
     * Update the specified item
     */
    public function update(Request $request, $itemId)
    {
        $inventoryItem=Inventory::findOrFail($itemId);

        $validatedData = $request->validate([
            'name' => 'required',
            'quantity' => 'required|numeric',
            'price' => 'required|decimal:0,2',
            'expirydate' => 'required|date',
        ]);

        $inventoryItem->name=$validatedData['name'];
        $inventoryItem->quantity=$validatedData['quantity'];
        $inventoryItem->price=$validatedData['price'];
        $inventoryItem->expirydate=$validatedData['expirydate'];
        $inventoryItem->save();

        return response()->json(['message'=>'Item updated successfully']);

    }

    /**
     * Remove the specified item.
     */
    public function delete(Request $request, $itemId)
    {
        $inventoryItem=Inventory::findOrFail($itemId);
        $inventoryItem->delete();
        $inventoryItem->apprequest='delete';
        $inventoryItem->users_id=$request->user()->id;

        return response()->json(['message'=>'Item deleted successfully']);
    }

    public function pendingItems()
    {
        $pendingItems=Inventory::where('appstatus', 'pending')->get();

        return response()->json($pendingItems);
    }

    public function approvalRequest(Request $request, $itemId)
{
    // Admin handles the approval request
    $inventoryItem = Inventory::findOrFail($itemId);
    $action = $request->input('action');

    if ($action === 'approve') {
        $inventoryItem->appstatus = 'approved';
        // Apply the corresponding logic for adding or removing the item from the inventory
    } elseif ($action === 'reject') {
        $inventoryItem->appstatus = 'rejected';
        // Apply the corresponding logic for handling the rejection
    }

    $inventoryItem->save();

    return response()->json(['message' => 'Approval request processed successfully']);
}

}
