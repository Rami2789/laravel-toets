<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Test') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="flex">
                <p class="opacity-70">
                   <strong>Created: </strong> {{ $tests->created_at->diffForHumans() }}
                </p>
                <p class="opacity-70 ml-8">
                <strong>Updated at: </strong> {{ $tests->updated_at->diffForHumans() }}
                </p>
                <a href="{{ route('test.edit', $tests) }}" class="btn-link ml-auto">Edit Test</a>
                <form action="{{ route('test.destroy', $tests) }}" method="post">
        @method('delete')
        @csrf
        <button type="submit" class="btn btn-danger ml-4" onclick="return confirm('Are you sure you wish to delete this test?')">Delete Test</button>
    </form>

            </div>


<div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <h2 class="font-bold text-4xl">
                    {{ $tests->title }}
                </h2>
                <p class="mt-6 whitespace-pre-wrap">
		   {{ $tests->text }}
	       </p>
            </div>
        </div>
    </div>
</x-app-layout>
