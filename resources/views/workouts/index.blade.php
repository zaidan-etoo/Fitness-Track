@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 800px; margin: 2rem auto; padding: 20px;">
    <a href="{{ route('dashboard') }}" style="display: inline-block; margin-bottom: 16px; color: #3b82f6; text-decoration: none;">
        ← Back to Dashboard
    </a>
    <h2>Your Workout Log</h2>
    
    @if($workouts->isEmpty())
        <p>No workouts yet. <a href="{{ route('workouts.create') }}" style="color: #3b82f6;">Add your first workout!</a></p>
    @else
        @foreach($workouts as $w)
        <div style="border: 1px solid #e2e8f0; border-radius: 8px; padding: 16px; margin-bottom: 12px;">
            <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                <div>
                    <strong>{{ $w->workout_name }}</strong>
                    <span class="badge" style="background: #e0e7ff; color: #4f46e5; padding: 2px 8px; border-radius: 4px; font-size: 0.8rem; margin-left: 8px;">
                        {{ $w->workout_type }}
                    </span>
                    <p style="margin: 4px 0; font-size: 0.85rem; color: #64748b;">
                        {{ $w->date_created }}
                    </p>
                </div>
                <div style="text-align: right;">
                    <p><strong>{{ $w->duration }} min</strong></p>
                </div>
            </div>
        </div>
        @endforeach
    @endif

    <div style="margin-top: 20px;">
        <a href="{{ route('workouts.create') }}" style="background: #3b82f6; color: white; padding: 10px 16px; border-radius: 4px; text-decoration: none; display: inline-block;">
            + Add New Workout
        </a>
    </div>
</div>
@endsection