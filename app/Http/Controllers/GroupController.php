<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Group;

use App\Http\Requests\UpsertGroupRequest;

class GroupController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('groups.group');
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
    public function store(UpsertGroupRequest $request)
    {
        $data = $request->validated();

        Group::create([
            'name' => $data['name'],
            'type' => 'user',
            'status' => false,
            'user_id' => $request->user()->id,
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Download groups movies with the main category
        $group = Group::with(['groupMovie' => function($q) 
            {
                $q->with(['movie' => function($q) 
                    {
                        $q->with('genre');
                    }
                ])->orderByDesc('movie_id');
            }
            ])->where('id', $id)->where('user_id', Auth::id())->get();

        
        return view('groups.show', ['group' => $group]);
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
    public function update(UpsertGroupRequest $request)
    {
        $data = $request->validated();

        Group::where('id', $request->id)->where('user_id', $request->user()->id)->update([
            'name' => $data['name'],
        ]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $group = Group::find($id);
        $group->delete();

        return redirect(route('library'));
    }
}
