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
<!-- Button to open modal -->
<button class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700" onclick="openModal()">
    Open Modal
  </button>



  Hello Rona,

  I hope you are well. I just saw the email you sent me and I apologize that the exercise was supposed to be completed yesterday. If you allow me, I will start now.

  Thank you!




  <!-- Modal -->
  <div id="modal" class="fixed top-0 left-0 flex items-center justify-center hidden w-full h-full modal">
    <div class="absolute w-full h-full bg-gray-900 opacity-50 modal-overlay"></div>

    <div class="z-50 w-11/12 mx-auto overflow-y-auto bg-white rounded shadow-lg modal-container md:max-w-md">

      <!-- Modal content -->
      <div class="text-left modal-content">

        <!-- Title -->
        <table>
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    @foreach ($order->products as $product)
                        <tr>
                            <td>{{ $order->fullname }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->pivot->quantity }}</td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>

      </div>
    </div>
  </div>


                    <table class="w-full">
                        <thead class="bg-white border-b">
                        @if($orders && count($orders) > 0)
                            <tr>
                                <th class="px-6 py-4 text-sm font-medium text-left text-gray-900">ID</th>

                                <th class="px-6 py-4 text-sm font-medium text-left text-gray-900">View</th>
                                <th class="px-6 py-4 text-sm font-medium text-left text-gray-900">Fullname</th>
                                <th class="px-6 py-4 text-sm font-medium text-left text-gray-900">Email</th>
                                <th class="px-6 py-4 text-sm font-medium text-left text-gray-900">Phone</th>
                                <th class="px-6 py-4 text-sm font-medium text-left text-gray-900 ">Total</th>
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

                                    <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{{ $order->id }}</td>
                                    <td class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">{{ $order->fullname }}</td>
                                    <td  class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">{{ $order->email }}</td>
                                    <td  class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">{{ $order->phone }}
                                    <td  class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">{{ number_format($order->total, 2, ) }}
                                        <td > <a class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                                            href="{{ route('orders.show', $order->id) }}"> Edit</a></td>
                                       <td>
                                        <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" onclick="openModal({{ $order->id }})">
                                            Edit
                                        </button></td>
                                        <td>


<!-- Button to toggle dropdown -->
<button id="dropdownInformationButton" data-dropdown-toggle="dropdownInformation" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">Dropdown header <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>

<!-- Dropdown menu -->
<div id="dropdownInformation" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
    <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
      <div>Bonnie Green</div>
      <div class="font-medium truncate">name@flowbite.com</div>
    </div>
    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownInformationButton">
      <li>
        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
      </li>
      <li>
        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
      </li>
      <li>
        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
      </li>
    </ul>
    <div class="py-2">
      <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign out</a>
    </div>
</div>









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





    <div class="conatiner">
        <h1>Orders</h1>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Product</th>
                    <th>User</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
    <tr>
        <td>{{ $order->id }}</td>
        <td>{{ $order->product_name }}</td>
        <td>{{ $order->user_name }}</td>
        <td>{{ $order->created_at }}</td>
        <td>
            <a href="" class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">View</a>
        </td>
    </tr>
@endforeach
            </tbody>
        </table>
    </div>


    <div>
        <table>
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    @foreach ($order->products as $product)
                        <tr>
                            <td>{{ $order->fullname }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->pivot->quantity }}</td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>

