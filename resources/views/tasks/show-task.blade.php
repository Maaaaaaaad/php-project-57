<x-app-layout>
    <div class="grid col-span-full">
            <h2 class="mb-5 text-3xl">
                Просмотр задачи: {{$task['name']}} <a href="">⚙</a>
            </h2>
            <p><span class="font-black">Имя:</span> {{$task['name']}}</p>
            <p><span class="font-black">Статус:</span> {{$status[0]}}</p>
            <p><span class="font-black">Описание:</span> {{$task['description']}}</p>
            <p><span class="font-black">Метки:_____________</span></p>
    </div>
</x-app-layout>




