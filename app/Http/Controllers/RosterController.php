<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Roster;

class RosterController extends Controller
{
    public function index(){
        $roster = Roster::all();
        return view('roster.index', ['roster' => $roster]);
        
    }

    public function create(){
        return view('roster.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'date' => 'required|date',
            'day' => 'required'
        ]);

        $newRoster = Roster::create($data);

        return redirect(route('roster.index'));
    }

    public function edit(Roster $roster){
        return view('roster.edit', ['roster' => $roster]);
    }

    public function update(Roster $roster, Request $request){
        $data = $request->validate([
            'name' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'date' => 'required|date',
            'day' => 'required'
        ]);

        $roster->update($data);

        return redirect(route('roster.index'))->with('success', 'Roster Updated Successfully');
    
    }

    public function destroy(Roster $roster){
        $roster->delete();
        return redirect(route('roster.index'))->with('success', 'Roster Deleted Successfully');
    }
}
