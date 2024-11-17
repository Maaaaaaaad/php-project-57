<x-app-layout>
    <div class="grid col-span-full">
        <h1 class="mb-5 text-5xl">Задачи</h1>
        <div class="w-full flex items-center">
            <div>
                <form method="GET" action="{{ route('tasks') }}">
                    <div class="flex">
                        <select class="rounded border-gray-300" name="filter[status_id]" id="filter[status_id]">
                            <option value="" selected="selected">Статус</option>
                            @foreach (@$statuses as $status)
                                <option value={{$status->id}}>{{ $status->name }}</option>
                            @endforeach
                        </select>
                        <select class="rounded border-gray-300" name="filter[created_by_id]" id="filter[created_by_id]">
                            <option value="" selected="selected">Автор</option>
                            @foreach (@$users as $user)
                                <option value={{$user->id}}>{{ $user->name }}</option>
                            @endforeach
                        </select>
                        <select class="rounded border-gray-300" name="filter[assigned_to_id]" id="filter[assigned_to_id]">
                            <option value="" selected="selected">Исполнитель</option>
                            @foreach (@$users as $user)
                                <option value={{$user->id}}>{{ $user->name }}</option>
                            @endforeach
                        </select>
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-2" type="submit">Применить</button>
                    </div>
                </form>
            </div>
                <div class="ml-auto"> </div>
            @auth
            <a href="{{ route('task.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-2"> Создать задачу </a>
            @endauth
        </div>

        <table class="mt-4">
            <thead class="border-b-2 border-solid border-black text-left">
                <tr>
                    <th>ID</th>
                    <th>Статус</th>
                    <th>Имя</th>
                    <th>Автор</th>
                    <th>Исполнитель</th>
                    <th>Дата создания</th>
                    @auth
                    <th>Действия</th>
                    @endauth
                </tr>
            </thead>
                <tbody>
                @foreach (@$tasks as $task)
                    <tr class="border-b border-dashed text-left">
                        <td>{{$task->id}}</td>
                        <td> {{$status::find($task['statuses_id'])->name}} </td>
                        <td><a class="text-blue-600 hover:text-blue-900" href="{{route('task', ['id'=>"$task->id"])}}">{{$task->name}}</a></td>
                        <td>{{$user::find($task['created_by_id'])->name}}</td>
                        <td>{{$user::find($task['assigned_to_id'])->name}}</td>
                        <td>{{date('d.m.Y', strtotime($status->created_at))}}</td>
                       @auth <td><a href="{{--tasks/1/edit--}}" class="text-blue-600 hover:text-blue-900">Изменить</a></td> @endauth
                    </tr>
                @endforeach
                </tbody>
        </table>

            <div class="mt-4">
                {{ $tasks->links() }}
            </div>
    </div>
</x-app-layout>




