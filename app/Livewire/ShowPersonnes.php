<?php

namespace App\Livewire;

use App\Models\Personne;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class ShowPersonnes extends Component
{
    use WithPagination;
   protected $paginationTheme='bootstrap';
    public $wnom="";
    public $nom="";
    public $prenom="";
    public $grade_id;
    public $grade;
    public function update(){
      $this->resetPage();
    }
    #[On('create_pers')]
    public function render()
    {
        $query=Personne::query();
        if($this->wnom){
            $query->where('nom',"like","%".$this->wnom."%");
        }
        if($this->grade){
            $query->where('grade_id',$this->grade);
        }
        $personnes=$query->paginate(2);
        return view('livewire.show-personnes',compact('personnes'));
    }
    public function search(){
      $this->resetPage();
    }

    protected $rules =[
        'nom'=>'required',
        'prenom'=>'required',
        'grade_id'=>'required',
      ];


      protected $messages=[
        'nom.required'=>'nom obligatoire',
        'prenom.required'=>'prenom obligatoire',
        'grade_id.required'=>'garde obligatoire',
      ];
    public function save(){
      $data=$this->validate();
      $this->reset();
      Personne::create($data);
      $this->dispatch('create_pers');  
      //$this->dispatch('personneCreee');  
    }

}
