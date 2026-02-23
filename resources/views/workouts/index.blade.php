@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 800px; margin: 2rem auto; padding: 20px;">
    <h2>Your Workout Log</h2>

    @if(session('success'))
        <div style="background: #10b981; color: white; padding: 12px; border-radius: 8px; margin-bottom: 20px; text-align: center;">
            {{ session('success') }}
        </div>
    @endif

    @if($workouts->isEmpty())
        <p>No workouts yet. <a href="{{ route('workouts.create') }}" style="color: #3b82f6;">Add your first workout!</a></p>
    @else
        @foreach($workouts as $w)
        <div style="border: 1px solid #f2f8ff; border-radius: 8px; padding: 16px; margin-bottom: 12px;">
            <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                <div>
                    <strong>{{ $w->workout_name }}</strong>
                    <span class="badge" style="background: #000000; color: #4f46e5; padding: 2px 8px; border-radius: 4px; font-size: 0.8rem; margin-left: 8px;">
                        {{ $w->workout_type }}
                    </span>
                    <p style="margin: 4px 0; font-size: 0.85rem; color: #64748b;">
                        {{ $w->created_at->format('d M Y') }}
                    </p>
                </div>
                <div style="text-align: right; display: flex; align-items: center; gap: 12px;">
                    <p><strong>{{ $w->duration }} min</strong></p>
                    
                    <!-- Tombol Remove -->
                    <form method="POST" action="{{ route('workouts.destroy', $w->id) }}" style="margin: 0;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                onclick="return confirm('Are you sure you want to remove this workout?')"
                                style="background: #dc2626; color: white; border: none; padding: 4px 10px; border-radius: 4px; cursor: pointer; font-size: 0.85rem;">
                            Remove
                        </button>
                    </form>
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