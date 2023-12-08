<?php

namespace App\Http\Livewire\Student;


use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Studentform extends Component
{

    public $student_id;
    public $name;
    public $student_no;
    // public $location;

    public $edit_mode = false;

    protected $rules = [
        'name' => 'required|string',
        'student_no' => 'required|string',
        // 'location' => 'required|string',
    ];

    protected $listeners = [
        'delete' => 'delete',
        'update' => 'update',
    ];

    public function render()
    {
        return view('livewire.student.studentform');
    }
    public function submit_student()
    {
        // Validate the form input data
        $this->validate();
       
        DB::transaction(function () {
            // Prepare the data for creating a new client

        
            $data = [
                'name' => $this->name,
                // 'location' => $this->location,
                'student_no' => $this->student_no,
            ];

            if (!$this->edit_mode) {

                // $data['user_id'] = auth()->user()->id;
                $data['is_student'] = 1;
                $data['password'] = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'; // password

            }
    
        //    dd($data);


            // Create a new client record in the database
            $s = User::updateOrCreate([
                'id' => $this->student_id,
            ], $data);

            if ($this->edit_mode) {

                // Emit a success event with a message
                $this->emit('success', __('Student updated'));
                Log::channel('activity')->info("Student updated id:{$this->student_id} by user ". auth()->user()->name);
            } else {
                               // Send a password reset link to the client's email
                //Password::sendResetLink($client->only('email'));

                // Emit a success event with a message
                $this->emit('success', __('New Student created'));
                $this->emit('updateStudent');
                Log::channel('activity')->notice("New Student created by user ". auth()->user()->name);
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
        $this->emit('success', 'Student successfully deleted');
        Log::channel('activity')->warning("Student id:{$id} deleted by user ". auth()->user()->name);
    }

    public function update($id)
    {
        $this->edit_mode = true;

        $client = User::find($id);

        $this->name = $client->name;
        $this->student_no = $client->student_no;
        // $this->location = $client->location;
        $this->student_id = $id;
      
    }

    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }
}

