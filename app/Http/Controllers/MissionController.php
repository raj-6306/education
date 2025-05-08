<?php

namespace App\Http\Controllers;

use App\Models\Mission;
use Illuminate\Http\Request;

class MissionController extends Controller
{
    //
    public function index()
    {
        if (!session()->has('student_id')) {
            return redirect('/login')->with('fail', 'Please login first.');
        }
        $qas =Mission::latest()->get();
        return view('mission.index', compact('qas'));
    }

    public function create(){
        if (!session()->has('student_id')) {
            return redirect('/login')->with('fail', 'Please login first.');
        }
        return view('mission.add');
    }
    public function store(Request $request)
    {
        if (!session()->has('student_id')) {
            return redirect('/login')->with('fail', 'Please login first.');
        }
        $validated = $request->validate([
            'question' => 'required|string',
            'answer'   => 'required|string',
        ]);

        try {
            Mission::create($validated);
            return redirect()->route('mission.index')->with('success', 'Question and answer added successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('fail', 'Failed to add the question and answer.');
        }
    }
    public function edit($id) {
        if (!session()->has('student_id')) {
            return redirect('/login')->with('fail', 'Please login first.');
        }
        $qa = Mission::findOrFail($id);
        // return $qa;die;
        return view('mission.edit',compact('qa'));
    }
    public function update(Request $request, $id)
    {
        if (!session()->has('student_id')) {
            return redirect('/login')->with('fail', 'Please login first.');
        }
        $validated = $request->validate([
            'question' => 'required|string|max:255',
            'answer'   => 'required|string',
        ]);

        try {
            $qa = Mission::findOrFail($id);
            $qa->update($validated);

            return redirect()->route('mission.index')->with('success', 'Question and answer updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('fail', 'Failed to update the question and answer.');
        }
    }
    public function destroy($id)
    {
        try {
            $qa = Mission::findOrFail($id);
            $qa->delete();

            return redirect()->route('qa.index')->with('success', 'Q&A deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('mission.index')->with('fail', 'Failed to delete Q&A.');
        }
    }
    public function show()
    {
        $qas = Mission::all();
        return view('mission.mission-view', compact('qas'));
    }
}
