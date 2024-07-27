<x-layout>

    <div>
        <h1>Home</h1>
        @foreach ($content as $item)

        <p>{{ $item }}</p>

        @endforeach
    </div>
</x-layout>
