<div class="recent-workouts" style="max-width: 800px; margin: 0 auto;">
    <h3 style="font-size: 1.2rem;">Log New Workout</h3>
    <p class="label">Track your exercises and build your fitness history</p>
    <br>
    <form method="POST" action="save_workout.php">
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
            <div>
                <label style="font-size: 0.9rem; font-weight: bold;">Workout Name</label>
                <input type="text" name="name" placeholder="e.g., Morning Strength Session" class="custom-input" required>
            </div>
            <div>
                <label style="font-size: 0.9rem; font-weight: bold;">Workout Type</label>
                <select name="type" class="custom-input">
                    <option value="Strength">Strength</option>
                    <option value="Cardio">Cardio</option>
                </select>
            </div>
        </div>

        <div style="background: #f8fafc; padding: 20px; border-radius: 12px; margin-top: 25px;">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
                <h4 style="font-size: 0.9rem;">Exercises</h4>
                <button type="button" class="tag" style="background: white; border: 1px solid #e2e8f0;">+ Add Exercise</button>
            </div>
            
            <div style="display: grid; grid-template-columns: 2fr 1fr 1fr; gap: 15px;">
                <div>
                    <label style="font-size: 0.75rem; color: #64748b;">Exercise Name</label>
                    <input type="text" placeholder="e.g., Bench Press" class="custom-input" style="background: white;">
                </div>
                <div>
                    <label style="font-size: 0.75rem; color: #64748b;">Sets</label>
                    <input type="number" placeholder="3" class="custom-input" style="background: white;">
                </div>
                <div>
                    <label style="font-size: 0.75rem; color: #64748b;">Reps</label>
                    <input type="number" placeholder="10" class="custom-input" style="background: white;">
                </div>
            </div>
            <div style="width: 30%; margin-top: 10px;">
                <label style="font-size: 0.75rem; color: #64748b;">Weight (lbs)</label>
                <input type="number" placeholder="0" class="custom-input" style="background: white;">
            </div>
        </div>

        <div style="background: #eff6ff; padding: 15px; border-radius: 8px; margin-top: 20px; display: flex; justify-content: space-between;">
            <div><p class="label">Estimated Duration</p><strong>45 minutes</strong><input type="hidden" name="duration" value="45"></div>
            <div style="text-align: right;"><p class="label">Estimated Calories</p><strong>320 cal</strong><input type="hidden" name="calories" value="320"></div>
        </div>

        <button type="submit" class="save-btn">💾 Save Workout</button>
    </form>
</div>