@extends('layouts.front')
@section('title', 'Home')

@section('content')


            {{--  Slider --}}
            @if ($slides)
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
                <div class="carousel-inner">
                    @foreach ($slides as $slide )
                    <div class="carousel-item active">
                            <img src="{{ asset('storage/slides/'.$slide->image) }}" class="d-block w-100" alt="{{ $slide->title}}">
                            <div class="carousel-caption d-none d-md-block">
                            <h5>{{ $slide->title }}</h5>
                            <p>{{ $slide->subtitle }}</p><p></p>
                            </div>
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
            @endif
{{--
            @dd(\Cart::getContent()) --}}




        {{-- latest product --}}

        <section class="p-5 latest-products">
            <div class="container">
                <h2 class="mx-auto text-center">Latest Product</h2>
                <div class="row">
                    @if ($products && count($products) > 0)
                    @foreach ($products as $product)
                        <div class="col-lg-2 col-md-5 col-sm-12">
                            <div class="card @if($product->qty == 0) out-of-stock @endif">
                                <a href="{{ route('products.show', $product) }}">
                                    <img src="{{ asset('storage/products/' . $product->image) }}" alt="{{ $product->name }}" height="200px"
                                     class="rounded mx-auto d-block {{ $product->qty == 0 ? 'out-of-stock' : '' }} op">
                                </a>
                                <div class="card-body">
                                    <h5 class="text-center card-title">{{$product->name}}</h5>
                                    <div class="flow-root h-auto">
                                        <div class="h-auto my-4 text-center"><p class="card-text">{{$product->description}}</p></div>
                                    </div>
                                    <div class="flow-root h-auto">
                                        <div class="h-auto my-4 text-center"><b class="card-text">{{ number_format($product->price,2) }}$</b></div>
                                    </div>
                                    <div class="text-center">
                                        <a href="{{ route('products.show', $product) }}" class="btn btn-primary">View Product</a>
                                    </div>
                                </div>
                                @if ($product->qty == 0)
                                    <div class="out-of-stock-overlay">
                                        <span class="out-of-stock-text">Out of stock</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                    <div class="mt-4 d-flex align-items-center justify-content-center pagination">
                        {{ $products->links('pagination::bootstrap-4') }}
                    </div>
                @else
                    <div class="p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:text-red-400" role="alert">
                        <span class="font-medium">0 Product!</span>
                    </div>
                @endif
                </div>
            </div>
        </section>



        {{-- inner --}}
        <section class="py-5 intro">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <img src="https://www.rd.com/wp-content/uploads/2020/04/GettyImages-1093840488-5-scaled.jpg" class="card-img-top" alt="...">
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-12">
                        <h3>eStore</h3>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quibusdam impedit animi est accusantium consequuntur delectus hic deserunt officia. Eum, unde.</p>
                        <a href="#">Read More</a>
                    </div>
                </div>
            </div>
        </section>

@endsection










