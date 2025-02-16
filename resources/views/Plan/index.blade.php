<x-app-layout>
    <x-slot name="header">
        <h1>プラン一覧</h1>
    </x-slot>
    <div class="">
    @foreach($plans as $plan)
        <div class="container overflow-hidden text-center border">
            <div class="row gy-5">
                <div class="col-md-6 bg-indigo-400 fs-2">
                        <a href="{{ route('plan.show',$plan) }}">{{ $plan->title }}</a>
                </div>
                <div class="col-md-6">
                    <div class="p-3">
                        <p>{{ $plan->body }}</p>  <!-- プラン内容を表示 -->
                        <p>{{ $plan->price }} 円</p> <!-- 価格を表示 -->
                        @if($plan->image)  <!-- 画像がある場合のみ表示 -->
                            <img src="{{ Storage::url($plan->image) }}" class="img-fluid">
                        @else
                            <p>画像はありません</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <a class="text-info" href="{{ route('top.index') }}">トップページへ戻る</a>
</x-app-layout>
