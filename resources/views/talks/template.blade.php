<div class="mx-auto max-w-2xl p-4">
    @csrf
    <div>
        <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
        <input
            type="text"
            id="title"
            name="title"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
            value="{{ old('title', $talk->title) }}"
            placeholder="How to save a life"
        />
        <x-input-error :messages="$errors->get('title')" />
    </div>

    <div class="grid grid-cols-2 gap-4">
        <div>
            <label for="type" class="block text-sm font-medium text-gray-700">Type</label>
            <select
                id="type"
                name="type"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
            >
                @foreach (App\Enums\TalkType::cases() as $talkType)
                    <option
                        value="{{ $talkType->value }}"
                        {{-- {{ old('type') === $talkType->value ? 'selected' : '' }} --}}
                        @selected($talkType->value === old('type', $talk->type))
                    >
                        {{ ucwords($talkType->value) }}
                    </option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('type')" />
        </div>
        <div>
            <label for="length" class="block text-sm font-medium text-gray-700">Length</label>
            <input
                type="text"
                id="length"
                value="{{ old('length', $talk->length) }}"
                name="length"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
            />
            {{-- <p class="mt-1 text-sm text-red-600" id="length-error">Error message here.</p> --}}
            <x-input-error :messages="$errors->get('length')" />
        </div>
    </div>

    <div>
        <label for="abstract" class="block text-sm font-medium text-gray-700">Abstract</label>
        <textarea
            id="abstract"
            name="abstract"
            rows="4"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
        >
            {{ old('abstract', $talk->abstract) }}
        </textarea>
        <p class="mt-1 text-sm text-gray-500">
            Describe the talk in a few sentences, in a way that's compelling and informative and could be presented to
            the public.
        </p>
        <x-input-error :messages="$errors->get('abstract')" />
    </div>

    <div>
        <label for="organizer_notes" class="block text-sm font-medium text-gray-700">Organizer Notes</label>
        <textarea
            id="organizer_notes"
            name="organizer_notes"
            rows="4"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
        >
            {{ old('organizer_notes', $talk->organizer_notes) }}
        </textarea>
        <p class="mt-1 text-sm text-gray-500">
            Write any notes you may want to pass to an event organizer about this talk.
        </p>
        <x-input-error :messages="$errors->get('organizer_notes')" />
    </div>

    <div class="flex justify-end">
        <button
            type="button"
            class="mr-2 rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
        >
            Cancel
        </button>
        <button
            type="submit"
            class="rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
        >
            Save
        </button>
    </div>
</div>
