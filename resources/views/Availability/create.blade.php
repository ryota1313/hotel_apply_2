<x-app-layout>
    <x-slot name="header"><h1>予約枠作成ページ</h1></x-slot>
    <div class="mx-20 my-4">
        <form action="{{ route('availability.store') }}" method="post">
            @csrf
            <dl>
                <dt>日付</dt>
                <x-input-error :messages="$errors->get('date')" />
                <dd><input type="date" name="date" value="{{ old('date') }}" class="form-control w-25"></dd>

                <dt>部屋タイプ</dt>
                <x-input-error :messages="$errors->get('room_id')" />
                <dd>
                    <select name="room_id" class="form-control w-25">
                        <option value="" selected>部屋タイプを選択してください</option>
                        @foreach($rooms as $room)
                            <option value="{{ $room->id }}" {{ old('room_id') == $room->id ? 'selected' : '' }}>
                                {{ $room->room_type }}
                            </option>
                        @endforeach
                    </select>
                </dd>

                <dt>空き状況</dt>
                <x-input-error :messages="$errors->get('is_available')" />
                <dd>
                    <select name="is_available" class="form-control w-25">
                        <option value="1" {{ old('is_available') == '1' ? 'selected' : '' }}>空きあり</option>
                        <option value="0" {{ old('is_available') == '0' ? 'selected' : '' }}>空きなし</option>
                    </select>
                </dd>
            </dl>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary">作成する</button>
                <a href="{{ route('availability.index') }}" class="btn btn-secondary">戻る</a>
            </div>
        </form>
    </div>
</x-app-layout>