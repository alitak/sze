<x-app-layout>
    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <x-auth-session-status class="mb-4" :status="session('message')" />

            <div class="text-right mb-4">
                <a href="{{ route('jobs.create') }}" class="border border-2 border-black p-1">CREATE</a>
            </div>

            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th class="px-6 py-3">#</th>
                    <th class="px-6 py-3">Job title</th>
                    <th class="px-6 py-3">Company</th>
                    <th class="px-6 py-3">&nbsp;</th>
                </tr>
                </thead>
                <tbody>
                @foreach($jobs as $job)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $job->id }}
                        </th>
                        <td class="px-6 py-4">{{ $job->name }}</td>
                        <td class="px-6 py-4">{{ $job->company->name }}</td>
                        <td class="px-6 py-4 flex">
                            <a href="{{ route('jobs.show', $job) }}" class="border border-2 border-black p-1 mr-2">View</a>
                            <a href="{{ route('jobs.edit', $job) }}" class="border border-2 border-black p-1 mr-2">Edit</a>
                            <form action="{{ route('jobs.destroy', $job) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Delete" class="border border-2 border-black p-1">
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </main>
</x-app-layout>
