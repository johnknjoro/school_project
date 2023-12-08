<?php

namespace App\Http\Livewire\Lecturer;

use App\Models\User;
use Livewire\Component;
use App\Models\Lecturer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Lecturerform extends Component
{

    public $lecturer_id;
    public $name;
    // public $lecturer_no;
    // public $location;

    public $edit_mode = false;

    protected $rules = [
        'name' => 'required|string',
        // 'lecturer_no' => 'required|string',
        // 'location' => 'required|string',
    ];

    protected $listeners = [
        'delete' => 'delete',
        'update' => 'update',
    ];

    public function render()
    {
        return view('livewire.lecturer.lecturerform');
    }

    public function submit()
    {
        // Validate the form input data
        $this->validate();
       
        DB::transaction(function () {
            // Prepare the data for creating a new client

        
            $data = [
                'name' => $this->name,
                // 'location' => $this->location,
                // 'lecturer_no' => $this->lecturer_no,
            ];

            if (!$this->edit_mode) {

                // $data['user_id'] = auth()->user()->id;
                $data['is_lecturer'] = 1;
                $data['password'] = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'; // password

            }
    
           // dd($data);


            // Create a new client record in the database
            $s = User::updateOrCreate([
                'id' => $this->lecturer_id,
            ], $data);

            if ($this->edit_mode) {

                // Emit a success event with a message
                $this->emit('success', __('Lecturer updated'));
                Log::channel('activity')->info("Lecturer updated id:{$this->lecturer_id} by user ". auth()->user()->name);
            } else {
                               // Send a password reset link to the client's email
                //Password::sendResetLink($client->only('email'));

                // Emit a success event with a message
                $this->emit('success', __('New Lecturer created'));
                $this->emit('updateLecturer');
                Log::channel('activity')->notice("New Lecturer created by user ". auth()->user()->name);
            }
        });

        //Reset the form fields after successful submission
        $this->reset();
    }

    public function delete($id)
    {

        // Delete the client record with the specified ID
        User::destroy($id);

        // Emit a success event with a message
        $this->emit('success', 'Lecturer successfully deleted');
        Log::channel('activity')->warning("Lecturer id:{$id} deleted by user ". auth()->user()->name);
    }

    public function update($id)
    {
        $this->edit_mode = true;

        $client = User::find($id);

        $this->name = $client->name;
        // $this->lecturer_no = $client->lecturer_no;
        // $this->location = $client->location;
        $this->lecturer_id = $id;
      
    }

    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }
}

