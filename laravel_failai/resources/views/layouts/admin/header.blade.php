<header>
    <nav>
        <div class="nav-wrapper">
            <a href="/" class="brand-logo">
                <img src="{{asset('/img/logo.png')}}" alt="logo" class="logo">
            </a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
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
                            <a href="{{url()->current()}}?lang=lt">LT</a>
                        @else
                            <a href="{{url()->current()}}?lang=en">EN</a>
                        @endif
                    </div>
                </li>
                <li>
                    <a href="/login">
                        <sl-avatar
                            initials="{{isset($user) ? $user->getInitials() : ''}}"
                            class="right hide-on-med-and-down"
                            label="User avatar">
                        </sl-avatar>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</header>
