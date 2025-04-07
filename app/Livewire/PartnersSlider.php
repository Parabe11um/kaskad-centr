<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Partner;

class PartnersSlider extends Component
{
    public function render()
    {
        return view('livewire.partners-slider', [
            'partners' => Partner::all(),
        ]);
    }
}
