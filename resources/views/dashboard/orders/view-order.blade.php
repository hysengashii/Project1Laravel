<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('orders') }}
        </h2>
    </x-slot>

        @section('content')
                {{-- Product --}}
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{ asset('storage/products/'.$product->image) }}" width="250px" alt="{{ $product->title }}" alt="{{ $product->name }}" class="img-fluid">
                    </div>
                    <div class="col-md-6">
                        <h1>{{ $product->name }}</h1>
                        <p>{{ $product->description }}</p>
                        <p>Price: ${{ $product->price }}</p>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        <form method="post" action="{{ route('cart.add', $product) }}">
                            @csrf
                            <div class="form-group">
                                <label for="quantity">Quantity:</label>
                                <div class="gap-2 d-flex">
                                    <input type="number" name="qty" id="quantity" class="form-control w-25" min="1" max="{{ $product->qty }}" value="1">
                                    <button type="submit" class="btn btn-primary">Add to Cart</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        @endsection

</x-app-layout>

