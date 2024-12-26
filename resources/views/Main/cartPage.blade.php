@extends('mainlayouts.mainMaster')

<section class="h-100 gradient-custom">
    <div class="container py-5">
        <div class="row d-flex justify-content-center my-4" style="padding-top: 100px;">
            <!-- Cart Items Section -->
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-header py-3">
                        <h5 class="mb-0 text-center text-uppercase">Cart Items</h5>
                    </div>
                    <div class="card-body">
                        @if (isset($cartItem))
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">Image</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Start Date</th>
                                    <th scope="col">End Date</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @dd($cartItem); --}}
                                <tr>
                                    <!-- Image -->
                                    <td style="width: 100px;">
                                        <div class="bg-image hover-overlay hover-zoom ripple rounded">
                                            {{-- @dd($item) --}}
                                            <img style="height: 80px;" src="{{ asset($cartItem->product_image) }}" class="img-fluid rounded" alt="{{ $cartItem->product_name }} ">
                                        </div>
                                    </td>

                                    <!-- Product Details -->
                                    <td>
                                        <strong>{{ $cartItem->product_name }}</strong>
                                    </td>

                                    <!-- Rental Dates -->
                                    <td>{{ $cartItem->rental_start_date }}</td>
                                    <td>{{ $cartItem->rental_end_date }}</td>

                                    <!-- Quantity -->
                                    <td>
                                            <div class="qty-input">
                                                <button style="background-color: #e91e63; border-radius: 5px;" class="qty-count qty-count--minus" data-action="minus" type="button">-</button>
                                                <input style="background-color: rgba(0, 0, 0, 0.1)" class="product-qty" type="number" name="product-qty" min="0" max="10" value="{{$cartItem->quantity}}">
                                                <button style="background-color: #e91e63; border-radius: 5px;" class="qty-count qty-count--add" data-action="add" type="button" style="background-color:#fff;">+</button>
                                            </div>
                                        </td>

                                        <!-- Actions -->
                                        <td>
                                            <form action="{{ route('cart.remove', $cartItem->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to remove this item?')">
                                                @csrf
                                                @method('DELETE') <!-- To delete the item -->
                                                <button><i class="fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Summary Section -->
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-header py-3">
                            <h5 class="mb-0 text-center text-uppercase">Summary</h5>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>Products</span>
                                    <span>{{ $cartItem->sum('total_price')??null }} JOD</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>Shipping</span>
                                    <span>Gratis</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <strong>Total (including VAT)</strong>
                                    <strong>{{ $cartItem->sum('total_price')??null }} JOD</strong>
                                </li>
                            </ul>


                                <input type="hidden" name="checkout" value="{{$cartItem->product_id}}">
                            <a href="{{route('checkout.index')}}"  class="btn btn-lg btn-block mt-3" style="background-color: #e91e63; color: white;">
                                Go to Checkout
                            </a>
                            @else

                            <p class="text-center">There are no items in your cart.</p>

                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

