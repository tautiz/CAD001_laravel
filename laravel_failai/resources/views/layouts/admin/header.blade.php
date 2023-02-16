<header>
    <div class="navbar bg-base-100">
        <div class="flex-1">
            <a class="btn btn-ghost normal-case text-xl">E-Shop</a>
        </div>
        <div class="flex-none">
            <ul class="menu menu-horizontal px-1">
                @auth
                    <li><a href="/">{{__('general.meniu.home')}}</a></li>
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
                                    <img src="/img/LT-Flag.svg" alt="LT" width="32">
                                </a>
                            @else
                                <a href="{{url()->current()}}?lang=en">
                                    <img src="/img/GB-Flag.svg" alt="LT" width="32">
                                </a>
                            @endif
                        </div>
                    </li>
                    <li tabindex="0">
                        <a>
                            {{ Auth::user()->name }}
                            <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                 viewBox="0 0 24 24">
                                <path d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z"/>
                            </svg>
                        </a>
                        <ul class="p-2 bg-base-100">
                            <li><a href="{{route('profile.edit')}}">{{ __('Edit profile') }}</a></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-responsive-nav-link :href="route('logout')"
                                                       onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-responsive-nav-link>
                                </form>
                            </li>
                        </ul>
                    </li>
                @endauth

            </ul>
        </div>
        <div class="flex-none dropdown dropdown-end">
            <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                <div class="w-10 rounded-full">
                    <img src="/images/stock/photo-1534528741775-53994a69daeb.jpg" />
                </div>
            </label>
            <ul tabindex="0" class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
                <li>
                    <a class="justify-between">
                        Profile
                        <span class="badge">New</span>
                    </a>
                </li>
                <li><a>Settings</a></li>
                <li><a>Logout</a></li>
            </ul>
        </div>
    </div>
</header>
