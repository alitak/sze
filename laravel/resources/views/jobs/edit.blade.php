<x-app-layout>
    <main>
        <form method="POST" action="{{ route('jobs.update', $job) }}" class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            @csrf
            @method('PUT')

            {{--            <input type="hidden" name="id" value="{{ $job->id }}"></input>--}}
            <h1 class="mb-4">Edit job</h1>

            @if(auth()->user()->role === 'admin')
                <div>
                    <x-input-label for="company_id" :value="__('Company')"/>
                    <select name="company_id" id="company_id">
                        @foreach($companies as $company)
                            <option value="{{ $company->id }}" {{ ($company->id == old('company_id', $job->company_id)) ? 'selected' : '' }} >{{ $company->name }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                </div>
            @endif

            <div>
                <x-input-label for="name" :value="__('Name')"/>
                <x-text-input id="name" class="block mt-1 w-full" type="name" name="name" :value="old('name', $job->name)" required autofocus autocomplete="username"/>
                <x-input-error :messages="$errors->get('name')" class="mt-2"/>
            </div>

            <div>
                <x-input-label for="salary" :value="__('Salary')"/>
                <x-text-input id="salary" class="block mt-1 w-full" type="salary" name="salary" :value="old('salary', $job->salary)" required autofocus autocomplete="usersalary"/>
                <x-input-error :messages="$errors->get('salary')" class="mt-2"/>
            </div>

            <a href="{{ route('jobs.index') }}" class="border border-2 border-black p-1">Back</a>
            <x-primary-button class="mt-3">
                {{ __('Update') }}
            </x-primary-button>
        </form>
    </main>
</x-app-layout>
