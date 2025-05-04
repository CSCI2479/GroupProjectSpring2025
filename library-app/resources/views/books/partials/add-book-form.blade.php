<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Add Book') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Fill in book details.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('book.create') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="title" :value="__('Title')" />
            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title', $book->title)" required autofocus autocomplete="title" />
            <x-input-error class="mt-2" :messages="$errors->get('title')" />
        </div>

        <div>
            <x-input-label for="author_id" :value="__('Author')" />
            <x-text-input id="author_id" name="author_id" type="author_id" class="mt-1 block w-full" :value="old('author_id', $book->author_id)" required autocomplete="author_id" />
            <x-input-error class="mt-2" :messages="$errors->get('author_id')" />
        </div>

        <div>
            <x-input-label for="category_id" :value="__('Category')" />
            <x-text-input id="category_id" name="category_id" type="category_id" class="mt-1 block w-full" :value="old('category_id', $book->category_id)" required autocomplete="category_id" />
            <x-input-error class="mt-2" :messages="$errors->get('category_id')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'book-created')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Added.') }}</p>
            @endif
        </div>
    </form>
</section>
