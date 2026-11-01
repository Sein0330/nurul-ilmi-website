<?php

namespace App\Livewire;

use Livewire\Component;

class Portal extends Component
{
    public $currentPage = 'home';

    public function navigateTo($page)
    {
        $this->currentPage = $page;
    }

    public function render()
    {
        return view('livewire.portal');
    }
}
