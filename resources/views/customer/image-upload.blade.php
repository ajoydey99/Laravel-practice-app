<div class="text-center mb-4">

    <!-- Clickable Image -->
    <label for="imageUpload" style="cursor: pointer;">

        <img id="previewImage" src={{ asset($customer->image ?? config('constants.default_profile_image')) }}
            class="edit-img shadow">

    </label>

    <!-- Hidden File Input -->
    <input type="file" name="image" id="imageUpload" class="d-none">

    @if ($errors->has('image'))
        <div class="mt-2 text-danger">
            {{ $errors->first('image') }}
        </div>
    @else
        <div class="mt-2 text-muted small">
            Click on image to upload
        </div>
    @endif

</div>
