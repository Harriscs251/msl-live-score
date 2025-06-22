@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-header text-center bg-gradient-primary text-white">
                    <h4 class="font-weight-bold">Submit Your Feedback</h4>
                </div>
                <div class="card-body">

                    <!-- Display Success Message -->
                    @if(session('success'))
                        <div class="alert alert-success shadow-sm">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('feedback.store') }}" method="POST">
                        @csrf

                        <!-- Shopee-style Star Rating -->
                        <div class="form-group">
                            <label class="font-weight-bold d-block mb-2">Rating (1 to 5 Stars)</label>
                            <div class="rating-stars d-flex mb-3">
                                @for ($i = 1; $i <= 5; $i++)
                                    <i class="star-icon bi bi-star-fill" data-value="{{ $i }}"></i>
                                @endfor
                            </div>
                            <input type="hidden" name="rating" id="rating" required>
                        </div>

                        <!-- Comment Input -->
                        <div class="form-group">
                            <label for="comment" class="font-weight-bold">Your Comment</label>
                            <textarea name="comment" id="comment" rows="4" class="form-control shadow-sm" required placeholder="Write your feedback here..."></textarea>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-lg btn-gradient-primary btn-block shadow-sm mt-3">Submit Feedback</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Star Rating Styles -->
<style>
    .rating-stars {
        font-size: 2rem;
        color: #ddd;
        cursor: pointer;
        user-select: none;
    }
    .rating-stars .star-icon {
        transition: color 0.2s;
        margin-right: 5px;
    }
    .rating-stars .star-icon.hovered,
    .rating-stars .star-icon.selected {
        color: #ffc107;
    }
</style>

<!-- Bootstrap Icons CDN (for star icons) -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<!-- Star Rating Script -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const stars = document.querySelectorAll('.star-icon');
        const ratingInput = document.getElementById('rating');
        let selectedRating = 0;

        stars.forEach((star, index) => {
            star.addEventListener('mouseover', () => {
                stars.forEach((s, i) => {
                    s.classList.toggle('hovered', i <= index);
                });
            });

            star.addEventListener('mouseout', () => {
                stars.forEach((s, i) => {
                    s.classList.remove('hovered');
                });
            });

            star.addEventListener('click', () => {
                selectedRating = index + 1;
                ratingInput.value = selectedRating;
                stars.forEach((s, i) => {
                    s.classList.toggle('selected', i < selectedRating);
                });
            });
        });
    });
</script>
@endsection
