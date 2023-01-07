<div class="navbar bg-base-100">
    <div class="flex-1">
        <a href="/dashboard" class="btn btn-ghost normal-case text-xl">Guppy</a>
    </div>
    <div class="flex-none">
        <ul class="menu menu-horizontal px-1">
            <li><a href="complaints">
                    @if(Auth::user()->role == 'admin')
                    View complaints
                    @else
                    Make a complaint
                    @endif
                </a></li>
            <li><a href="/booking">
                    @if(Auth::user()->role == 'admin')
                    View Bookings
                    @else
                    Make a booking
                    @endif
                </a></li>

            {{-- only shows if user role is admin --}}
            @if (Auth::user()->role == 'admin')
            <li><a href="/additem">Add Item</a></li>
            @endif


            <div class="dropdown dropdown-end">
                <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                    <div class="w-10 rounded-full">
                        <img src="https://placeimg.com/80/80/people" />
                    </div>
                </label>
                <ul tabindex="0" class="mt-3 p-2 shadow menu menu-compact dropdown-content bg-base-100 rounded-box w-52">
                    <li>
                        <a href="/profile" class="justify-between">
                            Profile
                        </a>
                    </li>

                    <li>
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf

                            <a href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                {{ __('Log Out') }}
                            </a>
                        </form>
                    </li>
                </ul>
            </div>
        </ul>
    </div>
</div>
