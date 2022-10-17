<?php

namespace App\Http\Livewire\Admin;

use App\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsuariosIndex extends Component
{   
    use WithPagination;
    public $search;
    protected $paginationTheme="bootstrap";
    public function updatingSearch(){
        $this->resetPage();
    }
    public function render()
    {
        $users = User::where('name', 'LIKE', '%' . $this->search . '%')
                        ->orWhere('email', 'LIKE', '%' . $this->search . '%')
                        ->paginate(10);
        return view('livewire.admin.usuarios-index' , compact('users'));
    }
}
