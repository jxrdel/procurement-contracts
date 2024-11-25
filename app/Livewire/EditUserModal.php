<?php

namespace App\Livewire;

use App\Models\Role;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class EditUserModal extends Component
{
    public $user;
    public $fname;
    public $lname;
    public $username;
    public $email;
    public $role_id;

    public $roles;

    public function render()
    {
        $this->roles = Role::all();
        return view('livewire.edit-user-modal');
    }

    #[On('show-edit-modal')]
    public function displayModal($id)
    {
        $this->user = User::find($id);
        $this->fname = $this->user->fname;
        $this->lname = $this->user->lname;
        $this->username = $this->user->username;
        $this->email = $this->user->email;
        $this->role_id = $this->user->role_id;
        $this->dispatch('display-edit-modal');
    }

    public function editUser()
    {
        $this->validate([
            'fname' => 'required',
            'lname' => 'required',
            'username' => 'required|unique:users,username,' . $this->user->id,
            'email' => 'required|email',
        ]);

        $this->user->update([
            'fname' => $this->fname,
            'lname' => $this->lname,
            'username' => $this->username,
            'email' => $this->email,
            'role_id' => $this->role_id,
        ]);

        $this->dispatch('close-edit-modal');
        $this->dispatch('refresh-table');
        $this->dispatch('show-message', message: 'User edited successfully');
    }
}
