<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class UsersRoles extends Component
{
    public $roles;
    public $users;
    public $selectedUser;
    public $selectedRoles = [];

    public function mount(User $user)
    {
        $this->user = $user;
        $this->users = User::all();
        $this->roles = Role::all();
        $this->selectedRoles = $user->roles()->pluck('id')->toArray();
//        $this->selectedRoles = $this->users->roles()->pluck('name')->toArray();
    }
    public function updatedSelectedRoles($value)
    {
        $this->selectedRoles = $this->user->syncRoles($value);
    }
    public function assign()
    {
        $user = User::findByName($this->selectedUser);
        $roles = $this->selectedroles;

        $user->syncRoles($roles);

        session()->flash('message', 'Role assigned successfully.');
    }
    public function revoke()
    {
        $user = User::findByName($this->selectedUser);
        $roles = $this->selectedRoles;
        $user->revokeRoleTo($roles);

        session()->flash('message', 'Role revoked successfully.');
    }
    public function render()
    {
        return view('livewire.users-roles');
    }
}
