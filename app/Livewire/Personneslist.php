<?php

namespace App\Livewire;

use App\Models\Personne;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Personneslist extends Component
{
  use WithPagination; 
  protected $paginationTheme="bootstrap";

  
  public $search;
  #[Computed()]
  public function personnes(){
    $query=Personne::query();
    if($this->search){
      $query->where('nom','like',"%{$this->search}%");
    }
    return $query->paginate(3);
  }
  #[On('create_pers')]
  public function render()
    {
  
      return view('livewire.personneslist');
    }
}
