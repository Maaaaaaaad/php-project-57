<x-app-layout>
<div class="grid col-span-full">
    <h1 class="mb-5 text-5xl">Статусы</h1>
        <div>
            @auth
            <a href="{{ route('status.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Создать статус            </a>
            @endauth
        </div>

    <table class="mt-4">
        <thead class="border-b-2 border-solid border-black text-left">
        <tr>
            <th>ID</th>
            <th>Имя</th>
            <th>Дата создания</th>
            @auth
            <th>Действия</th>
            @endauth
        </tr>
        </thead>
        <tbody>
        @foreach (@$statuses as $status)
            <tr class="border-b border-dashed text-left">
                <td>{{$status->id}}</td>
                <td>{{$status->name}}</td>
                <td>{{date('d.m.Y', strtotime($status->created_at))}}</td>
                <td>
                    @auth
                    <a href="{{ route('status.destroy', ['id'=>"$status->id"]) }}" data-confirm="Вы уверены?" data-method="delete" class="text-red-600 hover:text-red-900" > Удалить </a>
                    <a href="{{ route('status.edit', ['id'=>"$status->id"]) }}" class="text-blue-600 hover:text-blue-900"> Изменить </a>
                    @endauth
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>





</x-app-layout>


