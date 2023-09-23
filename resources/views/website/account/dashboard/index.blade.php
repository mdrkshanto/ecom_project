<div id="data-dashboard" class="account-content">
    <div class="row">
        <div class="col-xs-12">
            <div class="heading-part heading-bg mb-30">
                <h2 class="heading m-0">My Dashboard</h2>
            </div>
        </div>
    </div>
    <div class="mb-30">
        <div class="row">
            <div class="col-xs-12">
                <div class="heading-part">
                    <h3 class="sub-heading">Hello, {{$customer->name}}.</h3>
                    <p class="text-justify">From your account dashboard you can view your last 3 orders, manage your shipping and billing addresses, and edit your password and account details.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="m-0">
        <div class="row">
            <a class="col-sm-4 my-3">
                <div class="cart-total-table address-box commun-table">
                    <div class="table-responsive">
                        <table class="table text-center">
                            <thead>
                            <tr>
                                <th class="text-center" style="font-size: 6rem;"><i class="fa fa-list-ol"></i></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    Orders
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </a>
            <a class="col-sm-4 my-3">
                <div class="cart-total-table address-box commun-table">
                    <div class="table-responsive">
                        <table class="table text-center">
                            <thead>
                            <tr>
                                <th class="text-center" style="font-size: 6rem;"><i class="fa fa-map-marker"></i></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    Addresses
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </a>
            <a class="col-sm-4 my-3">
                <div class="cart-total-table address-box commun-table">
                    <div class="table-responsive">
                        <table class="table text-center">
                            <thead>
                            <tr>
                                <th class="text-center" style="font-size: 6rem;"><i class="fa fa-user"></i></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    Accounts Details
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
