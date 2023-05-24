<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('orders') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                @if (session('status'))
                        <div class="alert alert-danger">
                            {{ session('status') }}
                        </div>
                    @endif
                <div class="table-responsive">
                    <table class="w-full">
                        <thead class="bg-white border-b">
                        @if($orders && count($orders) > 0)
                            <tr>
                                <th class="px-6 py-4 text-sm font-medium text-left text-gray-900">ID</th>
                                <th class="px-6 py-4 text-sm font-medium text-left text-gray-900">Fullname</th>
                                <th class="px-6 py-4 text-sm font-medium text-left text-gray-900">Email</th>
                                <th class="px-6 py-4 text-sm font-medium text-left text-gray-900">Phone</th>
                                <th class="px-6 py-4 text-sm font-medium text-left text-gray-900 ">Total</th>
                                <th class="px-6 py-4 text-sm font-medium text-left text-gray-900 ">Details</th>
                                <th class="px-6 py-4 text-sm font-medium text-left text-gray-900 ">Approve</th>
                                @if(Auth::user()->hasRole('admin'))
                                  <th class="px-6 py-4 text-sm font-medium text-left text-gray-900 ">Delete</th>
                        @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                                <tr class="bg-gray-100 border-b">
                                    <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{{ $order->id }}</td>
                                    <td class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">{{ $order->fullname }}</td>
                                    <td  class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">{{ $order->email }}</td>
                                    <td  class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">{{ $order->phone }}</td>
                                    <td  class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">{{ number_format($order->total, 2, ) }}</td>
                                    <td >
                                         <a class="py-2.5 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800  dark:bg-blue-600 dark:hover:bg-blue-700 "
                                            href="{{ route('orders.show', $order->id) }}"> Order Details
                                        </a>
                                    </td>
                                    {{-- <td>
                                        <button class="text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" onclick="openModal({{ $order->id }})">
                                            Order Details
                                        </button>
                                    </td> --}}

                                        @if(Auth::user()->hasRole('admin'))
                                         @if ($order->approval_status == 'pending')
                                            <td>
                                                <form action="{{ route('orders.update', $order) }}" method="POST" class="inline-block">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="status" value="approved">
                                                    <button type="submit" class="px-4 py-2 font-semibold text-white bg-green-500 rounded-md hover:bg-green-600">
                                                        Approve
                                                    </button>
                                                </form>
                                                <form action="{{ route('orders.update', $order) }}" method="POST" class="inline-block">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="status" value="refused">
                                                    <button type="submit" class="px-4 py-2 font-semibold text-white bg-red-500 rounded-md hover:bg-red-600">
                                                        Refuse
                                                    </button>
                                                </form>
                                            </td>
                                                @elseif ($order->approval_status == 'approved')
                                            <td>

                                                    <button type="submit" class="focus:outline-none text-white bg-green-500  font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-green-600 dark:hover:bg-green-700">Approve</button>

                                            </td>
                                                @elseif ($order->approval_status == 'refused')
                                            <td>

                                                    <button type="submit" class="focus:outline-none text-white bg-red-500 hover:bg-red-600  focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Refused</button>
                                                </form>
                                            </td>
                                        @endif
                                         {{-- customer nese eshte e shikon nese eshte status == approved e len buttonin aprov.... --}}
                                        @elseif ($order->approval_status == 'approved')
                                        <td>
                                                <button type="submit" class="focus:outline-none text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-900">Approve</button>
                                        </td>
                                        @elseif ($order->approval_status == 'refused')
                                        <td>
                                                <button type="submit" class="focus:outline-none text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Refused</button>
                                        </td>
                                        @elseif ($order->approval_status == 'pending')
                                        <td>
                                                <button class="px-4 py-2 font-medium text-white bg-yellow-400 rounded-lg shadow-md hover:bg-yellow-500">
                                                    Pending
                                                </button>
                                        </td>
                                        @endif
                                    <td>
                                        <form  action="{{ route('orders.destroy', $order) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"  class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                <div class="p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:text-red-400" role="alert">
                    <span class="font-medium">0 Order!</span>
                </div>
                @endif

                </div>
            </div>
        </div>
    </div>

</x-app-layout>

