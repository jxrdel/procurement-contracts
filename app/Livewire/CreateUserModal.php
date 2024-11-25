<?php

namespace App\Livewire;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;

class CreateUserModal extends Component
{
    public $fname;
    public $lname;
    public $username;
    public $email;
    public $role_id;

    public $roles;

    public function mount()
    {
        $this->roles = Role::all();
    }

    public function render()
    {
        return view('livewire.create-user-modal');
    }

    public function createUser()
    {
        $this->validate([
            'fname' => 'required',
            'lname' => 'required',
            'username' => 'required|unique:users,username',
            'email' => 'required|email',
        ]);

        User::create([
            'fname' => $this->fname,
            'lname' => $this->lname,
            'username' => $this->username,
            'email' => $this->email,
            'role_id' => $this->role_id,
        ]);

        $this->fname = null;
        $this->lname = null;
        $this->username = null;
        $this->email = null;
        $this->role_id = null;

        $this->dispatch('close-create-modal');
        $this->dispatch('refresh-table');
        $this->dispatch('show-message', message: 'User created successfully');
    }

    public function updatedLname()
    {
        if ($this->fname) {
            $this->username = strtolower($this->fname . '.' . $this->lname);
            $this->email = strtolower($this->fname . '.' . $this->lname . '@health.gov.tt');
        }
    }

    public function updatedFname()
    {
        if ($this->lname) {
            $this->username = strtolower($this->fname . '.' . $this->lname);
            $this->email = strtolower($this->fname . '.' . $this->lname . '@health.gov.tt');
        }
    }
}
