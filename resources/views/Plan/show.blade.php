<x-app-layout>
    <x-slot name="header">
        <h1>プラン詳細</h1>
    </x-slot>
    <div class="mx-4 my-4">
        <h2 class="fs-2">{{ $plan->title }}</h2>
        <div class="mx-4 my-4 bg-indigo-100 rounded-2">
            <p>プラン名：{{ $plan->title }}</p>
            <p>食事内容：{{ $plan->meal }}</p>
            <p>価格：{{ $plan->price }}円〜</p>
            <a class="fs-4 text-primary" href="{{ route('booking.create', ['plan_id' => $plan->id]) }}">このプランを予約する</a>
        </div>
    </div>
    
    <a class="text-primary mx-4 my-4" href="{{ route('plan.index') }}">戻る</a>
</x-app-layout>