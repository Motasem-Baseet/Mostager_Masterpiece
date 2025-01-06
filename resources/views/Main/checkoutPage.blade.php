@extends('mainlayouts.mainMaster')

<div class='container1'>
    <div class='window'>
        <div class='order-info'>
            <div class='order-info-content'>
                <h2>Order Summary</h2>
                <div class='line'></div>
                <table class='order-table'>
                    <tbody>
                        <tr>
                            <td><img src='{{asset($cartItem->product_image)}}' class='full-width'></img></td>
                            <td>
                                <br> <span class='thin'>{{$cartItem->product_name}}</span>
                                <span class='thin small'>
                                    <br>Quantity: {{$cartItem->quantity}}<br>
                                    <br> {{ $cartItem->rental_start_date }} | {{ $cartItem->rental_end_date }}<br>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class='price1'>{{ $cartItem->sum('total_price')??null }} JOD</div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class='line'></div>

                <div class='total'>
                    <span style='float:left;'>
                        <div class='thin dense'>VAT 19%</div>
                        <div class='thin dense'>Delivery</div>
                        TOTAL
                    </span>
                    <span style='float:right; text-align:right;'>
                        <div class='thin dense'>$68.75</div>
                        <div class='thin dense'>$4.95</div>
                        {{ $cartItem->sum('total_price')??null }} JOD
                    </span>
                </div>
            </div>
        </div>

        <!-- Cash on Delivery Section -->
        <div class='credit-info'>
            <div class='credit-info-content'>
                <h3>Payment Method</h3>
                <p>Select your payment method:</p>
                <div class="payment-method">
                    <label for="cash-on-delivery">
                        <input type="radio" name="payment_method" id="cash-on-delivery" value="cash" checked>
                        Cash on Delivery
                    </label>
                </div>

                <form action="{{ route('checkout.process') }}" method="POST">
                    @csrf
                    <button type="submit" class="pay-btn">Checkout</button>
                </form>
            </div>
        </div>
    </div>
</div>
