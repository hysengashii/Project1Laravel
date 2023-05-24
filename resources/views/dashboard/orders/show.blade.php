<x-app-layout>


<div class="py-12 mx-auto max-w-7xl sm:px-6 lg:px-8">
    <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
        <div class="table-responsive">
            <table class="w-full">
                <thead class="bg-white border-b">

                    <tr>
                        <th class="px-6 py-4 text-sm font-medium text-left text-gray-900">ID</th>
                        <th class="px-6 py-4 text-sm font-medium text-left text-gray-900">Product Name</th>
                        <th class="px-6 py-4 text-sm font-medium text-left text-gray-900">Quantity</th>
                        <th class="px-6 py-4 text-sm font-medium text-left text-gray-900">Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->products as $product)
                        <tr class="bg-gray-100 border-b">
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{{ $order->id }}</td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{{ $product->name }}</td>
                            <td class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">{{ $product->pivot->quantity }}</td>
                            <td  class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">{{ $product->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>




    </x-app-layout>
