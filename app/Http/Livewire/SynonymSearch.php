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

        $this->result=Dictionary::where('word', $this->search)->first();


        // dd($this->result);

    }



}
