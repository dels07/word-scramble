@extends('master')

@section('body')
    <div class="header">
        <div class="title">Game History</div>
        <button type="button" class="btn-logout">
            <span><i class="fas fa-power-off"></i></span>
        </button>
    </div>

    <div class="box-table">
        <table>
            <tr>
                <th>Name</th>
                <th>Points</th>
                <th>Played</th>
            </tr>
            @forelse($histories as $history)
            <tr>
                <td>{{ $history->user->name }}</td>
                <td class="text-center">{{ $history->point > 0 ? '+'.$history->point : $history->point }}</td>
                <td class="text-center">{{ $history->created_at->diffForHumans() }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="3">no data available</td>
            </tr>
            @endforelse
        </table>
        {{ $histories->links() }}
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $(function() {
            $('.btn-logout').click(function() {
                window.location.replace("{{ route('auth.login') }}");
            });
        })
    </script>
@endsection