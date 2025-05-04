<x-app-layout>
    <x-slot name="header">
        <h1>予約枠一覧</h1>
    </x-slot>

    <div class="mx-20 my-4">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="mb-4">
            <a href="{{ route('availability.create') }}" class="btn btn-primary">新規予約枠作成</a>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>日付</th>
                    <th>部屋タイプ</th>
                    <th>空き状況</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach($availabilities as $availability)
                    <tr>
                        <td>{{ $availability->date->format('Y-m-d') }}</td>
                        <td>{{ $availability->room->room_type }}</td>
                        <td>
                            @if($availability->is_available)
                                <span class="badge bg-success">空きあり</span>
                            @else
                                <span class="badge bg-danger">空きなし</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('availability.edit', $availability) }}" class="btn btn-sm btn-info">編集</a>
                            <form action="{{ route('availability.destroy', $availability) }}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('本当に削除しますか？')">削除</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>