<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $links = Auth::user()->links()->get();

        return view('dashboard.dashboard', compact('links'));
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
        $validate = Validator::make($request->all(), [

            'name' => ['required', 'max:20', 'string'],
            'link' => ['required', 'url', 'unique:links,link']
        ]);

        if ($validate->fails()) {

            return response()->json([
                'status' => 'failed',
                'errors' => $validate->errors()->toArray()
            ]);
        } else {

            $link = Auth::user()->links()->create($request->only(['name', 'link']));

            //this for console log only
            if ($link) {
                return response()->json([
                    'success' => 'success'
                ]);
            }
        }
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
        $linkInfo = Link::findOrFail($id);

        return response()->json([
            'linkInfo' => $linkInfo
        ]);
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
        $findLink = Link::findOrFail($id);
        $validate = Validator::make($request->all(), [

            'name' => ['required', 'max:20', 'string'],
            'link' => ['required', 'url', 'unique:links,link,' . $id]
        ]);

        if ($validate->fails()) {

            return response()->json([
                'status' => 'failed',
                'errors' => $validate->errors()->toArray()
            ]);
        } else {

            //this is to Detect changes in the faileds
            if ($findLink->name !== $request->name || $findLink->link !== $request->link) {

                Link::whereId($id)->update($request->only(['name', 'link']));

                //this for console log only
                return response()->json([
                    'status' => 'changeSuccess',
                ]);
            } else {
                return response()->json([
                    'status' => 'noChanges',
                ]);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Link $link)
    {
        $link->delete();
        if ($link) {

            return response()->json([

                'status' => 'success'
            ]);
        }
    }
}
