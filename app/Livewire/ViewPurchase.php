<?php

namespace App\Livewire;

use App\Models\ExternalCompany;
use App\Models\Purchase;
use Livewire\Component;

class ViewPurchase extends Component
{
    public $purchase;
    public $name;
    public $note;
    public $is_active;
    public $company;
    public $companies;

    public $contracts = [];

    public $isEditing = false;

    public function mount($id)
    {
        $this->companies = ExternalCompany::all();

        $this->purchase = Purchase::find($id);
        $this->name = $this->purchase->name;
        $this->note = $this->purchase->note;
        $this->is_active = $this->purchase->is_active;
        $this->company = $this->purchase->external_company_id;
    }

    public function render()
    {
        $this->contracts = $this->purchase->contracts()->get();
        return view('livewire.view-purchase')->title($this->name . ' | View Purchase');
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|min:3',
            'company' => 'required',
        ]);

        $this->purchase->update([
            'name' => $this->name,
            'note' => $this->note,
            'is_active' => $this->is_active,
            'external_company_id' => $this->company,
        ]);

        $this->isEditing = false;
        $this->dispatch('show-message', message: 'Purchase updated successfully');
    }

    public function getCompanyName()
    {
        return ExternalCompany::find($this->company)->name;
    }
}
