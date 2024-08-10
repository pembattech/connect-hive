<?php

namespace App\Http\Controllers;

use App\Models\Friendship;
use Illuminate\Http\Request;

class FriendshipController extends Controller
{

    public function addfriend(Request $request)
    {

        try {
            $data['UserID1'] = $request->user()->id;
            $data['UserID2'] = $request->input('user_id');
            $data['Status'] = "pending";


            // Proceed with sending a new friend request
            $data['UserID1'] = $request->user()->id;
            $data['UserID2'] = $request->input('user_id');
            $data['Status'] = 'pending';

            $add_friend = Friendship::create($data);

            return response()->json(['message' => 'pending']);
        } catch (\Exception $e) {
            // Log the exception for debugging
            \Log::error('Error in addfriend: ' . $e->getMessage());

            // Return a JSON error response
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }

    public function is_sendreq(Request $request)
    {

        $friend_req = Friendship::query()
            ->where('UserID1', $request->user()->id)  // The sender's ID
            ->where('UserID2', $request->input('user_id'))  // The recipient's ID
            ->where('Status', 'pending')  // Optionally check for pending status
            ->exists();  // Returns true if a match is found

        if ($friend_req) {
            return response()->json(['message' => $friend_req]);
        }
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Friendship $friendship)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Friendship $friendship)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Friendship $friendship)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Friendship $friendship)
    {
        //
    }
}
