<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::latest()->get();

        return $employees->toJson();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:30|min:5',
            'address' => 'required|max:20|min:5',
            'phone' => 'required|numeric'
        ]);
        $record = new Employee;

        $record->name = $request->get('name');
        $record->address = $request->get('address');
        $record->phone = $request->get('phone');
        $record->department = $request->get('department');
        $record->position = $request->get('position');
        $record->salary = $request->get('salary');
        $record->hire_date = $request->get('hire_date');

        $record->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Employee::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|max:30|min:5',
            'address' => 'required|max:20|min:5',
            'phone' => 'required|max:15|numeric|min:5'
        ]);

        $record = Employee::find($id);

        $record->name = $request->get('name');
        $record->address = $request->get('address');
        $record->phone = $request->get('phone');
        $record->department = $request->get('department');
        $record->position = $request->get('position');
        $record->salary = $request->get('salary');
        $record->hire_date = $request->get('hire_date');

        $record->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = Employee::find($id);
        $record->delete();
    }
}
