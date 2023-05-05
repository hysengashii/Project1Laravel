<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Slides') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                <div class="flex flex-col">
                    <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5">
                        <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                            <div class="overflow-hidden">
                                <a href="{{ route('slides.create') }}"><button type="button" class="px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 dark:bg-blue-600 dark:hover:bg-blue-700">Creat Product</button></a>

                            <table class="w-full">
                                    <thead class="bg-white border-b">
                                    @if($slides && count($slides) > 0)
                                        <tr>
                                            <th class="px-6 py-4 text-sm font-medium text-left text-gray-900">ID</th>
                                            <th class="px-6 py-4 text-sm font-medium text-left text-gray-900">Title</th>
                                            <th class="px-6 py-4 text-sm font-medium text-left text-gray-900">Image</th>
                                            <th class="px-6 py-4 text-sm font-medium text-left text-gray-900">Subtite</th>
                                            <th class="px-6 py-4 text-sm font-medium text-left text-gray-900 ">Edit</th>
                                            <th class="px-6 py-4 text-sm font-medium text-left text-gray-900 ">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($slides as $slide)
                                            <tr class="bg-gray-100 border-b">
                                                <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{{ $slide->id }}</td>
                                                <td class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">{{ $slide->title }}</td>
                                                <td  class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">{{ $slide->image }}
                                                <img src="{{ asset('storage/slides/'.$slide->image) }}" width="250px" alt="{{ $slide->title }}">
                                                </td>
                                                <td class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">{{ $slide->subtitle }}</td>
                                                <td > <a class="px-5 py-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 dark:bg-blue-600 dark:hover:bg-blue-700" href="{{ route('slides.edit', $slide) }}"> Edit</a></td>
                                                <td>
                                                    <form  action="{{ route('slides.destroy', $slide) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"  class="px-5 py-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-red-800 dark:bg-red-600 dark:hover:bg-red-700">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                            </table>
                                        @else
                                        <p>0 Slides</p>
                                        @endif
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>

