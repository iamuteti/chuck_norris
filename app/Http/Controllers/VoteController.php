<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vote;
use App\Juror;
use App\Joke;

class VoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $votes = Vote::all();

                return view('votes.index', compact('votes'));
    }

            public function all()
            {
                $jokes = Vote::with(['joke', 'juror'])->get();

                return $jokes;
            }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jokes = Joke::all();
        $jurors = Juror::all();

                return view('votes.create', compact(['jokes', 'jurors']));
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
                                'joke_id'=>'required',
                                'juror_id'=>'required',
                                'vote'=>'required',
                              ]);
                              $vote = Vote::updateOrCreate(['juror_id' => $request->juror_id, 'joke_id' => $request->joke_id], [
                                                                    'vote' => $request->vote
                                                                ]);
                                                                $vote->save();

                                                                return $vote;
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vote = Vote::find($id);
                             $vote->delete();

                             return redirect('/votes')->with('success', 'Vote has been deleted Successfully');
    }
}
