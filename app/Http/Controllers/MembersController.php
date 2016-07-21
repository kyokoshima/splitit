<?php

namespace App\Http\Controllers;
use App\Member;
use Illuminate\Http\Request;
use Validator, Response, Input;

use App\Http\Requests;


class MembersController extends Controller
{
    public function search() {
      return response()->json(Member::all());
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
        $rules = [
          'name' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->passes()) {
          $member = new Member;
					$member->bill_id = 0;
          $member->name = $request->get('name');
          // dd($request);
          $member->save();
          $members = Member::all();
          return response()->json([
            'success' => true,
            'message' => 'record updated',
            'members' => $members
          ], 200);
        }
        $errors = $validator->errors();
        $errors = json_decode($errors);

        return response()->json([
                'success' => false,
                'message' => $errors
            ], 422);
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
        //
    }
}
