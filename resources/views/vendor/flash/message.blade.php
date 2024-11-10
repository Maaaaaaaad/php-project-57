@foreach (session('flash_notification', collect())->toArray() as $message)
            @if (!$message['important'])
                <div class="font-medium text-red-600">
                {{ $message['message'] }}
                </div>
            @elseif($message['important'])
                <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                    <li>{{ $message['message'] }}</li>
                </ul>
            @endif
@endforeach


