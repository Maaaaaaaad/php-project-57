<x-app-layout>
    <div class="grid col-span-full">
        <h1 class="mb-5">Создать статус</h1>
            <form class="w-50" method="POST" action="{{ route('store.status') }}">
                @csrf
            <div class="mt-2">
                <x-input-label for="name" :value="__('Имя')" />
                <x-text-input id="name" class="rounded border-gray-300 w-1/3" type="text" name="name" />
            </div>
            <div class="mt-2">
                <x-primary-button >
                    {{ __('Создать') }}
                </x-primary-button>
             </div>
        </form>
    </div>
</x-app-layout>
