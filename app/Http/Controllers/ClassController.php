<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    //
    public function index(){
        if (!session()->has('student_id')) {
            return redirect('/login')->with('fail', 'Please login first.');
        }
        $classes=Classes::all();
      return view('classes.index',['classes'=>$classes]);  
    }
    public function add(){
        if (!session()->has('student_id')) {
            return redirect('/login')->with('fail', 'Please login first.');
        }
      return view('classes.add'); 
    }
    public function store(Request $request){
        {
            // Validate the input
            $request->validate([
                'name' => 'required|string|max:255',
            ]);
    
            try {
                // Save the subject
                Classes::insert([
                    'name' => $request->name,
                    'created_at'=>now(),
                ]);
                return redirect()->route('class.index')->with('success', 'Class added successfully!');
            } catch (\Exception $e) {
                return back()->with('fail', 'Failed to add subject. Please try again.');
            }
        }
    }
    public function edit($id)
    {
        if (!session()->has('student_id')) {
            return redirect('/login')->with('fail', 'Please login first.');
        }

        $class = Classes::findOrFail($id);
        return view('classes.edit', compact('class'));
    }

    // Update the class
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        try {
            Classes::where('id', $id)->update([
                'name' => $request->name,
                'updated_at' => now(),
            ]);

            return redirect()->route('class.index')->with('success', 'Class updated successfully!');
        } catch (\Exception $e) {
            return back()->with('fail', 'Failed to update class. Please try again.');
        }
    }

    // Delete the class
    public function destroy($id)
    {
        try {
            Classes::destroy($id);
            return redirect()->route('class.index')->with('success', 'Class deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->route('class.index')->with('fail', 'Failed to delete class.');
        }
    }
}
