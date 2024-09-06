@extends('layouts.master')


@section('content')


@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger mt-2">
        {{ session('error') }}
    </div>
@endif

<div class="container">
    <h2 class="m-3">Your Properties</h2>
    <table class="table table-hover">
        <tbody>
            @if ($userListings->isEmpty())
                <div class="alert alert-danger mt-2">
                    You don't have any properties listed
                </div>
            @endif
            @foreach($userListings as $listing)
                <tr>
                    <td>{{ $listing->title }}</td>
                    <td>{{$listing->status}}</td>
                    <td colspan="2">
                        <a href="{{ route('listings.show', $listing->id) }}" target="_blank" class="btn btn-info">View</a>
                        <form action="{{ route('dash.listing.delete', $listing->id) }}" method="POST"
                            style="display: inline;" onsubmit="return confirmDelete(event)">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                <!-- Users who applied to this listing -->
                @foreach($listing->applications as $application)
                    <tr>
                        <td colspan="3"> &nbsp; &nbsp;Applied User: {{ $application->user->firstname }}
                            {{ $application->user->lastname }}
                        </td>
                        <td>
                            <a href="{{ route('user.show', $application->user->id) }}" class="btn btn-info">View User</a>
                        </td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>

    <h2 class="m-3">Properties You Applied To</h2>
    <table class="table table-hover">
        <tbody>
            @if ($appliedListings->isEmpty())
                <div class="alert alert-danger mt-2">
                    You haven't applied to any property
                </div>
            @endif
            @foreach($appliedListings as $application)
                <tr>
                    <td>{{ $application->listing->title }}</td>
                    <td><a href="{{ route('user.show', $application->listing->user_id) }}" class="btn btn-info">View
                            User</a></td>
                    <td>
                        <a href="{{ route('listings.show', $application->listing->id) }}" class="btn btn-info">View</a>
                        <form action="{{ route('dash.application.delete', $application->id) }}" method="POST"
                            style="display: inline;" onsubmit="return confirmDelete(event)">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="row justify-content-center">
        <div class="col-md-6">

            @if (session('message'))
                <h5 class="alert alert-success mb-2">{{ session('message') }}</h5>
            @endif

            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li class="text-danger">{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <div class="card shadow">
                <div class="card-header bg-dark" style="background-color: #00B98E !important;">
                    <h4 class="mb-0 text-white">Change Your Password</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('change-password')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label>Current password</label>
                            <input type="password" name="current_password" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label>New password</label>
                            <input type="password" name="password" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label>Confirm new password</label>
                            <input type="password" name="password_confirmation" class="form-control" />
                        </div>
                        <div class="mb-3 text-end">
                            <hr>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection('content')


<script src="{{asset('js/sweetalert.js')}}">
</script>
<script>
    console.log('Sic Parvis Magna');
    function confirmDelete(event) {
        event.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                event.target.submit(); // Submit the form if confirmed
            }
        });
    }
</script>