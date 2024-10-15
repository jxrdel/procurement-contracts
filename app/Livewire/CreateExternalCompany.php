<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

class CreateExternalCompany extends Component
{
    
    #[Title('Create External Company')] 

    public function render()
    {
        return view('livewire.create-external-company');
    }
}
