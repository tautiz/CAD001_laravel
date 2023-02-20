<header>
    <div class="navbar bg-base-100 drop-shadow-xl">
        <div class="flex-1">
            <a class="btn btn-ghost normal-case text-xl">E-Shop administration</a>
        </div>
        <div class="flex-none">
            <ul class="menu menu-horizontal px-1">
                @auth
                    <li><a href="{{route('dashboard')}}">{{__('general.meniu.home')}}</a></li>
                    <li><a href="{{route('orders.index')}}">{{__('general.meniu.orders')}}</a></li>
                    <li><a href="{{route('products.index')}}">{{__('general.meniu.products')}}</a></li>
                    <li><a href="{{route('categories.index')}}">{{__('general.meniu.categories')}}</a></li>
                    <li><a href="{{route('paymentTypes.index')}}">{{__('general.meniu.paymentTypes')}}</a></li>
                    <li><a href="{{route('statuses.index')}}">{{__('general.meniu.statuses')}}</a></li>
                    <li><a href="{{route('users.index')}}">{{__('general.meniu.users')}}</a></li>
                    <li><a href="{{route('persons.index')}}">{{__('general.meniu.persons')}}</a></li>
                    <li><a href="{{route('addresses.index')}}">{{__('general.meniu.addresses')}}</a></li>
                    <li>
                        <div>
                            @if(app()->getLocale() == 'en')
                                <a href="{{url()->current()}}?lang=lt">
                                    <img src="{{asset('/img/LT-Flag.svg')}}" alt="LT" width="32">
                                </a>
                            @else
                                <a href="{{url()->current()}}?lang=en">
                                    <img src="{{asset('/img/GB-Flag.svg')}}" alt="LT" width="32">
                                </a>
                            @endif
                        </div>
                    </li>
                @endauth
            </ul>
        </div>
        @auth
        <div class="flex-none dropdown dropdown-end">
            <label tabindex="0" class="btn btn-ghost btn-circle avatar placeholder ">
                <div class="bg-neutral-focus text-neutral-content rounded-full w-12 ring ring-primary">
                    <span>{{ Auth::user()->getInitials() }}</span>
                </div>
            </label>
            <ul tabindex="0" class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
                <li>
                    <a class="justify-between" href="{{route('profile.edit')}}">
                        {{ __('Edit profile') }}
                        <span class="badge">New</span>
                    </a>
                </li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{route('logout')}}" onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </a>
                    </form>
                </li>
            </ul>
        </div>
        @endauth
    </div>
</header>
