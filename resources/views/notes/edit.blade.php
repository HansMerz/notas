<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Note') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{route('notes.update', $note)}}">
                        @csrf @method('PUT')
                        <x-input-label class="mt-4">{{__('Title')}}</x-input-label>
                        <input type="text" name="title" value="{{old('title', $note->title)}}" class="block w-full rounded-md border-gray-300 bg-white shadow-sm transition-colors duration-300 dark:text-white dark:focus:border-indigo-300 dark:focus:ring dark:focus:ring-indigo-200 dark:focus:ring-opacity-50"/>
                        <x-input-error class="mt-2" :messages="$errors->get('title')"/>
                        <x-input-label class="mt-4">{{__('What are you up to?')}}</x-input-label>
                        <textarea name="description"
                                  class="block w-full rounded-md border-gray-300 bg-white shadow-sm transition-colors duration-300 dark:text-white dark:focus:border-indigo-300 dark:focus:ring dark:focus:ring-indigo-200 dark:focus:ring-opacity-50"
                        >
                            {{old('description', $note->description)}}
                        </textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('description')"/>
                        <x-primary-button class="mt-4">{{__('Update')}}</x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
