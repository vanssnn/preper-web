<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MsUser;
use App\Models\TrMentoringSchedule;
use App\Models\MsSubject;
use Illuminate\Support\Str;


class SessionRequestController extends Controller
{
    public function showForm(Request $request)
    {
        $userID = $request->query('userID');

        $user = MsUser::where('UserId', $userID)->first();

        if (!$user) {
            return redirect('/')->with('error', 'User not found.');
        }

        if ($user->RoleId === '2') {
            return redirect('/')->with('error', 'Access denied.');
        }

        $subjects = MsSubject::all();

        return view('request_sesi', compact('user', 'subjects'));
    }

    public function submitForm(Request $request)
    {
        $validatedData = $request->validate([
            'batch' => 'required|string|in:Batch 1 (07:20 - 09:00),Batch 2 (09:20 - 11:00),Batch 3 (11:20 - 13:00),Batch 4 (13:20 - 15:00),Batch 5 (15:20 - 17:00),Batch 6 (17:20 - 19:00)',
            'subject' => 'required|string|exists:mssubject,SubjectId',
            'specificTopic' => 'nullable|string',
        ]);

        $userID = $request->query('userID');
        $user = MsUser::where('UserId', $userID)->first();

        if (!$user) {
            return redirect('/')->with('error', 'User not found.');
        }

        $batchTimes = [
            'Batch 1 (07:20 - 09:00)' => '07:20',
            'Batch 2 (09:20 - 11:00)' => '09:20',
            'Batch 3 (11:20 - 13:00)' => '11:20',
            'Batch 4 (13:20 - 15:00)' => '13:20',
            'Batch 5 (15:20 - 17:00)' => '15:20',
            'Batch 6 (17:20 - 19:00)' => '17:20'
        ];

        $startTime = $batchTimes[$validatedData['batch']];

        $meetingTime = now()->format('Y-m-d') . ' ' . $startTime . ':00';

        TrMentoringSchedule::create([
            'TrMentoringScheduleId' => (string) Str::uuid(),
            'IsDone' => false,
            'MeetingTime' => $meetingTime,
            'MeetingLink' => '',
            'MentorReview' => null,
            'MenteeReview' => null,
            'MenteeUserId' => $userID,
            'MentorUserId' => null,
            'UniqueCode' => getUniqueCode(),
            'SubjectId' => $validatedData['subject'],
            'SpecificTopic' => $validatedData['specificTopic'] ?? '',
        ]);

        return redirect('/')->with('success', 'Mentoring session requested successfully.');
    }
}
