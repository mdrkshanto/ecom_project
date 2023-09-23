<div class="checkout-step mb-40">
    <ul>
        <li @if(Route::currentRouteNamed('checkout.index')) class="active" @endif> <a>
                <div class="step">
                    <div class="line"></div>
                    <div class="circle">1</div>
                </div>
                <span>Shipping</span> </a> </li>
        <li @if(Route::currentRouteNamed('checkout.overview')) class="active" @endif> <a>
                <div class="step">
                    <div class="line"></div>
                    <div class="circle">2</div>
                </div>
                <span>Order Overview</span> </a> </li>
        <li @if(Route::currentRouteNamed('checkout.paymentMethod')) class="active" @endif> <a>
                <div class="step">
                    <div class="line"></div>
                    <div class="circle">3</div>
                </div>
                <span>Payment</span> </a> </li>
        <li @if(Route::currentRouteNamed('checkout.completeOrder')) class="active" @endif> <a>
                <div class="step">
                    <div class="line"></div>
                    <div class="circle">4</div>
                </div>
                <span>Order Complete</span> </a> </li>
        <li>
            <div class="step">
                <div class="line"></div>
            </div>
        </li>
    </ul>
    <hr>
</div>
