<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination; 


class Users extends Component
{
    use WithPagination; 

    public function updatingSearch():void{ 
        $this->resetPage();
    }//função para corrigir problema da paginação
    //antes a busca exibia somente os resultados para a página que está selecionada
    public string $search = ' '; 
    public function render()
    {

       return view('livewire.users', [
            'users' => User::query()
            ->when($this->search, function($query){
                $query->where('name', 'like', "%{$this->search}%"); 
            })
            ->paginate(5)
       ]);

    }
}
