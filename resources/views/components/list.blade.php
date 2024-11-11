@props(['value'])
<table class="mt-4">
    <thead class="border-b-2 border-solid border-black text-left">
        <tr>
            <th>ID</th>
            <th>Имя</th>
            <th>Дата создания</th>
            <th>Действия</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($value as $status)
        <tr class="border-b-2 border-solid border-black text-left">
            <td>{{$status->id}}</td>
            <td>{{$status->name}}</td>
            <td>{{$status->created_at}}</td>
            <td>
                <a data-confirm="Вы уверены?" data-method="delete" class="text-red-600 hover:text-red-900" href=""> Удалить </a>
                <a class="text-blue-600 hover:text-blue-900" href=""> Изменить </a>
            </td>
        </tr>
    @endforeach
    </tbody>

</table>
