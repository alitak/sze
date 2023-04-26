<x-app-layout>
    <main class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <h1>{{ $job->name }}</h1>
        <h2>{{ $job->company->name }}</h2>
        <h3>{{ $job->salary }}</h3>

        <div class="mt-3">
            <a href="{{ route('jobs.index') }}" class="border border-2 border-black p-1">Back</a>
        </div>
    </main>
</x-app-layout>
