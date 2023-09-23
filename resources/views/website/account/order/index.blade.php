<div id="data-orderList" class="account-content" style="display:none">
    <div class="row">
        <div class="col-xs-12">
            <div class="heading-part heading-bg mb-30">
                <h2 class="heading m-0">My Orders</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 mb-xs-30">
            <div class="cart-item-table commun-table">
                <div class="table-responsive">
                    <table class="table text-center">
                        <thead>
                        <tr>
                            <th class="text-center">Order</th>
                            <th class="text-center">Date</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Total</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>#{{$order->order_number}}</td>
                                <td>{{date("D, d M, y", $order->order_timestamps)}}</td>
                                <td>{{ucwords($order->order_status)}}</td>
                                <td>&#2547;{{number_format($order->order_total+$order->tax_total+$order->shipping_total,2)}}</td>
                                <td><a href="{{route('customer.order',['id'=>$order->order_number])}}" class="btn btn-color">View</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
