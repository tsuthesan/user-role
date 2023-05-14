<div class="relative w-full">
    @if($updateMode)
        @include('livewire.update')
    @else
        @include('livewire.create')
    @endif
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-3">No.</th>
            <th scope="col" class="px-6 py-3">name</th>
            <th scope="col" class="px-6 py-3">Email</th>
            <th scope="col" class="px-6 py-3">roles</th>
            <th scope="col" class="px-6 py-3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4">{{  $user->id  }}</td>
                <td class="px-6 py-4">{{ $user->name }}</td>
                <td class="px-6 py-4">{{ $user->email }}</td>
                <td class="px-6 py-4">
                    @foreach($user->getRoleNames() as $role)
                        <button class=" py-3 px-3 text-yellow-400 hover:text-white border border-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-yellow-300 dark:text-yellow-300 dark:hover:text-white dark:hover:bg-yellow-400 dark:focus:ring-yellow-900">{{$role}}</button>
                    @endforeach
                </td>
                <td class="px-6 py-4">
                    @can('edit-users')
                    <button wire:click="edit({{ $user->id }})" type="button" class="text-white bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 dark:bg-blue-400 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <i class='bx bxs-edit-alt' ></i> edit
                    </button>
                    @endcan
                    @can('delete-users')
                    <button wire:click="delete({{ $user->id }})" type="button" class="text-white bg-red-500 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 dark:bg-red-400 dark:hover:bg-red-700 dark:focus:ring-red-800">
                        <i class='bx bxs-edit-alt' ></i> Delete
                    </button>
                        @endcan
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
        {{ $users->links() }}
</div>
