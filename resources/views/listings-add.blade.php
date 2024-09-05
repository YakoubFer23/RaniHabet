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
            <h1 class="m-3" style="color: #00B98E">Add a new listing</h1>
            <p>Provide some informations about your listing. all fields marked with "&#42;" are required</p>
        </div>
    </div>
    <form action="{{ route('listings.store') }}" id="listing-form" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Title &#42; : </label>
            <input type="text" placeholder="Provide a title for your listing" name="title" id="title"
                class="form-control" required>
            @error('title')
                <span class="text-danger fs-6">{{$message}}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description &#42; :</label>
            <textarea name="description" placeholder="Provide a description for your listing" id="description"
                class="form-control" rows="5" required></textarea>
            @error('description')
                <span class="text-danger fs-6">{{$message}}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price &#42; :</label>
            <input type="number" name="price" id="price" class="form-control" required>
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
                <option value="AL">Alabama</option>
                <option value="AK">Alaska</option>
                <option value="AZ">Arizona</option>
                <option value="AR">Arkansas</option>
                <option value="CA">California</option>
                <option value="CO">Colorado</option>
                <option value="CT">Connecticut</option>
                <option value="DE">Delaware</option>
                <option value="DC">District Of Columbia</option>
                <option value="FL">Florida</option>
                <option value="GA">Georgia</option>
                <option value="HI">Hawaii</option>
                <option value="ID">Idaho</option>
                <option value="IL">Illinois</option>
                <option value="IN">Indiana</option>
                <option value="IA">Iowa</option>
                <option value="KS">Kansas</option>
                <option value="KY">Kentucky</option>
                <option value="LA">Louisiana</option>
                <option value="ME">Maine</option>
                <option value="MD">Maryland</option>
                <option value="MA">Massachusetts</option>
                <option value="MI">Michigan</option>
                <option value="MN">Minnesota</option>
                <option value="MS">Mississippi</option>
                <option value="MO">Missouri</option>
                <option value="MT">Montana</option>
                <option value="NE">Nebraska</option>
                <option value="NV">Nevada</option>
                <option value="NH">New Hampshire</option>
                <option value="NJ">New Jersey</option>
                <option value="NM">New Mexico</option>
                <option value="NY">New York</option>
                <option value="NC">North Carolina</option>
                <option value="ND">North Dakota</option>
                <option value="OH">Ohio</option>
                <option value="OK">Oklahoma</option>
                <option value="OR">Oregon</option>
                <option value="PA">Pennsylvania</option>
                <option value="RI">Rhode Island</option>
                <option value="SC">South Carolina</option>
                <option value="SD">South Dakota</option>
                <option value="TN">Tennessee</option>
                <option value="TX">Texas</option>
                <option value="UT">Utah</option>
                <option value="VT">Vermont</option>
                <option value="VA">Virginia</option>
                <option value="WA">Washington</option>
                <option value="WV">West Virginia</option>
                <option value="WI">Wisconsin</option>
                <option value="WY">Wyoming</option>
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

        <button type="submit" class="btn btn-primary">Create Listing</button>
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