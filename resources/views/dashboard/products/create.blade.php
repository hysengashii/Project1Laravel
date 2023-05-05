<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
               {{-- <form action=" {{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="name" placeholder="Product name"  required>
                    <input type="text" name="qty" placeholder="qty" required>
                    <input type="text" name="price" placeholder="Enter price" required>
                    <textarea name="description" placeholder="Description" id="" cols="30" rows="10" required></textarea>
                    <input type="file" name="image" >
                    <button type="submit">Submit</button>
               </form> --}}

               <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="p-6 bg-white rounded-lg shadow-md" >
                @csrf
                <h2 class="mb-4 text-lg font-medium">Edit Product</h2>
                        <div class="mb-6">
                            <label for="text" class="block mb-2 text-sm font-medium text-gray-900 ">Product Name</label>
                            <input type="text" name="name"   class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600  dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Product Name" required>
                        </div>
                        <div class="mb-6">
                            <label for="text" class="block mb-2 text-sm font-medium text-gray-900 ">Qty</label>
                            <input type="text" name="qty"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Qty" required>
                        </div>
                        <div class="mb-6">
                            <label for="text" class="block mb-2 text-sm font-medium text-gray-900 ">Price</label>
                            <input type="text" name="price"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Price" required>
                        </div>
                        <div class="mb-6">
                            <label for="text" class="block mb-2 text-sm font-medium text-gray-900 ">Description</label>
                            <input type="text" name="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Description" required>
                        </div>

                    <div class="mb-4">
                        <label class="block mb-2 font-medium" for="product-image">Current Image</label>
                        <input class="w-full p-2 border border-gray-400" type="file" id="product-image" name="image" accept="image/*">
                    </div>

                <!-- <button type="submit">Update</button> -->
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Update</button>

            </form>
            </div>
        </div>
    </div>
</x-app-layout>
