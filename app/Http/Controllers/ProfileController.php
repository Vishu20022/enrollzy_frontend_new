<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Show the user profile edit form.
     */
    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    /**
     * Update the user profile.
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'mobile' => ['nullable', 'string', 'max:15'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:2048'],
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
        ];

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            
            // Move to public/images/profiles directly
            $destinationPath = public_path('images/profiles');
            
            // Delete old image if it exists
            if ($user->image && file_exists(public_path('images/profiles/' . $user->image))) {
                unlink(public_path('images/profiles/' . $user->image));
            }

            $file->move($destinationPath, $filename);
            $data['image'] = $filename;
        }

        $user->update($data);

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }

    /**
     * Update only the user's name.
     */
    public function updateName(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $user->update([
            'name' => $request->name,
        ]);

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Name updated successfully!',
                'name' => $user->name,
            ]);
        }

        return redirect()->back()->with('success', 'Name updated successfully!');
    }
}

