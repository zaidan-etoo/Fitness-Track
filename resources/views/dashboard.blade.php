@extends('layouts.app')

@section('content')
@php
    // Jika $workouts tidak dikirim, ambil dari session (fallback)
    if (!isset($workouts)) {
        if (!session()->has('user_id')) {
            header("Location: " . route('login'));
            exit;
        }
        $workouts = \App\Models\Workout::where('user_id', session('user_id'))
            ->orderBy('created_at', 'desc')
            ->get();
    }
@endphp

<div style="min-height: 100vh; background-color: #0f172a; color: #f8fafc; padding: 2rem 1rem; font-family: 'Inter', sans-serif;">
    <div style="max-width: 600px; margin: 0 auto;">

        <!-- Hero -->
        <div style="background: linear-gradient(135deg, #1e40af, #7c3aed); border-radius: 16px; padding: 2rem; margin-bottom: 2rem; color: white;">
            <h1 style="font-size: 28px; font-weight: 800; margin: 0;">Welcome Back!</h1>
            <p style="opacity: 0.9; margin-top: 8px;">Rasa Sakit Itu Sementara, Penyesalan Itu Selamanya</p>
        </div>

        <!-- Stats Grid -->
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(140px, 1fr)); gap: 1rem; margin-bottom: 2rem;">
            <!-- Total Workouts -->
            <div style="background: #1e293b; padding: 1.25rem; border-radius: 12px; text-align: center;">
                <div style="background: #3b82f6; width: 40px; height: 40px; border-radius: 10px; display: flex; align-items: center; justify-content: center; margin: 0 auto 0.75rem;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 2v20M17 5H9.5a2.5 2.5 0 0 0 0 5h5a2.5 2.5 0 0 1 0 5H6"/>
                    </svg>
                </div>
                <div style="color: #94a3b8; font-size: 0.85rem;">Total Workouts</div>
                <div style="font-size: 1.5rem; font-weight: 700; margin-top: 4px;">{{ $workouts->count() }}</div>
            </div>

            <!-- Active Minutes -->
            <div style="background: #1e293b; padding: 1.25rem; border-radius: 12px; text-align: center;">
                <div style="background: #10b981; width: 40px; height: 40px; border-radius: 10px; display: flex; align-items: center; justify-content: center; margin: 0 auto 0.75rem;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="4" width="18" height="16" rx="2" ry="2"/>
                        <line x1="16" y1="2" x2="16" y2="6"/>
                        <line x1="8" y1="2" x2="8" y2="6"/>
                        <line x1="3" y1="10" x2="21" y2="10"/>
                    </svg>
                </div>
                <div style="color: #94a3b8; font-size: 0.85rem;">Active Minutes</div>
                <div style="font-size: 1.5rem; font-weight: 700; margin-top: 4px;">
                    {{ $workouts->sum('duration') }}
                </div>
            </div>
        </div>

        <!-- Recent Workouts -->
        <div style="background: #1e293b; border-radius: 16px; padding: 1.5rem; box-shadow: 0 4px 12px rgba(0,0,0,0.1);">
            <h2 style="font-size: 1.25rem; font-weight: 700; margin-bottom: 1rem; color: #f8fafc;">Recent Workouts</h2>

            @if($workouts->isEmpty())
                <div style="text-align: center; padding: 2rem; color: #94a3b8;">
                    <div style="font-size: 40px; margin-bottom: 1rem;">🏋️</div>
                    <p>No workouts yet.</p>
                    <a href="{{ route('workouts.create') }}" style="color: #3b82f6; text-decoration: none; font-weight: 600; margin-top: 1rem; display: inline-block;">
                        Add your first workout
                    </a>
                </div>
            @else
                <div style="display: flex; flex-direction: column; gap: 12px;">
                    @foreach($workouts->take(3) as $w)
                    <div style="display: flex; align-items: center; gap: 12px; padding: 12px; background: #334155; border-radius: 12px;">
                        <div style="background: #3b82f6; width: 36px; height: 36px; border-radius: 8px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M12 2v20M17 5H9.5a2.5 2.5 0 0 0 0 5h5a2.5 2.5 0 0 1 0 5H6"/>
                            </svg>
                        </div>
                        <div style="flex: 1;">
                            <div style="font-weight: 600; color: #f8fafc;">{{ $w->workout_name }}</div>
                            <div style="font-size: 0.85rem; color: #94a3b8;">{{ $w->workout_type }}</div>
                        </div>
                        <div style="text-align: right; min-width: 60px;">
                            <div style="font-weight: 700; color: #3b82f6;">{{ $w->duration }} min</div>
                        </div>
                    </div>
                    @endforeach
                </div>
            @endif
        </div>
        @foreach($workouts->take(3) as $w)
        <div style="display: flex; align-items: center; gap: 12px; padding: 12px; background: #334155; border-radius: 12px;">
            <div style="background: #3b82f6; width: 36px; height: 36px; border-radius: 8px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M12 2v20M17 5H9.5a2.5 2.5 0 0 0 0 5h5a2.5 2.5 0 0 1 0 5H6"/>
                </svg>
            </div>
            <div style="flex: 1;">
                <div style="font-weight: 600; color: #f8fafc;">{{ $w->workout_name }}</div>
                <div style="font-size: 0.85rem; color: #94a3b8;">{{ $w->workout_type }}</div>
            </div>
            <div style="text-align: right; min-width: 80px; display: flex; align-items: center; gap: 8px;">
                <div style="font-weight: 700; color: #3b82f6;">{{ $w->duration }} min</div>
                
                <!-- Tombol Remove Kecil -->
                <form method="POST" action="{{ route('workouts.destroy', $w->id) }}" style="margin: 0;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            onclick="return confirm('Remove this workout?')"
                            style="background: #dc2626; color: white; border: none; padding: 2px 6px; border-radius: 4px; cursor: pointer; font-size: 0.75rem;">
                        ×
                    </button>
                </form>
            </div>
        </div>
        @endforeach

        <!-- Quick Actions -->
        <div style="margin-top: 2rem; display: flex; gap: 12px;">
            <a href="{{ route('workouts.create') }}" 
               style="flex: 1; background: linear-gradient(135deg, #3b82f6, #2563eb); color: white; padding: 14px; border-radius: 12px; text-decoration: none; font-weight: 600; text-align: center;">
                ➕ Add New Workout
            </a>
            <a href="{{ route('workouts.index') }}" 
               style="flex: 1; background: #334155; color: #f8fafc; padding: 14px; border-radius: 12px; text-decoration: none; font-weight: 600; text-align: center;">
                📝 View Log
            </a>
        </div>

        <!-- Logout di kanan atas -->
        <div style="position: fixed; top: 1.5rem; right: 1.5rem;">
            <a href="{{ route('logout') }}" 
               style="background: #26dc8a; color: white; padding: 6px 12px; border-radius: 6px; font-size: 14px; text-decoration: none;">
                Logout
            </a>
        </div>
    </div>
</div>
@endsection