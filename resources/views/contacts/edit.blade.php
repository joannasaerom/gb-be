<h1>Edit Contact {{$contact->first_name}}</h1>
@if($errors->count())
    @foreach ($errors->all() as $message)
        {{$message}}
    @endforeach
@endif

<form action="{{ route('contacts.update', ['contact' => $contact->id]) }}" method="POST">

    @csrf
    @method('PUT')

    <div>
        <label for="first_name">First Name</label>
        <input value="{{$contact->first_name}}" type="text" name="first_name" required>
    </div>

    <div>
        <label for="last_name">Last Name</label>
        <input value="{{$contact->last_name}}" type="text" name="last_name" required>
    </div>

    <div>
        <label for="primary_email">Primary Email</label>
        <input value="{{$contact->primary_email}}" type="email" name="primary_email" required>
    </div>

    <div>
        <label for="business_email">Business Email</label>
        <input value="{{$contact->business_email}}" type="email" name="business_email">
    </div>

    <div>
        <label for="other_email">Other Email</label>
        <input value="{{$contact->other_email}}" type="email" name="other_email">
    </div>

    <div>
        <label for="primary_phone">Primary Phone</label>
        <input value="{{$contact->primary_phone}}" type="tel" name="primary_phone" required>
    </div>

    <div>
        <label for="home_phone">Home Phone</label>
        <input value="{{$contact->home_phone}}" type="tel" name="home_phone">
    </div>

    <div>
        <label for="mobile_phone">Mobile Phone</label>
        <input value="{{$contact->mobile_phone}}" type="tel" name="mobile_phone">
    </div>

    <div>
        <label for="other_phone">Other Phone</label>
        <input value="{{$contact->other_phone}}" type="tel" name="other_phone">
    </div>

    <button>
        Update Contact
    </button>
</form>
