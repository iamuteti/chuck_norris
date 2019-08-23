<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Juror;

class JurorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jurors = Juror::all();

                return view('jurors.index', compact('jurors'));
    }


            public function all()
            {
                $jokes = Juror::all();

                return $jokes;
            }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jurors.create');
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
                        'first_name'=>'required'
                      ]);
                      $juror = new Juror([
                        'first_name' => $request->get('first_name'),
                        'last_name' => $request->get('last_name')
                      ]);
                      $juror->save();
                      return redirect('/jurors')->with('success', 'Juror has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $juror = Juror::find($id);

                return view('jurors.edit', compact('juror'));
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
        $request->validate([
                        'first_name'=>'required'
                      ]);

                      $juror = Juror::find($id);
                      $juror->first_name = $request->get('first_name');
                      $juror->last_name = $request->get('last_name');
                      $juror->save();

                      return redirect('/jurors')->with('success', 'Juror has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $juror = Juror::find($id);
                     $juror->delete();

                     return redirect('/jurors')->with('success', 'Juror has been deleted Successfully');
    }
}
