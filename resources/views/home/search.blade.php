<x-app-layout>

    <div class="first-page grid gap-10 min-h-screen" style="grid-template-columns: 1fr 2fr 1fr; align-items: start;">

        @include('layouts.sidebar')

        <section class="search-wrapper p-4">

            @if (isset($results))
                <div>
                    <div class="text-xl rounded-lg py-4">

                        <p>Search Results:</p>

                    </div>

                    <h4>Users:</h4>
                    @if (count($results['users']) > 0)
                        <ul>
                            @foreach ($results['users'] as $user)
                                <li>{{ $user->name }} ({{ $user->email }})</li>
                            @endforeach
                        </ul>
                    @else
                        <p>No users found.</p>
                    @endif

                    <h4>Posts:</h4>
                    @if (count($results['posts']) > 0)
                        <ul>
                            @foreach ($results['posts'] as $post)
                                <li>{{ $post->content }} by {{ $post->user->name }}</li>
                            @endforeach
                        </ul>
                    @else
                        <p>No posts found.</p>
                    @endif

                    <h4>Groups:</h4>
                    @if (count($results['groups']) > 0)
                        <ul>
                            @foreach ($results['groups'] as $group)
                                <li>{{ $group->name }}</li>
                            @endforeach
                        </ul>
                    @else
                        <p>No groups found.</p>
                    @endif
                </div>
            @endif

        </section>

    </div>

</x-app-layout>
