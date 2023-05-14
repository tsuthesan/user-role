<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesPermissions extends Component
{
    public $roles;
    public $permissions;
    public $selectedRole;
    public $selectedPermissions = [];

    public function mount()
    {
        $this->roles = Role::all();
        $this->permissions = Permission::all();
    }

    public function updatedSelectedRole($value)
    {
        $this->selectedPermissions = Role::findByName($value)->permissions->pluck('name');
    }
    public function assign()
    {
        $role = Role::findByName($this->selectedRole);
        $permissions = $this->selectedPermissions;

        $role->syncPermissions($permissions);

        session()->flash('message', 'Permissions assigned successfully.');
    }
    public function revoke()
    {
        $role = Role::findByName($this->selectedRole);
        $permissions = $this->selectedPermissions;

        $role->revokePermissionTo($permissions);

        session()->flash('message', 'Permissions revoked successfully.');
    }

    public function render()
    {

        return view('livewire.roles-permissions');
    }
}
