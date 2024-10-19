<?php 

namespace App\Services;

use App\Repositories\MeetingRepository;

class MeetingService
{
    protected $meetingRepository;

    public function __construct(MeetingRepository $meetingRepository)
    {
        $this->meetingRepository = $meetingRepository;
    }

    // Listar todas as reuniões
    public function listMeetings()
    {
        return $this->meetingRepository->all();
    }

    // Criar uma nova reunião
    public function createMeeting(array $data)
    {
        return $this->meetingRepository->create($data);
    }

    // Atualizar uma reunião
    public function updateMeeting($id, array $data)
    {
        $meeting = $this->meetingRepository->find($id);
        if ($meeting) {
            return $this->meetingRepository->update($meeting, $data);
        }
        return null; 
    }

    // Deletar uma reunião
    public function deleteMeeting($id)
    {
        $meeting = $this->meetingRepository->find($id);
        if ($meeting) {
            return $this->meetingRepository->delete($meeting);
        }
        return null; // Ou lançar uma exceção
    }
}
