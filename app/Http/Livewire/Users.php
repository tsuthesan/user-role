<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;


class Users extends Component

{
    use WithPagination;

    public  $name, $email,$password, $user_id,$roles ,$updateMode;
    public $isOpen = 0;

    public function mount(){
        $this->roles = Role::all();
//        $this->users = User::all();

    }
    public function render()
    {
//   $this->users = User::all();
        return view('livewire.users',[
            'users' => User::paginate(5),
        ]);
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }
    public function openModal()
    {
        $this->isOpen = true;
    }
    public function closeModal()
    {
        $this->isOpen = false;
    }
    private function resetInputFields(){
        $this->name = '';
        $this->email = '';
        $this->user_id = '';
        $this->password = '';
    }
    public function store()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'roles' => 'required',
        ]);

        User::updateOrCreate(['id' => $this->user_id], [
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        session()->flash('message',
            $this->user_id ? 'User Updated Successfully.' : 'User Created Successfully.');

        $this->closeModal();
        $this->resetInputFields();
    }
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $this->user_id = $id;
        $this->name = $user->name;
        $this->email = $user->email;

        $this->openModal();
    }
    public function delete($id)
    {
        User::find($id)->delete();
        session()->flash('message', 'User Deleted Successfully.');
    }

}
