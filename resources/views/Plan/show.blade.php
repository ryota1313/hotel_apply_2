<x-app-layout>
    <x-slot name="header">
        <h1>プラン詳細</h1>
    </x-slot>
    <div class="">
        <h2 class="fs-2">{{ $plan->title }}</h2>
    </div>
    
    
<a href="{{ route('plan.index') }}">戻る</a>
</x-app-layout>