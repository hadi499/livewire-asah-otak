<div class="overflow-auto p-2  flex justify-center mt-6">

    <div class="w-full  md:w-[800px]">
        <div class="md:flex md:justify-between mb-5">
            <a class="border border-blue-700  py-1 shadow-lg rounded-sm flex items-center justify-center w-20  text-blue-700 text-sm font-semibold hover:bg-blue-700 hover:text-white"
                href="{{route('admin.user.register')}}"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M12 5l0 14" />
                    <path d="M5 12l14 0" />
                </svg>
                <span class="ml-1">User</span>
            </a>
            <a wire:navigate href="{{route('admin')}}">
                <div
                    class="text-slate-600 text-center text-sm font-semibold py-1 px-2 border border-slate-500  rounded-sm  hover:bg-slate-800 hover:text-white">

                    Back
                </div>
            </a>
        </div>

        <table class=" bg-white border w-full border-gray-300 text-sm">
            <thead>
                <tr class="bg-blue-200 border-b">
                    <th class="text-left py-3 px-4 font-semibold text-sm text-gray-800">Name</th>
                    <th class="text-left py-3 px-4 font-semibold text-sm text-gray-800">Email</th>
                    <th class="text-left py-3 px-4 font-semibold text-sm text-gray-800">Role</th>
                    <th class="text-left py-3 px-4 font-semibold text-sm text-gray-800">Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr class="">
                    <td class="py-3 px-4 border-b">{{$user->name}}</td>
                    <td class="py-3 px-4 border-b">{{$user->email}}</td>
                    <td class="py-3 px-4 border-b">{{$user->role}}</td>
                    <td class="py-3 px-4 border-b space-x-3">
                        <a class="px-2 py-1 border border-green-700 text-green-700 text-sm font-semibold rounded-sm hover:bg-green-700 hover:text-white"
                            href="{{route('admin.user.edit', $user->id)}}">edit</a>
                        <button wire:click="deleteUser({{ $user->id }})"
                            wire:confirm="Are you sure delete user {{$user->name}}?"
                            class="px-2 py-1 border border-red-500 text-red-500 text-sm font-semibold rounded-sm hover:bg-red-500 hover:text-white">delete</button>
                    </td>


                </tr>
                @endforeach

                <!-- Add more rows as needed -->
            </tbody>
        </table>
    </div>


</div>