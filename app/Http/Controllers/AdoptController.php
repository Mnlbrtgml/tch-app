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

        $adopts = Adopt::query()->get(['*'])->where('is_accepted', '=', false);

        return Inertia::render('Adopt/Index', [
            'adopts' => $adopts->map(function ($adopt) {
                return [
                    'cat_id' => $adopt->cat_id,
                    'user_id' => $adopt->user_id,
                    'first_name' => $adopt->first_name,
                    'last_name' => $adopt->last_name,
                    'address' => $adopt->address,
                    'phone_number' => $adopt->phone_number,
                    'age' => $adopt->age,
                    'email' => $adopt->email,
                    'citizenship' => $adopt->citizenship,
                    'occupation' => $adopt->occupation,
                    'radioQuestion' => $adopt->radioQuestion,
                    'is_accepted' => $adopt->is_accepted,
                ];
            })
        ]);
        // return Inertia::render('Adopt/Index');
    }

    public function client()
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
        $adopt->user_id = $request->userID;
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

        return  redirect()->route('adopts.client');
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
        $request->validate([
            'cat_id' => 'required',
            'user_id' => 'required',
            'first_name' => 'required',
            'last_name' => 'required|min:11|max:11',
            'address' => 'required',
            'email' => 'required',
            'citizenship' => 'required',
            'occupation' => 'required',
        ]);

        dd($request->cat_id);

        $adopt->update(
            [
                'cat_id' => $request->cat_id,
                'user_id' => $request->user_id,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'address' => $request->address,
                'phone_number' => $request->phone_number,
                'age' => $request->age,
                'email' => $request->email,
                'citizenship' => $request->citizenship,
                'occupation' => $request->occupation,
                'radioQuestion' => $request->radioQuestion,
                'is_accepted' => true,
            ]
        );


        return  redirect()->route('adopts.index');
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
        $adopt->delete();

        return  redirect()->route('adopts.index');
    }
}
