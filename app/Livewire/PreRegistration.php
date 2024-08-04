<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Participant;
use Livewire\Attributes\Url;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class PreRegistration extends Component
{
    use LivewireAlert;

    public $first_name, $middle_name, $last_name, $gender, $participant_id;
    #[Url]
    public $search = '';

    protected function rules()
    {
        return [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender' => 'required',
        ];
    }

    public function openModal()
    {
        $this->isModalOpen = true;
    }

    public function closeModal()
    {
        $this->isModalOpen = false;
    }

    public function register()
    {
        $this->validate();

        Participant::updateOrCreate(
            ['id' => $this->participant_id],
            [
                'first_name' => $this->first_name,
                'middle_name' => $this->middle_name,
                'last_name' => $this->last_name,
                'gender' => $this->gender,
                'church_id' => Auth::user()->church_id,
                'user_id' => Auth::user()->id,
            ]
        );

        $this->alert('success', 'Participant saved successfully.');
        // session()->flash('message', 'Participant registered successfully.');
        $this->reset();
        // $this->closeModal();
    }

    public function clear()
    {
        $this->reset();
    }

    public function render()
    {
        return view('livewire.pre-registration', [
            'records' => $this->records
        ]);
    }

    public function getRecordsProperty()
    {
        return Participant::where('church_id', Auth::user()->church_id)
            ->where(function ($query) {
                $query->where('first_name', 'like', '%' . $this->search . '%')
                    ->orWhere('middle_name', 'like', '%' . $this->search . '%')
                    ->orWhere('last_name', 'like', '%' . $this->search . '%')
                    ->orWhere('gender', 'like', '%' . $this->search . '%');
            })
            ->latest()
            ->paginate(10);
    }

    public function edit($id)
    {
        $data = Participant::find($id);

        $this->first_name = $data->first_name;
        $this->middle_name = $data->middle_name;
        $this->last_name = $data->last_name;
        $this->gender = $data->gender;
        $this->participant_id = $id;
    }

    public function delete($id)
    {
        $participant = Participant::find($id);
        if ($participant) {
            $participant->delete();
            $this->alert('success', 'Participant deleted successfully.');
        }
    }

}
