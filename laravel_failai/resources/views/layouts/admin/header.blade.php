<header>
    <!-- Dropdown Structure -->
    <ul id="dropdown1" class="dropdown-content">
        <li>
            <a href="{{route('profile.edit')}}">{{ __('Edit profile') }}</a>
        </li>
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
    <nav>
        <div class="nav-wrapper">
            <a href="/" class="brand-logo">
                <img src="{{asset('/img/logo.png')}}" alt="logo" class="logo">
            </a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
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
                    <li>
                        <a class="dropdown-trigger" href="#!" data-target="dropdown1">
                            {{ Auth::user()->name }}
                            <i class="material-icons right">arrow_drop_down</i>
                        </a>
                    </li>
                @endauth
            </ul>
        </div>
    </nav>
</header>
