<x-app-layout>

    <div class="grid col-span-full">
        <h1 class="mb-5 text-5xl">Изменение задачи</h1>
        <form class="w-50" method="POST" action="{{ route('tasks.update', ["id" => "$task->id"]) }}">
            @method('PATCH')
            @csrf
            <div class="flex flex-col">
                <div>
                    <label for="name">Имя</label>
                </div>
                <div class="mt-2">
                    <input class="rounded border-gray-300 w-1/3"  type="text" name="name" id="name" value="{{$task->name}}">
                    @if ($errors->get('name'))
                        @foreach($errors->get('name') as $error)
                            <div class="text-rose-600"> {{$error}}</div>
                        @endforeach
                    @endif
                </div>
                <div class="mt-2">
                    <label for="description">Описание</label>
                </div>
                <div>
                    <textarea class="rounded border-gray-300 w-1/3 h-32" name="description" id="description">{{$task->description}}</textarea>
                </div>
                <div class="mt-2">
                    <label for="status_id">Статус</label>
                </div>
                <div>
                    <select class="rounded border-gray-300 w-1/3" name="status_id" id="status_id">
                        @foreach (@$statuses as $status)
                            @if ($task->status_id == $status->id )
                                <option value="{{ $task->status_id }}" selected="selected">{{ $statuses->find("$task->status_id")->name }}</option>
                            @endif
                            @if ($task->status_id != $status->id)
                                <option value={{ $status->id }}>{{ $status->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                @if ($errors->get('status_id'))
                    @foreach($errors->get('status_id') as $error)
                        <div class="text-rose-600"> {{$error}}</div>
                    @endforeach
                @endif
                <div class="mt-2">
                    <label for="assigned_to_id">Исполнитель</label>
                </div>
                <div>
                    <select class="rounded border-gray-300 w-1/3" name="assigned_to_id" id="assigned_to_id">
                        @foreach (@$users as $user)
                            @if ($task->assigned_to_id == $user->id )
                                <option value="{{ $task->assigned_to_id }}" selected="selected">{{ $users->find("$task->assigned_to_id")->name }}</option>
                            @endif
                            @if ($task->assigned_to_id != $user->id)
                                    <option value={{ $user->id }}>{{ $user->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                @if ($errors->get('assigned_to_id'))
                    @foreach($errors->get('assigned_to_id') as $error)
                        <div class="text-rose-600"> {{$error}}</div>
                    @endforeach
                @endif
                <div class="mt-2">
                    <label for="labels">Метки</label>
                </div>

                <div>
                    <select class="rounded border-gray-300 w-1/3 h-32" name="labels[]" id="labels[]" multiple>
                        @foreach (@$notTurnLabels as $label)
                            <option value="{{ $label->id }}">{{ $label->name }}</option>
                        @endforeach
                     @if(!empty(@$taskLabels))
                        @foreach(@$taskLabels as $taskLabel)
                                <option value="{{ $taskLabel->id }}" selected="selected">{{ $taskLabel->name }}</option>
                        @endforeach
                     @endif
                    </select>
                </div>
                <div class="mt-2">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">Обновить</button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>



