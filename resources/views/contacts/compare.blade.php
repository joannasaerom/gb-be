<h1>Merge {{$contact1->first_name}} {{$contact1->last_name}} & {{$contact2->first_name}} {{$contact2->last_name}}</h1>
<p>Select which account you would like to be the master account and select the fields you would like it to be updated with.</p>
<form action="{{ route('contacts.mergeUpdate') }}" method="POST">
    @csrf
    @method('PUT')

    <input type="hidden" id="contact1" name="contact1" value="{{$contact1->id}}">
    <input type="hidden" id="contact2" name="contact2" value="{{$contact2->id}}">

    <h2>Master Account</h2>
    <div>
        @if ($contact1->id)
            <input type="radio" id="{{$contact1->id}}" name="master_id" value="{{$contact1->id}}">
            <label for="{{$contact1->id}}"><strong>Account 1:</strong> {{$contact1->id}}</label>
        @endif
        @if ($contact2->id)
            <input type="radio" id="{{$contact2->id}}" name="master_id" value="{{$contact2->id}}">
            <label for="{{$contact2->id}}"><strong>Account 2:</strong> {{$contact2->id}}</label>
        @endif
    </div>
    <hr>

    <h2>First Name</h2>
    <div>
        @if ($contact1->first_name)
            <input type="radio" id="{{$contact1->first_name}}" name="first_name" value="{{$contact1->first_name}}">
            <label for="{{$contact1->first_name}}"><strong>Account 1:</strong> {{$contact1->first_name}}</label>
        @endif
        @if ($contact2->first_name)
            <input type="radio" id="{{$contact2->first_name}}" name="first_name" value="{{$contact2->first_name}}">
            <label for="{{$contact2->first_name}}"><strong>Account 2:</strong> {{$contact2->first_name}}</label>
        @endif
    </div>
    <hr>

    <h2>Last Name</h2>
    <div>
        @if ($contact1->last_name)
            <input type="radio" id="{{$contact1->last_name}}" name="last_name" value="{{$contact1->last_name}}">
            <label for="{{$contact1->last_name}}"><strong>Account 1:</strong> {{$contact1->last_name}}</label>
        @endif
        @if ($contact2->last_name)
            <input type="radio" id="{{$contact2->last_name}}" name="last_name" value="{{$contact2->last_name}}">
            <label for="{{$contact2->last_name}}"><strong>Account 2:</strong> {{$contact2->last_name}}</label>
        @endif
    </div>
    <hr>

    <h2>Primary Email</h2>
    <div>
        @if ($contact1->primary_email)
            <input type="radio" id="{{$contact1->primary_email}}" name="primary_email" value="{{$contact1->primary_email}}">
            <label for="{{$contact1->primary_email}}"><strong>Account 1:</strong> {{$contact1->primary_email}}</label>
        @endif
        @if ($contact2->primary_email)
            <input type="radio" id="{{$contact2->primary_email}}" name="primary_email" value="{{$contact2->primary_email}}">
            <label for="{{$contact2->primary_email}}"><strong>Account 2:</strong> {{$contact2->primary_email}}</label>
        @endif
    </div>
    <hr>

    <h2>Business Email</h2>
    <div>
        @if ($contact1->business_email)
            <input type="radio" id="{{$contact1->business_email}}" name="business_email" value="{{$contact1->business_email}}">
            <label for="{{$contact1->business_email}}"><strong>Account 1:</strong> {{$contact1->business_email}}</label>
        @endif
        @if ($contact2->business_email)
            <input type="radio" id="{{$contact2->business_email}}" name="business_email" value="{{$contact2->business_email}}">
            <label for="{{$contact2->business_email}}"><strong>Account 2:</strong> {{$contact2->business_email}}</label>
        @endif
    </div>
    <hr>

    <h2>Other Email</h2>
    <div>
        @if ($contact1->other_email)
            <input type="radio" id="{{$contact1->other_email}}" name="other_email" value="{{$contact1->other_email}}">
            <label for="{{$contact1->other_email}}"><strong>Account 1:</strong> {{$contact1->other_email}}</label>
        @endif
        @if ($contact2->other_email)
            <input type="radio" id="{{$contact2->other_email}}" name="other_email" value="{{$contact2->other_email}}">
            <label for="{{$contact2->other_email}}"><strong>Account 2:</strong> {{$contact2->other_email}}</label>
        @endif
    </div>
    <hr>

    <h2>Primary Phone</h2>
    <div>
        @if ($contact1->primary_phone)
            <input type="radio" id="{{$contact1->primary_phone}}" name="primary_phone" value="{{$contact1->primary_phone}}">
            <label for="{{$contact1->primary_phone}}"><strong>Account 1:</strong> {{$contact1->primary_phone}}</label>
        @endif
        @if ($contact2->primary_phone)
            <input type="radio" id="{{$contact2->primary_phone}}" name="primary_phone" value="{{$contact2->primary_phone}}">
            <label for="{{$contact2->primary_phone}}"><strong>Account 2:</strong> {{$contact2->primary_phone}}</label>
        @endif
    </div>
    <hr>

    <h2>Home Phone</h2>
    <div>
        @if ($contact1->home_phone)
            <input type="radio" id="{{$contact1->home_phone}}" name="home_phone" value="{{$contact1->home_phone}}">
            <label for="{{$contact1->home_phone}}"><strong>Account 1:</strong> {{$contact1->home_phone}}</label>
        @endif
        @if ($contact2->home_phone)
            <input type="radio" id="{{$contact2->home_phone}}" name="home_phone" value="{{$contact2->home_phone}}">
            <label for="{{$contact2->home_phone}}"><strong>Account 2:</strong> {{$contact2->home_phone}}</label>
        @endif

    </div>
    <hr>

    <h2>Mobile Phone</h2>
    <div>
        @if ($contact1->mobile_phone)
            <input type="radio" id="{{$contact1->mobile_phone}}" name="mobile_phone" value="{{$contact1->mobile_phone}}">
            <label for="{{$contact1->mobile_phone}}"><strong>Account 1:</strong> {{$contact1->mobile_phone}}</label>
        @endif
        @if ($contact2->mobile_phone)
            <input type="radio" id="{{$contact2->mobile_phone}}" name="mobile_phone" value="{{$contact2->mobile_phone}}">
            <label for="{{$contact2->mobile_phone}}"><strong>Account 2:</strong> {{$contact2->mobile_phone}}</label>
        @endif
    </div>
    <hr>

    <h2>Other Phone</h2>
    <div>
        @if ($contact1->other_phone)
            <input type="radio" id="{{$contact1->other_phone}}" name="other_phone" value="{{$contact1->other_phone}}">
            <label for="{{$contact1->other_phone}}"><strong>Account 1:</strong> {{$contact1->other_phone}}</label>
        @endif
        @if ($contact2->other_phone)
            <input type="radio" id="{{$contact2->other_phone}}" name="other_phone" value="{{$contact2->other_phone}}">
            <label for="{{$contact2->other_phone}}"><strong>Account 2:</strong> {{$contact2->other_phone}}</label>
        @endif
    </div>
    <hr>

    <button>Merge!</button>
</form>
