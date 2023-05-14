
    <div class="flex flex-col w-56 bg-white rounded-r-3xl overflow-hidden">
        <div class="flex items-center justify-center h-20 shadow-md">
            <h1 class="text-3xl uppercase text-indigo-500">Sasinna</h1>
        </div>
        <ul class="flex flex-col py-4">
            <li>
                <a href="{{route('dashboard')}}" class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800">
                    <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-gray-400"><i class="bx bx-home"></i></span>
                    <span class="text-sm font-medium">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.roles.index') }}" class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800">
                    <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-gray-400"><i class="bx bx-user"></i></span>
                    <span class="text-sm font-medium">Roles</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.permissions.index')}}" class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800">
                    <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-gray-400"><i  class="bx bx-universal-access"></i></span>
                    <span class="text-sm font-medium">Permissions</span>
                </a>
            </li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <a href="route('logout')"
                       onclick="event.preventDefault();
                                                this.closest('form').submit();" class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800">
                        <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-gray-400"><i class="bx bx-log-out"></i></span>
                        <span class="text-sm font-medium">Logout</span>
                    </a>
                </form>
            </li>

        </ul>
    </div>
