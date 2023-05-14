<div>
    <div>

        <h1>Users &amp; Roles</h1>

        @if (session()->has('message'))
            <div id="alert-3" class="flex p-4 mb-4 text-green-800 rounded-lg bg-green-50  dark:text-green-400" role="alert">
                <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Info</span>
                <div class="ml-3 text-sm font-medium">
                    {{ session('message') }}
                </div>
                <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-3" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
            </div>
        @endif
        <div class="grid gap-2 mb-2 md:grid-cols-2">
            <div>
                <label for="user" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select a User:</label>
                <select id="user" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" wire:model="selectedUser" >
                    <option selected> --Choose a User</option>
                    @foreach($users as $user)
                        <option value="{{ $user->name }}" class="font-medium">{{ $user->name }} -- {{$user->email}}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="roles">Select Roles:</label>
                {{--            <select wire:model="selectedPermissions" multiple id="permissions"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >--}}
                @foreach($roles as $role)
                    <div>
                        <input type="checkbox" value="{{ $role->name }}" wire:model="selectedRoles"> {{ $role->name }}
                    </div>
                @endforeach
            </div>

            <div>
                <button wire:click="assign" class="focus:outline-none text-white bg-green-500 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-500 dark:hover:bg-green-700 dark:focus:ring-green-800">Assign Roles</button>
                <button wire:click="revoke" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Revoke Roles</button>
            </div>
        </div>

    </div>
</div>
<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
    <tr>
        <th scope="col" class="px-6 py-3">name</th>
        <th scope="col" class="px-6 py-3">roles</th>

    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
            <td class="px-6 py-4">{{  $user->name }}</td>
            <td class="px-6 py-4">
                @foreach($user->getRoleNames() as $role)
                    <button class=" py-3 px-3 text-yellow-400 hover:text-white border border-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-yellow-300 dark:text-yellow-300 dark:hover:text-white dark:hover:bg-yellow-400 dark:focus:ring-yellow-900">{{ $role }}</button>
                @endforeach
            </td>
            <td class="px-6 py-4">


            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>
