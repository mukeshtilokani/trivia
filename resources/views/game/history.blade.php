@extends('layouts.app')

@section('page-scripts')
    <script src="{{ asset('js/frontend/game/index.js') }}" defer></script>
@endsection

@section('content')
    <div class="mt-5 mb-5">
        <h1>Game History</h1>
        @forelse($games as $game)
        <div class="row {{ $loop->index !== 0 ? 'mt-5' : '' }}">
            <div class="col-sm-12">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <strong>{{ 'Game ' . $loop->iteration . ': ' }}</strong>
                        {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $game->created_at)->format('d-m-Y H:i:s') }}
                    </div>
                </div>
                <div class="row mb-1">
                    <div class="col-sm-2">
                        <strong>Name:</strong> {{ $game->name }}
                    </div>
                </div>
                <div class="row mb-1">
                    <div class="col-sm-12">
                        <strong>Who is the best cricketer in the world?</strong>
                    </div>
                    <div class="col-sm-12">
                        {{ $game->best_cricketer }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <strong>What are the colors in the national flag?</strong>
                    </div>
                    <div class="col-sm-12">
                        {{ $game->flag_colour }}
                    </div>
                </div>
            </div>
        </div>
        @empty
            <p>No game history found.</p>
        @endforelse
    </div>
@endsection