<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get All guests
        $guests = Guest::paginate(8);
        return view('guests.index', compact('guests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('guests.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $guest=Guest::create($request->all());
        if ($guest) {
            Alert::success('Success','Guset Infos added Successfully');
            return redirect()->route('guests.index');
        } else {
            Alert::error('Error','Problem While Saving, Please Try Again');
        }
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function show(Guest $guest)
    {
        return view('guests.show', compact('guest'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function edit(Guest $guest)
    {
        return view('guests.edit', compact('guest'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Guest $guest)
    {
        $guest = Guest::findOrFail($guest->id);
        $guest->update($request->all());

        if ($guest) {
            Alert::success('Success','Guset Infos Updated Successfully');
            return redirect()->route('guests.index');
        } else {
            Alert::error('Error','Problem While Saving, Please Try Again');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $guest=Guest::find($id)->delete();
        return redirect()->back();
    }

}
