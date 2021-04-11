<h1>Create Contact</h1>
@if($errors->count())
    @foreach ($errors->all() as $message)
        {{$message}}
    @endforeach
@endif
@if (session('alert'))
    {{ session('alert') }}
    @foreach (session('duplicates') as $duplicate)
        <p>{{$duplicate->first_name}} {{$duplicate->last_name}} <a href="{{ route('contacts.edit', ['contact' => $duplicate->id]) }}">Edit</a></p>
    @endforeach
@endif

<form action="{{ route('contacts.store') }}" method="POST">

    @csrf

    <div>
        <label for="first_name">First Name</label>
        <input type="text" name="first_name" required>
    </div>

    <div>
        <label for="last_name">Last Name</label>
        <input type="text" name="last_name" required>
    </div>

    <div>
        <label for="primary_email">Primary Email</label>
        <input type="email" name="primary_email" required>
    </div>


    <div>
        <label for="business_email">Business Email</label>
        <input type="email" name="business_email">
    </div>

    <div>
        <label for="other_email">Other Email</label>
        <input type="email" name="other_email">
    </div>

    <div>
        <label for="primary_phone">Primary Phone</label>
        <input type="tel" name="primary_phone" required>
    </div>

    <div>
        <label for="home_phone">Home Phone</label>
        <input type="tel" name="home_phone">
    </div>

    <div>
        <label for="mobile_phone">Mobile Phone</label>
        <input type="tel" name="mobile_phone">
    </div>

    <div>
        <label for="other_phone">Other Phone</label>
        <input type="tel" name="other_phone">
    </div>

    @if (session('alert'))
        <div>
            <label for="new_contact">Confirm this is a new contact.</label>
            <input type="checkbox" name="new_contact">
        </div>
    @endif

    <button>
        Create Contact
    </button>
</form>
