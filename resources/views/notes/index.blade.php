<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Notes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{route('notes.store')}}">
                        @csrf
                        <x-input-label class="mt-4">{{__('Title')}}</x-input-label>
                        <input type="text" name="title" class="block w-full rounded-md border-gray-300 bg-white shadow-sm transition-colors duration-300 dark:text-white dark:focus:border-indigo-300 dark:focus:ring dark:focus:ring-indigo-200 dark:focus:ring-opacity-50"/>
                        <x-input-error class="mt-2" :messages="$errors->get('title')"/>
                        <x-input-label class="mt-4">{{__('What are you up to?')}}</x-input-label>
                        <textarea name="description"
                                  class="block w-full rounded-md border-gray-300 bg-white shadow-sm transition-colors duration-300 dark:text-white dark:focus:border-indigo-300 dark:focus:ring dark:focus:ring-indigo-200 dark:focus:ring-opacity-50"
                        >
                            {{old('description')}}
                        </textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('description')"/>
                        <x-primary-button class="mt-4">{{__('Add')}}</x-primary-button>
                    </form>
                </div>
            </div>
            <div class="mt-6 bg-white dark:bg-gray-800 shadow-sm rounded-lg divide-y dark:divide-gray-900">
                @foreach($notes as $note)
                    <div class="p-6 flex space-x-2">
                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-300" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"></path>
                        </svg>
                        <div class="flex-1">
                            <div class="flex justify-between items-center">
                                <div>
                                    <span class="text-gray-800 dark:text-gray-200">
                                        {{$note->user->name}}
                                    </span>
                                    <small class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{$note->created_at->format('j M Y, g:i a')}}</small>
                                </div>
                            </div>
                            <p class="mt-4 text-lg text-gray-900 dark:text-gray-100">{{$note->title}}</p>
                            <small class="mt-2 ml-2 text-sm text-gray-600 dark:text-gray-400">{{$note->description}}</small>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
