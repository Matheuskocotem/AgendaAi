<?php

namespace App\Http\Controllers;

use App\Services\MeetingService;
use App\Http\Requests\MeetingRequest;

class MeetingController extends Controller
{
    protected $meetingService;

    public function __construct(MeetingService $meetingService)
    {
        $this->meetingService = $meetingService;
    }

    public function index()
    {
        return response()->json($this->meetingService->listMeetings(), 200);
    }

    public function store(MeetingRequest $request)
    {
        return response()->json($this->meetingService->createMeeting($request->validated()), 201);
    }

    public function show($id)
    {
        $meeting = $this->meetingService->findMeeting($id);
        if ($meeting) {
            return response()->json($meeting, 200);
        }
        return response()->json(['error' => 'reunião não encontrada'], 404);
    }

    public function update(MeetingRequest $request, $id)
    {
        $updatedMeeting = $this->meetingService->updateMeeting($id, $request->validated());
        if ($updatedMeeting) {
            return response()->json($updatedMeeting, 200);
        }
        return response()->json(['error' => 'reunião não encontrada'], 404);
    }

    public function destroy($id)
    {
        $deleted = $this->meetingService->deleteMeeting($id);
        if ($deleted) {
            return response()->json(null, 204);
        }
        return response()->json(['error' => 'reunião não encontrada'], 404);
    }
}
