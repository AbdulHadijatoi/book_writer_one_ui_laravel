<?php

namespace App\Http\Livewire;

use App\Models\Dictionary;
use Livewire\Component;

class SynonymSearch extends Component
{

    public string $search = '';

    public $result;


    protected array $rules = [
        'search' => 'required|min:3',
    ];

    public function mount()
    {
        $this->result=[];
    }

    public function updatedSearch()
    {
        $this->reset('result');
        $this->validateOnly('search');
        $this->getSearchResults();
    }

    public function resetForm()
    {
        $this->reset(['search', 'result']);
    }


    public function render()
    {
        return view('livewire.synonym-search');
    }

    public function getSearchResults()
    {
        $result = Dictionary::where('word', $this->search)->first();
        if($result != null){
            $this->result=$result;
        }else{
            $this->result = 'null';
        }


        // dd($this->result);

    }



}
