<x-app-layout>
    <x-slot name="header">
        <h1>プラン一覧</h1>
    </x-slot>
    <div class="container my-4">
        <div class="row row-cols-1 row-cols-md-4 g-4">
            @foreach($plans as $plan)
                <div class="col">
                    <div class="card h-100">
                        <img src="#" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title fs-3">{{ $plan->title }}</h5>
                            <p class="card-text text-left">{{ $plan->body }}</p>
                            <a href="{{ route('plan.show',$plan) }}" class="btn btn-primary">プラン詳細</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <a class="text-primary mx-4 my-4" href="{{ route('top.index') }}">トップページへ戻る</a>
</x-app-layout>