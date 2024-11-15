<x-app-layout>
    <div class="grid col-span-full">
        @foreach($task as $item)
            <h2 class="mb-5 text-3xl">
                Просмотр задачи:{{$item->name}} <a href="">⚙</a>
            </h2>
            <p><span class="font-black">Имя:</span> {{$item->name}}</p>
            <p><span class="font-black">Статус:</span> {{$status[0]}}</p>
            <p><span class="font-black">Описание:</span> {{$item->description}}</p>
            <p><span class="font-black">Метки:_____________</span></p>
        @endforeach

    </div>
</x-app-layout>




