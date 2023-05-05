<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                <a href="{{ route('products.create') }}"><button type="button" class="px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 dark:bg-blue-600 dark:hover:bg-blue-700">Creat Product</button>
                </a><br>
                <table class="w-full">
                    <thead class="bg-white border-b">
                    @if($products && count($products) > 0)
                        <tr>
                            <th class="px-6 py-4 text-sm font-medium text-left text-gray-900">ID</th>
                            <th class="px-6 py-4 text-sm font-medium text-left text-gray-900">Name</th>
                            <th class="px-6 py-4 text-sm font-medium text-left text-gray-900">Image</th>
                            <th class="px-6 py-4 text-sm font-medium text-left text-gray-900">Qty</th>
                            <th class="px-6 py-4 text-sm font-medium text-left text-gray-900">Price</th>
                            <th class="px-6 py-4 text-sm font-medium text-left text-gray-900 ">Descrition</th>
                            <th class="px-6 py-4 text-sm font-medium text-left text-gray-900 ">Edit</th>
                            <th class="px-6 py-4 text-sm font-medium text-left text-gray-900 ">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                            <tr class="bg-gray-100 border-b">
                                <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{{ $product->id }}</td>
                                <td class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">{{ $product->name }}</td>
                                <td  class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">{{ $product->image }}
                                <img src="{{ asset('storage/products/'.$product->image) }}" width="250px" alt="{{ $product->title }}">
                                </td>
                                <td  class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">{{ $product->qty }}
                                <td class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">{{ $product->price }}</td>
                                <td class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">{{ $product->description }}</td>
                                <td > <a class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                                     href="{{ route('products.edit', $product) }}"> Edit</a></td>
                                <td>
                            <form  action="{{ route('products.destroy', $product) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"  class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete</button>
                                </form></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                        @else
                        <div class="p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:text-red-400" role="alert">
                            <span class="font-medium">0 Product!</span>
                        </div>
                        @endif
            </div>
        </div>
    </div>
</x-app-layout>
