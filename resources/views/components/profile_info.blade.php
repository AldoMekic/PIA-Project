@php
    use Carbon\Carbon;

    if (Session::has('user')) {
        $userData = Session::get('user');
        $dateOfBirth = Carbon::parse($userData['date_of_birth']); // Convert to Carbon instance
    }
@endphp

@if (Session::has('user'))
    <div class="profile-details">
        <p><strong>Name:</strong> {{ $userData['name'] }}</p>
        <p><strong>Surname:</strong> {{ $userData['surname'] }}</p>
        <p><strong>Gender:</strong> {{ $userData['gender'] == 'M' ? 'Male' : 'Female' }}</p>
        <p><strong>Birthplace:</strong> {{ $userData['birthplace'] }}</p>
        <p><strong>Date of Birth:</strong> {{ $dateOfBirth->format('m/d/Y') }}</p>
        <p><strong>JMBG:</strong> {{ $userData['jmbg'] }}</p>
        <p><strong>Phone Number:</strong> {{ $userData['phone_num'] }}</p>
    </div>
@else
    <p>No user information available.</p>
@endif