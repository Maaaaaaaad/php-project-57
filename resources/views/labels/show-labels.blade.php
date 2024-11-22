<x-app-layout>
    @include('flash::message')
    <div class="grid col-span-full">
        <h1 class="mb-5 text-5xl">Метки</h1>

        <div>
            @auth
            <a href="{{ route('labels.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"> Создать метку </a>
            @endauth
        </div>

        <table class="mt-4">
            <thead class="border-b-2 border-solid border-black text-left">
            <tr>
                <th>ID</th>
                <th>Имя</th>
                <th>Описание</th>
                <th>Дата создания</th>
                @auth
                    <th>Действия</th>
                @endauth
            </tr>
            </thead>
            <tbody>
            @foreach (@$labels as $label)
                <tr class="border-b border-dashed text-left">
                    <td>{{ $label->id }}</td>
                    <td>{{ $label->name }}</td>
                    <td>{{ $label->description }}</td>
                    <td>{{date('d.m.Y', strtotime($label->created_at))}}</td>
                    <td>
                        @auth
                            <a data-confirm="Вы уверены?" data-method="delete" class="text-red-600 hover:text-red-900" href="{{ route('labels.destroy', ['id' => "$label->id"] ) }}"> Удалить </a>
                            <a class="text-blue-600 hover:text-blue-900" href="{{ route('labels.edit', ['id' => "$label->id"] ) }}"> Изменить </a>
                        @endauth
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
