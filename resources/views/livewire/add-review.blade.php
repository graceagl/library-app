<div>
    <form wire:submit.prevent="submitReview">
        <div class="form-group">
            <label for="comment">Comment:</label>
            <textarea wire:model="comment" class="form-control" id="comment" rows="3"></textarea>
            @error('comment') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="rating">Rating:</label>
            <input wire:model="rating" type="number" class="form-control" id="rating" min="1" max="5">
            @error('rating') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    @if (session()->has('message'))
    <div class="alert alert-success mt-3">
        {{ session('message') }}
    </div>
    @endif
</div>