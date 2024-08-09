<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use App\Models\Like;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function upload_pp(Request $request)
    {

        $data = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($request->hasFile('image')) {
            // Generate a unique name for the image based on the current timestamp
            $imageName = time() . '.' . $request->image->extension();

            // Move the uploaded image to the 'pp_images' directory
            $request->image->move(public_path('images/pp_images'), $imageName);

            // Store the image name in the 'imageurl' field of the data array
            $data['profile_picture'] = $imageName;
        }

        // Find the authenticated user
        $user = $request->user();

        // Update the user's profile picture
        $user->update($data);

        // Redirect the user to the 'dashboard' route
        return redirect()->back();
    }


    public function show(User $user)
    {
        $posts = Post::query()->where('UserID', $user->id)
            ->orderBy('created_at', 'desc')
            ->paginate();

        // Fetch the IDs of liked posts for the authenticated user
        $likedPosts = Like::where('UserID', $user->id)->pluck('PostID')->toArray();

        // Pass the posts and liked posts to the view
        return view('profile.show', [
            'user' => $user,
            'posts' => $posts,
            'likedPosts' => $likedPosts,
        ]);
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
