@extends('layouts.front')
@section('title', 'Cart')

@section('content')
        {{-- products --}}

        <section class="p-5 products">
            <div class="container">
                @if (count(Cart::getContent()) > 0)
                <h3 class="mt-5">Cart</h3>
                    @if (session('cart_status'))
                        <div class="alert alert-danger">
                            {{ session('cart_status') }}
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Product</th>
                                <th scope="col" class="text-center" width="200px">Qty</th>
                                <th scope="col" class="text-center">Subtotal</th>
                                <th scope="col" class="text-center">Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach (\Cart::getContent() as $item)
                            <tr>
                                <th>{{ $item->id }}</th>
                                <td>{{ $item->name }}</td>
                                <td class="d-flex justify-content-between"><a href="{{ route('cart.dec',['item' => $item->id]) }}" class="btn btn-sm btn-outline-primary">-</a>
                                    <p>{{ $item->quantity }}</p>
                                    <a href="{{ route('cart.inc', ['item' => $item->id]) }}" class="btn btn-sm btn-outline-primary">+</a></td>
                                <td class="text-center">{{ number_format($item->quantity * $item->price,2) }}$</td>
                                <td class="text-center w-25"><a href="{{ route('cart.remove',['item' => $item->id]) }}" class="mx-auto btn btn-sm btn-danger">Remove</a></td>
                            </tr>
                            @endforeach
                            <tfoot>
                                <td colspan="3"><b>Total</b></td>
                                <td class="text-center"><b>{{  number_format(\Cart::getTotal(),2) }}$</b></td>
                            </tfoot>
                            </tbody>
                      </table>
                    </div>

                    {{-- checkout --}}
                    @auth
                        <h3 class="mt-5">Checkout</h3>
                                @if (session('status'))
                                    <div class="alert alert-danger">
                                        {{ session('status') }}
                                    </div>
                                @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('cart.checkout') }}" method="post">
                            @csrf
                                <div class="mb-3">
                                    <label for="fullname" name="fullname" class="form-label">Fullname</label>
                                    <input type="text" name="fullname" class="form-control" required>
                                </div>
                                    <div class="mb-3">
                                        <label for="fullname" name="email" class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control" id="email" required>
                                </div>
                                <div class="mb-3">
                                        <label for="fullname" name="phone" class="form-label">Phone</label>
                                        <input type="number" name="phone" class="form-control" id="phone" required>
                                </div>
                                <button type="submit" class="btn btn-outline-primary">Submit</button>
                        </form>
                    @endauth
            @else
                    <div class="alert alert-warning" role="alert">
                        Cart is empty!
                    </div>
            @endif

                @guest
                    @if (count(\Cart::getContent()) > 0 )
                        <div class="alert alert-warning" role="alert">
                            <a href="{{ route('login') }}">Please Login to checkout</a>
                    </div>
                    @endif
                @endguest

            </div>
        </section>



@endsection










