@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 500px; margin: 2rem auto; padding: 20px;">
    <h2>Add New Workout</h2>
    
    <form method="POST" action="{{ route('workouts.store') }}">
        @csrf
        <div style="margin: 12px 0;">
            <label>Name</label>
            <input type="text" name="name" required style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
        </div>
        <div style="margin: 12px 0;">
            <label>Type</label>
                <select name="workout_name" required>
                    <option value="">Pilih olahraga</option>
                    <option value="Push Up">Push Up</option>
                    <option value="Pull Up">Pull Up</option>
                    <option value="Run">Run</option>
                    <option value="Lift Weight">Lift Weight</option>
                    <option value="Squat">Squat</option>
                    <option value="Sit Up">Sit Up</option>
                </select>
        </div>
        <div style="margin: 12px 0;">
            <label>Duration (min)</label>
            <input type="number" name="duration" min="1" required style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
        </div>
        <button type="submit" style="background: #3b82f6; color: white; border: none; padding: 12px 20px; border-radius: 4px; cursor: pointer; width: 100%; margin-top: 16px;">
            Save Workout
        </button>
    </form>
</div>
@endsection