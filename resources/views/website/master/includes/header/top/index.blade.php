<div class="header-top container-full-sm">
    <div class="container">
        <div class="header-inner">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-0">
                    <div class="help-numbar">
                        <a>
                            Need Help ? : 023 233 455 55
                        </a>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-6">
                    <div class="navbar-header align-center">
                        <a class="navbar-brand page-scroll" href="{{route('home')}}">
                            <img alt="Eshoper" src="{{asset('/')}}website/assets/images/logo.png">
                        </a>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-6 right-side">
                    <div class="right-side float-left-xs header-right-link">
                        <ul>
                            <li class="search-box">
                                <a><span></span></a>
                            </li>
                            <li class="account-icon"><a><span></span></a>
                                <div class="header-link-dropdown account-link-dropdown">
                                    <ul class="link-dropdown-list">
                                        <li>
                                            @if(session('customerLoginId'))
                                                <span class="dropdown-title">{{'Welcome '.$customer->name}}</span>
                                            @endif
                                            <ul>
                                                @if(!session('customerLoginId'))
                                                    <li><a href="{{route('customer.signin')}}">Sign In</a></li>
                                                    <li><a href="{{route('customer.create')}}">Create an Account</a>
                                                    </li>
                                                @else
                                                    <li><a href="{{route('customer.account')}}">My Dashboard</a></li>
                                                    <li>
                                                        <form action="{{route('customer.logout')}}" method="POST"
                                                              class="logout">
                                                            @csrf
                                                        </form>
                                                        <a onclick="event.preventDefault(); document.querySelector('.logout').submit();"><i class="fa fa-sign-out me-3"></i>Logout</a>
                                                    </li>
                                                @endif
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="cart-icon"><a href="{{route('cart.index')}}"> <span> <small
                                            class="cart-notification">{{Cart::content()->count()}}</small> </span>
                                </a>
                                <div class="cart-dropdown header-link-dropdown">
                                    <ul class="cart-list link-dropdown-list">
                                        @foreach(Cart::content() as $item)
                                            <li>
                                                <form action="{{route('cart.remove',['id'=>$item->rowId])}}"
                                                      method="POST">
                                                    @csrf
                                                    <button class="close-cart btn-link p-0"><i
                                                            class="fa fa-times-circle"></i></button>
                                                </form>
                                                <div class="media"><a class="pull-left">
                                                        <img alt="{{$item->name}}"
                                                             src="{{asset($item->options->image)}}"></a>
                                                    <div class="media-body">
                                                        <span><a>{{$item->name}}</a></span>
                                                        <p class="cart-price">&#2547;{{$item->subtotal}}</p>
                                                        <div class="product-qty">
                                                            <label>Qty:</label>
                                                            <div class="custom-qty">
                                                                {{$item->qty}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <p class="cart-sub-totle"><span class="pull-left">Cart Subtotal</span> <span
                                            class="pull-right"><strong
                                                class="price-box">&#2547;{{Cart::subtotal()}}</strong></span>
                                    </p>
                                    <div class="clearfix"></div>
                                    <div class="mt-20">
                                        <a href="{{route('cart.index')}}" class="btn-color btn">Cart</a>
                                        @if(Cart::content()->count() >= 1)
                                            <a href="{{route('checkout.index')}}" class="btn-color btn right-side">Checkout</a>
                                        @endif
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle"
                            type="button"><i class="fa fa-bars"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>
