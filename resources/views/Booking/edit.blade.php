<x-app-layout>
    <x-slot name="header"><h1>予約内容の変更</h1></x-slot>
    <div class="mx-20 my-4">
        <form action="{{ route('booking.update', ['booking' => $booking->id]) }}" method="post">
            @csrf
            @method('PUT')
            <dl>
                <dt>名前</dt>
                <dd><input type="text" name="name" value="{{ $booking->name }}"></dd>
                <dt>メールアドレス</dt>
                <dd><input type="text" name="email" value="{{ $booking->email }}"></dd>
                <dt>電話番号</dt>
                <dd><input type="text" name="phone_number" value="{{ $booking->phone_number }}"></dd>
                <dt>住所</dt>
                <dd><input type="text" name="address" value="{{ $booking->address }}"></dd>
                <dt>プラン</dt>
                    <dd>
                        <select name="plan_id">
                            <option value="" selected>プランを選択してください</option>
                            @foreach($plans as $plan)
                                <option value="{{ $plan->id }}" {{ $booking->plan_id == $plan->id ? 'selected' : '' }}>
                                    {{ $plan->title }}
                                </option>
                            @endforeach
                        </select>
                    </dd>
                <dt>部屋タイプ</dt>
                    <dd>
                        <select name="room_id">
                            <option value="" selected>部屋タイプを選択してください</option>
                            @foreach($rooms as $room)
                                <option value="{{ $room->id }}" {{ $booking->room_id == $room->id ? 'selected' : '' }}>
                                    {{ $room->room_type }}
                                </option>
                            @endforeach
                        </select>
                    </dd>
                <dt>チェックイン</dt>
                <dd><input type="date" name="check_in" value="{{ $booking->check_in }}"></dd>   
                <dt>チェックアウト</dt> 
                <dd><input type="date" name="check_out" value="{{ $booking->check_out }}"></dd>
                <dt>予約人数</dt>
                <dd>
                    <select name="people" value="{{ $booking->people }}">
                        @for($i = 1; $i <= 5; $i++)
                            <option value="{{ $i }}" {{ $booking->people == $i ? 'selected' : '' }}>
                                {{ $i }}人
                            </option>
                        @endfor
                    </select>
                </dd>
            </dl>
            <button type="submit" class="btn btn-primary my-4">変更する</button>
        </form>
        <a href="{{ route('booking.index', ['booking' => $booking->id]) }}" class="btn btn-secondary my-4">戻る</a>
    </div>
</x-app-layout>