<x-app-layout>
    <x-slot name="header">
        <h1>部屋詳細</h1>
    </x-slot>
    <div class="mx-4 my-4">
        <h2 class="fs-2">{{ $room->room_type }}</h2>
        <div class="mx-4 my-4 bg-indigo-100 rounded-2">
            <p>プラン名：{{ $room->room_type }}</p>
            <p>説明：{{ $room->description }}</p>
            <p>価格：{{ $room->price }}円〜</p>
            <a class="fs-4 text-primary" href="{{ route('booking.create', ['room_id' => $room->id]) }}">この部屋を予約する</a>
        </div>
    </div>
    
    <a class="text-primary mx-4 my-4" href="{{ route('plan.index') }}">戻る</a>
</x-app-layout>