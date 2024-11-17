<x-app-layout>
    <div class="grid col-span-full">
        <h1 class="mb-5">Создать задачу</h1>
        <form class="w-50" method="POST" action="">

            <div class="flex flex-col">
                <div>
                    <label for="name">Имя</label>
                </div>
                <div class="mt-2">
                    <input class="rounded border-gray-300 w-1/3" type="text" name="name" id="name">
                </div>
                <div class="mt-2">
                    <label for="description">Описание</label>
                </div>
                <div>
                    <textarea class="rounded border-gray-300 w-1/3 h-32" name="description" id="description"></textarea>
                </div>
                <div class="mt-2">
                    <label for="status_id">Статус</label>
                </div>
                <div>
                    <select class="rounded border-gray-300 w-1/3" name="status_id" id="status_id"><option value="" selected="selected">
                        @foreach (@$statuses as $status)
                            <option value={{$status->id}}>{{ $status->name }}</option>
                        @endforeach
                        </select>
                </div>
                <div class="mt-2">
                    <label for="status_id">Исполнитель</label>
                </div>
                <div>
                    <select class="rounded border-gray-300 w-1/3" name="assigned_to_id" id="assigned_to_id"><option value="" selected="selected"></option>
                        @foreach (@$users as $user)
                            <option value={{$user->id}}>{{ $user->name }}</option>
                        @endforeach
                    </select>

                </div>
                <div class="mt-2">
                    <label for="status_id">Метки</label>
                </div>
                <div>
                    <select class="rounded border-gray-300 w-1/3 h-32" name="labels[]" id="labels[]" multiple="">
                        <option value="1">ошибка</option></select>
                </div>
                <div class="mt-2">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">Создать</button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
