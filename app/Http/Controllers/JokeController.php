<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Joke;
use App\Category;
use App\JokeCategory;

class JokeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jokes = Joke::all();

        return view('jokes.index', compact('jokes'));
    }

        public function all()
        {
            $jokes = Joke::with(['categories'])->get();

            return $jokes;
        }

                public function random()
                {
                    $joke = Joke::with(['categories'])->orderByRaw("RAND()")->first();
                    // $joke = Joke::orderByRaw("RAND()")->first();

                    return $joke;
                }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('jokes.create', compact('categories'));
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
                        'title'=>'required'
                      ]);
                      $joke = new Joke([
                        'title' => $request->get('title'),
                        'date' => $request->get('date')
                      ]);

                      $joke->save();

                      $category = Category::find($request->get('categories'));
                      $joke->categories()->attach($category);

                      return redirect('/jokes')->with('success', 'Joke has been added');
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
        $joke = Joke::find($id);
        $categories = Category::all();

        return view('jokes.edit', compact(['joke', 'categories']));
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
                    'title'=>'required'
                ]);

                $joke = Joke::find($id);
                $joke->title =  $request->get('title');
                $joke->date = $request->get('date');
                $joke->save();

                $joke->categories()->sync($request->get('categories'));

                return redirect('/jokes')->with('success', 'Joke has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $joke = Joke::find($id);
                     $joke->delete();

                     $jokeCategory = JokeCategory::where('joke_id', $id);
                     $jokeCategory->delete();

                     return redirect('/jokes')->with('success', 'Joke has been deleted Successfully');
    }

    public function listByCategory($id) {
            $jokes = Joke::whereHas('categories', function ($q) use ($id) {
                $q->where('category_id', $id);
            })->get();

            return $jokes;
        }

    public function byCategory($category) {
        $jokes = Joke::whereHas('categories', function ($q) use ($category) {
            $q->where('category_id', $category);
        })->get();

        return view('jokes.jokesByCategory', compact('jokes'));
    }
}
