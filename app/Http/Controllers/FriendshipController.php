<?php

namespace App\Http\Controllers;

use App\Models\Friendship;
use App\Models\User;
use Illuminate\Http\Request;

class FriendshipController extends Controller
{

    public function addfriend(Request $request)
    {

        try {
            $data['UserID1'] = $request->user()->id;
            $data['UserID2'] = $request->input('user_id');
            $data['Status'] = "pending";

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

    public function acceptPendingRequests(Request $request)
    {
        $request_sender_id = $request->input('sender_id');

        $updatedRows = Friendship::where('Status', 'pending')
            ->where('UserID2', $request->user()->id)
            ->where('UserID1', $request_sender_id)
            ->update(['Status' => 'accepted']);

        if ($updatedRows) {
            return redirect()->back();
        }
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = request()->user()->id;

        // Get the list of friends where the current user is either UserID1 or UserID2
        $friends = User::whereIn('id', function ($query) use ($userId) {
            $query->select('UserID2')
                  ->from('friendships')
                  ->where('UserID1', $userId)
                  ->where('Status', 'accepted');
        })
        ->orWhereIn('id', function ($query) use ($userId) {
            $query->select('UserID1')
                  ->from('friendships')
                  ->where('UserID2', $userId)
                  ->where('Status', 'accepted');
        })
        ->get();
        
        return view('friendship.index', ['friends' => $friends]);
    }



    public function friendrequests()
    {

        if (request()->ajax()) {
            $friendrequests = Friendship::query()->where('UserID2', request()->user()->id)
                ->where('Status', 'pending')
                ->orderBy('created_at', 'desc')
                ->get();

            return response()->json($friendrequests);
        } else {

            $friendrequests = Friendship::query()->where('UserID2', request()->user()->id)
                ->where('Status', 'pending')
                ->orderBy('created_at', 'desc')
                ->get();


            return view('friendship.friendrequest', [
                'friendrequests' => $friendrequests
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Friendship $friendship)
    {
        $request_sender_id = request()->input('sender_id');

        $deleteRow = Friendship::query()
            ->where('UserID1', $request_sender_id)
            ->where('UserID2', request()->user()->id)
            ->where('Status', 'pending')
            ->delete();

        if ($deleteRow) {
            return redirect()->back();
        }
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
        // if (request()->ajax()) {
        //     $friendrequests = Friendship::query()->where('UserID2', request()->user()->id)
        //         ->orderBy('created_at', 'desc')
        //         ->get();

        //     return response()->json($friendrequests);
        // }

        // return to_route("dashboard");


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
}
