<x-app-layout>
    @include('flash::message')
    <div class="grid col-span-full">
        <h1 class="mb-5 text-5xl">Задачи</h1>
        <div class="w-full flex items-center">
            <div>
                <form method="GET" action="{{ route('tasks') }}">
                    <div class="flex">
                        <select class="rounded border-gray-300" name="filter[status_id]" id="filter[status_id]">
                            <option value="" selected>Статус</option>
                            @foreach (@$statuses as $status)
                                <option value="{{ $status->id }}"{{ ($input['status_id'] == $status->id) ? 'selected' : '' }}>{{ $status->name }}</option>
                            @endforeach
                        </select>
                        <select class="rounded border-gray-300" name="filter[created_by_id]" id="filter[created_by_id]">
                            <option value="" selected>Автор</option>
                            @foreach (@$users as $user)
                                <option value="{{ $user->id }}"{{ ($input['created_by_id'] == $user->id) ? 'selected' : '' }}> {{ $user->name }} </option>
                            @endforeach
                        </select>
                        <select class="rounded border-gray-300" name="filter[assigned_to_id]" id="filter[assigned_to_id]">
                            <option value="" selected>Исполнитель</option>
                            @foreach (@$users as $user)
                                <option value="{{ $user->id }}" {{ ($input['assigned_to_id'] == $user->id) ? 'selected' : '' }}> {{ $user->name }} </option>
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
                        <td> {{$status::find($task['status_id'])->name}} </td>
                        <td><a class="text-blue-600 hover:text-blue-900" href="{{route('tasks', ['id'=>"$task->id"])}}">{{$task->name}}</a></td>
                        <td>{{$user::find($task['created_by_id'])->name}}</td>
                        <td>{{$user::find($task['assigned_to_id'])->name}}</td>
                        <td>{{date('d.m.Y', strtotime($status->created_at))}}</td>
                        <td>
                        @auth
                            @if(@$userId === $task->created_by_id)
                         <a data-confirm="Вы уверены?" data-method="delete" href="{{ route('task.destroy', ['id'=>"$task->id"]) }}" class="text-red-600 hover:text-red-900">Удалить </a>
                            @endif
                        <a href="{{ route('task.edit', ['id'=>"$task->id"]) }}" class="text-blue-600 hover:text-blue-900">Изменить</a>
                        @endauth
                        </td>
                    </tr>
                @endforeach
                </tbody>
        </table>

            <div class="mt-4">
                {{ $tasks->links() }}
            </div>
    </div>
</x-app-layout>




