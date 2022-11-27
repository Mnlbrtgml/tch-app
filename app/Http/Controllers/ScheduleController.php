<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedule = Schedule::All();

        return Inertia::render('Schedule/Index', [
            'schedules' => $schedule
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required|min:11|max:11',
            'email' => 'required',
            'animal_id' => 'required',
            'animal_name' => 'required',
            'address' => 'required',
            'appointment' => 'required',
        ]);

        $schedule = new Schedule();
        $schedule->first_name = $request->first_name;
        $schedule->last_name = $request->last_name;
        $schedule->phone_number = $request->phone_number;
        $schedule->email = $request->email;
        $schedule->animal_id = $request->animal_id;
        $schedule->animal_name = $request->animal_name;
        $schedule->address = $request->address;
        $schedule->appointment = $request->appointment;
        $schedule->save();

        return  redirect()->route('schedules.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function show(Schedule $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function edit(Schedule $schedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Schedule $schedule)
    {
        //
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required|min:11|max:11',
            'email' => 'required',
            'animal_id' => 'required',
            'animal_name' => 'required',
            'address' => 'required',
            'appointment' => 'required',
        ]);

        $schedule->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'animal_id' => $request->animal_id,
            'animal_name' => $request->animal_name,
            'address' => $request->address,
            'appointment' => $request->appointment,
        ]);

        return  redirect()->route('schedules.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schedule $schedule)
    {
        //
        $schedule->delete();

        return redirect()->route('schedules.index');
    }
}
