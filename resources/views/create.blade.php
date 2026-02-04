@extends('layouts.app')

@section('content')
<div style="max-width: 500px; margin: 2rem auto; padding: 20px;">
    <a href="{{ route('dashboard') }}" style="display: inline-block; margin-bottom: 16px; color: #3b82f6; text-decoration: none;">
    <h2>Add New Workout</h2>
    <form method="POST" action="{{ route('workouts.store') }}">
        @csrf
        <div style="margin: 12px 0;">
            <label>Name</label>
            <input type="text" name="name" required style="width: 100%; padding: 8px;">
        </div>
        <div style="margin: 12px 0;">
            <label>Type</label>
            <select name="type" required style="width: 100%; padding: 8px;">
                <option value="Strength">Strength</option>
                <option value="Cardio">Cardio</option>
            </select>
        </div>
        <div style="margin: 12px 0;">
            <label>Duration (min)</label>
            <input type="number" name="duration" min="1" required style="width: 100%; padding: 8px;">
        </div>
        <div style="margin: 12px 0;">
            <label>Calories</label>
            <input type="number" name="calories" min="0" required style="width: 100%; padding: 8px;">
        </div>
        <button type="submit" style="background: #3b82f6; color: white; border: none; padding: 12px; width: 100%;">
            Save Workout
        </button>
    </form>
</div>
@endsection