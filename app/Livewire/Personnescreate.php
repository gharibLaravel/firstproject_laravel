<?php

namespace App\Livewire;

use App\Models\Personne;
use Livewire\Component;

class Personnescreate extends Component
{
  public $nom; 
  public $prenom; 
  public $grade_id; 
  public function save(){
    $personne=Personne::create($this->all());
    $this->reset();
    $this->dispatch('create_pers',$personne);
  }
  public function reloadList(){
    $this->dispatch('create_pers');
  }
  public function render()
    {
        return view('livewire.personnescreate');
    }
}
