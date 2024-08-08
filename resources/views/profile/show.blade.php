<x-app-layout>
    <div class="first-page grid gap-10 min-h-screen" style="grid-template-columns: 1fr 3fr; align-items: start;">

    @include('layouts.sidebar')

    <section class="profile-wrapper p-4">

        <div class="profile-container">
            <h1>{{ $user->name }}'s Profile</h1>
            <p>Email: {{ $user->email }}</p>
        </div>

</x-app-layout>
