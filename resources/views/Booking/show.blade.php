<x-app-layout>
    <x-slot name="header"><h1>予約完了</h1></x-slot>
    <div class="mx-20 my-4">
        <h1 class="text-2xl font-bold text-success bg-success-light my-8">予約完了しました</h1>
        <p class="text-xl font-bold">{{ $booking->name }}様</p>
        <div class="mx-4 my-2">
            <p>予約番号は{{ $booking->id }}です。</p>
            <p>当日はお待ちしております</p>
        </div>
        <a href="{{ route('top.index') }}" class="text-blue-500">TOPへ戻る</a>
    </div>
</x-app-layout>


