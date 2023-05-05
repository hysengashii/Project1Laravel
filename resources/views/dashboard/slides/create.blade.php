<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Slides') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (Session::has('status'))
                        {{ Session::get('status') }}
                    @endif
               {{-- <form action="{{ route('slides.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="title" placeholder="Enter title">
                    <input type="text" name="subtitle" placeholder="Enter subtitle">
                    <input type="file" name="image" >
                    <button type="submit">Submit</button>
               </form> --}}

               <form action="{{ route('slides.store')}}" method="POST" enctype="multipart/form-data" class="p-6 bg-white rounded-lg shadow-md" >
                @csrf
                <h2 class="mb-4 text-lg font-medium">Edit Product</h2>
                        <div class="mb-6">
                            <label for="text" class="block mb-2 text-sm font-medium text-gray-900 ">Product Name</label>
                            <input type="text" name="title" class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/5  p-2.5  dark:border-gray-600  dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter title" required>
                        </div>
                        <div class="mb-6">
                            <label for="text" class="block mb-2 text-sm font-medium text-gray-900 ">Subtitle</label>
                            <input type="text" name="subtitle" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/5 p-2.5  dark:border-gray-600 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter Subtitle" required>
                        </div>
                        <input class="p-2 border" type="file" id="product-image" name="image" accept="image/*">

                <!-- <button type="submit">Update</button> -->
                <button type="submit" class="text-white mt-3 bg-blue-700 block hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Update</button>

            </form>
            </div>
        </div>
    </div>
</x-app-layout>
