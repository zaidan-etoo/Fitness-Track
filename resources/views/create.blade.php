@extends('layouts.app')

@section('content')
<div style="min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 20px;">
    <div style="width: 100%; max-width: 400px;">
        
        <div style="text-align: center; margin-bottom: 2rem;">
            <h2 style="color: white; font-weight: 800; font-size: 24px; margin: 0;">Add <span style="color: #3b82f6;">Workout</span></h2>
        </div>

        <div style="background: #1e293b; padding: 30px; border-radius: 20px; border: 1px solid #334155;">
            <form action="{{ route('workouts.store') }}" method="POST">
                @csrf
                
                <div style="margin-bottom: 15px;">
                    <label style="color: #94a3b8; display: block; margin-bottom: 5px; font-size: 14px;">Workout Name</label>
                    <input type="text" name="workout_name" required style="width: 100%; padding: 12px; border-radius: 10px; border: 1px solid #334155; background: #0f172a; color: white; box-sizing: border-box;">
                </div>

                <div style="margin-bottom: 15px;">
                    <label style="color: #0b6efa; display: block; margin-bottom: 5px; font-size: 14px;">Type</label>
                    <select name="workout_type" required style="width: 100%; padding: 12px; border-radius: 10px; border: 1px solid #334155; background: #0f172a; color: white; box-sizing: border-box;">
                        <option value="Push Up">Push Up</option>
                        <option value="Pull Up">Pull Up</option>
                        <option value="Run">Run</option>
                    </select>
                </div>

                <div style="margin-bottom: 25px;">
                    <label style="color: #0b6efa; display: block; margin-bottom: 5px; font-size: 14px;">Duration (Min)</label>
                    <input type="number" name="duration" required style="width: 100%; padding: 12px; border-radius: 10px; border: 1px solid #334155; background: #0f172a; color: white; box-sizing: border-box;">
                </div>

                <button type="submit" style="width: 100%; padding: 15px; background: #3b82f6; color: white; border: none; border-radius: 12px; font-weight: 700; cursor: pointer;">
                    SAVE WORKOUT
                </button>
            </form>
        </div>
    </div>
</div>
@endsection