<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Test') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('test.create') }}" class="btn-link btn-lg mb-2">+ New Note</a>
            @foreach ($test as $tests)
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
            <h2 class="font-bold text-2xl">
                <a href="{{ route('test.show', $tests) }}">{{ $tests->title }}</a>
            </h2>

                    <p>
                        {{ Str::limit( $tests->text, 200 ) }}
                    </p>
<span>
{{ $tests->updated_at->diffForHumans() }}
</span>
                </div>
            @endforeach
            {{ $test->links() }}
        </div>
    </div>
</x-app-layout>
