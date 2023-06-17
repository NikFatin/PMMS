<x-app-layout>
    <div class='py-12'>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class='p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg'>
            <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('payment.store') }}" class="mt-6 space-y-6">

        @csrf

        <div>
            <x-input-label for="method" :value="__('Method')" />
            <x-text-input id="method" name="method" type="text" class="mt-1 block w-full" required autofocus autocomplete="task" />
            <x-input-error class="mt-2" :messages="$errors->get('method')" />
        </div>
        <div>
            <x-input-label for="status" :value="__('Status')" />
            <x-text-input id="status" name="status" type="text" class="mt-1 block w-full" required autofocus autocomplete="task" />
            <x-input-error class="mt-2" :messages="$errors->get('status')" />
        </div>
        <div>
            <x-input-label for="total" :value="__('Total (RM)')" />
            <x-text-input id="total" name="total" type="text" class="mt-1 block w-full" required autofocus autocomplete="task" />
            <x-input-error class="mt-2" :messages="$errors->get('total')" />
        </div>
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
            <a href="{{ route('payment.index') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Cancel</a>
        </div>
    </form>
            </div>
        </div>
    </div>
</x-app-layout>
