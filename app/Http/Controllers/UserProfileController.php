<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MsUser;
use App\Models\MsSubject;

class UserProfileController extends Controller
{
    public function showProfile(Request $request)
    {
        $userID = $request->query('id');
        $user = MsUser::where('UserId', $userID)->first();

        if (!$user) {
            return redirect('/')->with('error', 'User not found.');
        }

        $subjects = MsSubject::all();

        return view('profile', compact('user', 'subjects'));
    }

    public function saveProfile(Request $request)
    {
        $validatedData = $request->validate([
            'role' => 'required|string|in:mentee,mentor',
            'fullName' => 'required|string|max:255',
            'subject' => 'nullable|string|exists:mssubject,SubjectId',
            'whatsapp' => 'required|string|max:15',
        ]);

        $userID = $request->query('id');
        $user = MsUser::where('UserId', $userID)->first();

        if (!$user) {
            return redirect('/')->with('error', 'User not found.');
        }

        $user->UserName = $validatedData['fullName'];
        $user->UserPhoneNumber = $validatedData['whatsapp'];
        $user->IsValid = false;

        if ($validatedData['role'] == 'mentor') {
            $user->RoleId = '2';
            $user->SubjectId = $validatedData['subject'];
        } else {
            $user->RoleId = '1';
            $user->SubjectId = null;
        }

        $user->save();

        return redirect('/')->with('success', 'Profile updated successfully.');
    }
}
