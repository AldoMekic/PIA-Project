@if (Auth::check())
    @php
        $user = Auth::user();
        $dateOfBirth = \Carbon\Carbon::parse($user->date_of_birth); // Fully qualified name
    @endphp

    <div class="profile-details">
        <p><strong>Name:</strong> {{ $user->name }}</p>
        <p><strong>Surname:</strong> {{ $user->surname }}</p>
        <p><strong>Gender:</strong> {{ $user->gender == 'M' ? 'Male' : 'Female' }}</p>
        <p><strong>Birthplace:</strong> {{ $user->birthplace }}</p>
        <p><strong>Date of Birth:</strong> {{ $dateOfBirth->format('m/d/Y') }}</p>
        <p><strong>JMBG:</strong> {{ $user->jmbg }}</p>
        <p><strong>Phone Number:</strong> {{ $user->phone_num }}</p>
    </div>
@else
    <p>No user information available.</p>
@endif