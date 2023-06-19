<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\User;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $approvedItems=Inventory::where('status','approved')->get();
        return response()->json($approvedItems);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('inventory.addItem');
    }

    /**
     * Store a newly created resource in storage.
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
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $itemId)
    {
        $inventoryItem=Inventory::findOrFail($itemId);

        return response()->json($inventoryItem);
    }

    /**
     * Update the specified resource in storage.
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
     * Remove the specified resource from storage.
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
        $pendingItems=Inventory::where('status', 'pending')->get();

        return response()->json($pendingItems);
    }
}
