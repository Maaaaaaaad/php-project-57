<x-app-layout>
<div class="grid col-span-full">
    <h1 class="mb-5">Статусы</h1>
        <div>
            <a href="{{ route('create.status') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Создать статус            </a>
        </div>
    <x-list :value=@$status />
</div>
</x-app-layout>


