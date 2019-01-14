<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="{{URL::to('public/css/bootstrap.min.css')}}">
</head>
<body>
    <div class="container">
    <div class="row">
        <div class="col-md-8 mt-5">
            <div class="panel panel-default">
                <div class="panel-heading">
                <h3 class="text-center"><strong>Order summary</strong></h3>
               
                <h3 class="text-center">
                    <strong>Invoice Number:{{$searchId}}</strong>
                </h3>
                </div>
                <div class="panel-body mt-3">
                    <div class="table-responsive">
                        <table class="table table-condensed">
                            <thead>
                                <tr>
                                    <td><strong>Item Name</strong></td>
                                    <td class="text-center"><strong>Item Price</strong></td>
                                    <td class="text-center"><strong>Item Quantity</strong></td>
                                    <td class="text-right"><strong>Total</strong></td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($purchaseDetails as $purchaseDetail)
                                <tr>
                                    <td>{{$purchaseDetail->item_name}}</td>
                                    <td class="text-center">{{$purchaseDetail->price}}</td>
                                    <td class="text-center">{{$purchaseDetail->quantity}}</td>
                                    <td class="text-right">{{$purchaseDetail->price*$purchaseDetail->quantity}}</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td class="highrow"></td>
                                    <td class="highrow"></td>
                                    <td class="highrow text-center"><strong>Subtotal</strong></td>
                                    <td class="highrow text-right">{{$purchaseDetail->amount}}</td>
                                </tr>
                                <tr>
                                    <td class="emptyrow"></td>
                                    <td class="emptyrow"></td>
                                    <td class="emptyrow text-center"><strong>Discount</strong></td>
                                    <td class="emptyrow text-right">{{$purchaseDetail->discount}}</td>
                                </tr>
                                <tr>
                                    <td class="emptyrow"><i class="fa fa-barcode iconbig"></i></td>
                                    <td class="emptyrow"></td>
                                    <td class="emptyrow text-center"><strong>Paid</strong></td>
                                    <td class="emptyrow text-right">{{$purchaseDetail->paid}}</td>
                                </tr>
                                <tr>
                                    <td class="emptyrow"></td>
                                    <td class="emptyrow"></td>
                                    <td class="emptyrow text-center"><strong>Due</strong></td>
                                    <td class="emptyrow text-right alert-danger">{{$purchaseDetail->due}}</td>
                                </tr>
                                
                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

<style>
.height {
    min-height: 200px;
}

.icon {
    font-size: 47px;
    color: #5CB85C;
}

.iconbig {
    font-size: 77px;
    color: #5CB85C;
}

.table > tbody > tr > .emptyrow {
    border-top: none;
}

.table > thead > tr > .emptyrow {
    border-bottom: none;
}

.table > tbody > tr > .highrow {
    border-top: 3px solid;
}
</style>