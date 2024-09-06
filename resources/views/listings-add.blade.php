@extends('layouts.master')


@section('content')

@if(session('error'))
    <div class="alert alert-danger mt-2">
        {{ session('error') }}
    </div>
@endif

<div class="container">
    <div class="col-lg-12">
        <div class="text-start mx-auto mb-5 wow slideInLeft" data-wow-delay="0.1s">
            <h1 class="m-3" style="color: #00B98E">Add a new property</h1>
            <p>Provide some informations about your property. all fields marked with "&#42;" are required</p>
        </div>
    </div>
    <form action="{{ route('listings.store') }}" id="listing-form" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Title &#42; : </label>
            <input type="text" placeholder="Provide a title for your property" name="title" id="title"
                class="form-control" required>
            @error('title')
                <span class="text-danger fs-6">{{$message}}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description &#42; :</label>
            <textarea name="description" placeholder="Provide a description for your property" id="description"
                class="form-control" rows="5" required></textarea>
            @error('description')
                <span class="text-danger fs-6">{{$message}}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price &#42; :</label>
            <input type="number" min="0" name="price" id="price" class="form-control" required>
            @error('price')
                <span class="text-danger fs-6">{{$message}}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Address &#42; :</label>
            <input type="text" placeholder="It doesn't have to be precise, a general area will suffice" name="address"
                id="address" class="form-control" required>
            @error('address')
                <span class="text-danger fs-6">{{$message}}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="city" class="form-label">City &#42; :</label>
            <input type="text" placeholder="Enter your city" name="city" id="city" class="form-control" required>
            @error('city')
                <span class="text-danger fs-6">{{$message}}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="state" class="form-label">State &#42; :</label>
            <select id="state" name="state" class="form-select" required>
                <option value="" selected="selected">Select a State</option>
                <option value="Alabama">Alabama</option>
                <option value="Alaska">Alaska</option>
                <option value="Arizona">Arizona</option>
                <option value="Arkansas">Arkansas</option>
                <option value="California">California</option>
                <option value="Colorado">Colorado</option>
                <option value="Connecticut">Connecticut</option>
                <option value="Delaware">Delaware</option>
                <option value="Florida">Florida</option>
                <option value="Georgia">Georgia</option>
                <option value="Hawaii">Hawaii</option>
                <option value="Idaho">Idaho</option>
                <option value="Illinois">Illinois</option>
                <option value="Indiana">Indiana</option>
                <option value="Iowa">Iowa</option>
                <option value="Kansas">Kansas</option>
                <option value="Kentucky">Kentucky</option>
                <option value="Louisiana">Louisiana</option>
                <option value="Maine">Maine</option>
                <option value="Maryland">Maryland</option>
                <option value="Massachusetts">Massachusetts</option>
                <option value="Michigan">Michigan</option>
                <option value="Minnesota">Minnesota</option>
                <option value="Mississippi">Mississippi</option>
                <option value="Missouri">Missouri</option>
                <option value="Montana">Montana</option>
                <option value="Nebraska">Nebraska</option>
                <option value="Nevada">Nevada</option>
                <option value="New Hampshire">New Hampshire</option>
                <option value="New Jersey">New Jersey</option>
                <option value="New Mexico">New Mexico</option>
                <option value="New York">New York</option>
                <option value="North Carolina">North Carolina</option>
                <option value="North Dakota">North Dakota</option>
                <option value="Ohio">Ohio</option>
                <option value="Oklahoma">Oklahoma</option>
                <option value="Oregon">Oregon</option>
                <option value="Pennsylvania">Pennsylvania</option>
                <option value="Rhode Island">Rhode Island</option>
                <option value="South Carolina">South Carolina</option>
                <option value="South Dakota">South Dakota</option>
                <option value="Tennessee">Tennessee</option>
                <option value="Texas">Texas</option>
                <option value="Utah">Utah</option>
                <option value="Vermont">Vermont</option>
                <option value="Virginia">Virginia</option>
                <option value="Washington">Washington</option>
                <option value="West Virginia">West Virginia</option>
                <option value="Wisconsin">Wisconsin</option>
                <option value="Wyoming">Wyoming</option>
            </select>
            @error('state')
                <span class="text-danger fs-6">{{$message}}</span>
            @enderror
        </div>



        <div class="mb-3">
            <label for="type" class="form-label">Type &#42; :</label>
            <select id="type" name="type" class="form-select" required>
                <option value="">Select Type</option>
                <option value="Private Room">Private Room</option>
                <option value="Shared Room">Shared Room</option>
                <option value="Apartment">Apartment</option>
            </select>
            @error('type')
                <span class="text-danger fs-6">{{$message}}</span>
            @enderror
        </div>

        <div class="mb-3" id="hideElement">
            <label for="gender" class="form-label">Gender :</label>
            <select id="gender" name="gender" class="form-select">
                <option value="">Select Gender</option>
                <option value="Male">Male only</option>
                <option value="Female">Female only</option>

            </select>
            @error('gender')
                <span class="text-danger fs-6">{{$message}}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="availability" class="form-label">Available from &#42; :</label>
            <input type="date" name="availability" id="availability" class="form-control" required>
            @error('availability')
                <span class="text-danger fs-6">{{$message}}</span>
            @enderror
        </div>


        <div class="mb-3">
            <label for="duration" class="form-label">Duration &#42; :</label>
            <input type="text" placeholder="How long is it available for" name="duration" id="duration"
                class="form-control" required>
            @error('duration')
                <span class="text-danger fs-6">{{$message}}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="thumbnail" class="form-label">Thumbnail (10MB limit) &#42; :</label>
            <input type="file" id="thumbnail" name="thumbnail" class="form-control" accept="image/*" required>
            @error('thumbnail')
                <span class="text-danger fs-6">{{$message}}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="images" class="form-label">Upload Images (10MB limit) :</label>
            <input type="file" name="images[]" id="images" class="form-control" accept="image/*" multiple>
            @error('images')
                <span class="text-danger fs-6">{{$message}}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Create Property</button>
    </form>
</div>






<script>
    document.addEventListener('DOMContentLoaded', function () {
        const optionSelect = document.getElementById('type');
        const conditionalElements = document.getElementById('hideElement');

        optionSelect.addEventListener('change', function () {
            if (this.value === 'Apartment') {
                conditionalElements.style.display = 'none';
            } else {
                conditionalElements.style.display = 'block';
            }
        });

        document.getElementById('listing-form').addEventListener('submit', function (e) {
            const fileInput = document.getElementById('thumbnail');
            const filesInput = document.getElementById('images');
            const file = fileInput.files[0];
            const photos = filesInput.files;

            if (file) {
                const fileType = file.type;
                const validImageTypes = ['image/jpeg', 'image/png', 'image/gif'];

                if (!validImageTypes.includes(fileType)) {
                    alert('Please upload a valid image file (JPEG, PNG, GIF).');
                    e.preventDefault(); // Prevent the form from submitting
                }
            }
            
            for (let i = 0; i < photos.length; i++) {
                const photo =photos[i];
                if(photo){
                    const photoType = photo.type;
                    let validPhotoTypes = ['image/jpeg', 'image/png', 'image/gif'];
                    if (!validPhotoTypes.includes(photoType)) {
                        alert('Please upload a valid image file (JPEG, PNG, GIF).');
                    e.preventDefault();
                    }
                }
                
            } 
        });

        

    });

</script>




@endsection('content')