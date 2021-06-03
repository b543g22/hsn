<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Http\Requests\StoreMember;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = Member::all();
        return response()->json([
            'message' => 'ok',
            'data' => $members
        ],200,[], JSON_UNESCAPED_UNICODE);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMember $request)
    {
        $member = Member::create($request->all());
        return response()->json([
            'message' => 'Member created successfully',
            'data' => $member
        ],201,[],JSON_UNESCAPED_UNICODE);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $member = Member::find($id);
        if($member) {
            return response()->json([
                'message' => 'ok',
                'data' => $member
            ],200,[],JSON_UNESCAPED_UNICODE);
        } else {
            return response()->json([
                'message' => 'Member not found',
            ],404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreMember $request, $id)
    {
        $update = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'updkbn' => $request->updkbn
        ];
        $member = Member::where('id',$id)->update($update);
        if($member) {
            return response()->json([
                'message' => 'Book updated successfully',
            ], 200);
        } else {
            return response()->json([
                'message' => 'Book not found',
            ],404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $member = Member::where('id',$id)->delete();
        if($member) {
            return response()->json([
                'message' => 'Member deleted successfully',
            ],200);
        } else {
            return response()->json([
                'message' => 'Member not found',
            ],404);
        }
    }
}
