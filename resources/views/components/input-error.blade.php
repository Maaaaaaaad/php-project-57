@props(['errors'])

@if ($errors)
    <div class="font-medium text-red-600">
        Упс! Что-то пошло не так:
    </div>
    @foreach ($errors as $message)
            <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                <li>{{ $message }}</li>
            </ul>
    @endforeach
@endif
