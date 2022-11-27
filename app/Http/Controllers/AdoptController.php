<?php

namespace App\Http\Controllers;

use App\Models\Adopt;
use App\Models\Cat;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdoptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cats = Cat::all();

        return Inertia::render('Adopt/Client', [
            'cats' => $cats->map(function ($cat) {
                return [
                    'id' => $cat->id,
                    'name' => $cat->name,
                    'gender' => $cat->gender,
                    'age_category' => $cat->age_category,
                    'tags' => $cat->tags,
                    'color' => $cat->color,
                    'image_path' => asset('storage/' . $cat->image_path),
                ];
            })
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
        // dd($request);
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'address' => 'required',
            'phoneNumber' => 'required|min:11|max:11',
            'age' => 'required',
            'email' => 'required',
            'citizenship' => 'required',
            'occupation' => 'required',
        ]);

        $adopt = new Adopt();
        $adopt->cat_id = $request->catID;
        $adopt->first_name = $request->fname;
        $adopt->last_name = $request->lname;
        $adopt->address = $request->address;
        $adopt->phone_number = $request->phoneNumber;
        $adopt->age = $request->age;
        $adopt->email = $request->email;
        $adopt->citizenship = $request->citizenship;
        $adopt->occupation = $request->occupation;
        $adopt->radioQuestion = $request->jsonRadioQuestion;
        $adopt->is_accepted = false;
        $adopt->save();

        return  redirect()->route('adopts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Adopt  $adopt
     * @return \Illuminate\Http\Response
     */
    public function show(Adopt $adopt)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Adopt  $adopt
     * @return \Illuminate\Http\Response
     */
    public function edit(Adopt $adopt)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Adopt  $adopt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Adopt $adopt)
    {
        //
        // $request->validate([
        //     'fname' => 'required',
        //     'lname' => 'required',
        //     'address' => 'required',
        //     'phoneNumber' => 'required|min:11|max:11',
        //     'age' => 'required',
        //     'email' => 'required',
        //     'citizenship' => 'required',
        //     'occupation' => 'required',
        // ]);

        // $adopt->update(
        //     [
        //         'cat_id' => $request->catID,
        //         'first_name' => $request->fname,
        //         'last_name' => $request->lname,
        //         'address' => $request->address,
        //         'phone_number' => $request->phoneNumber,
        //         'age' => $request->age,
        //         'email' => $request->email,
        //         'citizenship' => $request->citizenship,
        //         'occupation' => $request->occupation,
        //         'radioQuestion' => $request->jsonRadioQuestion,
        //     ]
        // );

        // return  redirect()->route('adopts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Adopt  $adopt
     * @return \Illuminate\Http\Response
     */
    public function destroy(Adopt $adopt)
    {
        //
    }
}
