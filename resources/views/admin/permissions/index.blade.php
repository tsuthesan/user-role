<x-admin-layout>
    <div class="min-h-screen flex flex-row bg-gray-100">
        @include('.layouts.sidebar')

        {{--    <div class="py-12">--}}
        {{--        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">--}}
        {{--            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">--}}
        {{--                <div class="p-6 text-gray-900">--}}
        {{--                    {{ __("You're logged in!") }}--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </div>--}}
        {{--    </div>--}}

        <div class="py-2 w-full">
            <div class="w-full  sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        @livewire('roles-permissions')
                        {{--                       @livewire('users')--}}
                        {{--                        @livewire('roles-permissions-manager')--}}
                    </div>
                </div>
            </div>
        </div>



    </div>
</x-admin-layout>


