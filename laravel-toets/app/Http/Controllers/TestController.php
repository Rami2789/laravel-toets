<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $test = Test::where('user_id', Auth::user()->id)->latest('updated_at')->paginate(5);
        return view('tests.index')->with('test', $test);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tests.create');
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
            'title' => 'required|max:120',
            'text' => 'required'
        ]);
    
        $test = new Test([              //nieuw object aan maken van Note model
        'user_id' => Auth::id(),    //id van de huidige user in user_id zetten
        'title' => $request->title, //title (request) in title zetten
        'text' => $request->text    //text (request) in text zetten
    ]);
    $test->save();                  //het object opslaan en dus de rij opslaan in de tabel
    
    return to_route('tests.index'); //redirect naar de route notes.index    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\test  $test
     * @return \Illuminate\Http\Response
     */
    public function show(Test $test)
{
    return view('tests.show')->with('tests', $test);
}


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\test  $test
     * @return \Illuminate\Http\Response
     */
    public function edit(test $test)
    {
        return view('tests.edit')->with('test', $test);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\test  $test
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, test $test)
    {
        $request->validate([
            'title' => 'required|max:120',
            'text' => 'required'
        ]);
    
        $test->update([
            'title' => $request->title,
            'text' => $request->text
        ]);
    
        return to_route('test.show', $test);
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\test  $test
     * @return \Illuminate\Http\Response
     */
    public function destroy(test $test)
    {
        $test->delete();
        return to_route('test.index');
    }
}
