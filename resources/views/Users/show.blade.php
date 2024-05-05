@if (Auth::check() && Auth::user()->isAdmin()) {{-- Check if the user is logged in and is an admin --}}
    <div class="evaluation-form">
        <form class="form-container" action="{{ route('evaluations.store') }}" method="POST">
            @csrf
            <h3>Leave an Evaluation</h3>
            <input type="hidden" name="evaluator_id" value="{{ $entreprise->id }}">
            <input type="hidden" name="evaluator_type" value="App\Models\User">
            <input type="hidden" name="evaluated_id" value="{{ $user->id }}">
            <input type="hidden" name="evaluated_type" value="App\Models\User">
            <div class="form-group">
                <label for="rating">Rating</label>
                <input type="number" id="rating" name="rating" min="1" max="5" required>
            </div>
            <div class="form-group">
                <label for="comment">Comment</label>
                <textarea id="comment" name="comment"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit Evaluation</button>
        </form>
    </div>
@endif
