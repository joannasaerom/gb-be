<form action="{{ route('contacts.mergeUpdate') }}" method="POST">
    @csrf
    @method('PUT')

    <input type="hidden" id="contact1" name="contact1" value="{{$contact1->id}}">
    <input type="hidden" id="contact2" name="contact2" value="{{$contact2->id}}">

    Master Account
    <input type="radio" id="{{$contact1->id}}" name="master_id" value="{{$contact1->id}}">
    <label for="{{$contact1->id}}">{{$contact1->id}}</label>
    <input type="radio" id="{{$contact2->id}}" name="master_id" value="{{$contact2->id}}">
    <label for="{{$contact2->id}}">{{$contact2->id}}</label>
    <hr>

    First Name
    <input type="radio" id="{{$contact1->first_name}}" name="first_name" value="{{$contact1->first_name}}">
    <label for="{{$contact1->first_name}}">{{$contact1->first_name}}</label>
    <input type="radio" id="{{$contact2->first_name}}" name="first_name" value="{{$contact2->first_name}}">
    <label for="{{$contact2->first_name}}">{{$contact2->first_name}}</label>
    <hr>

    Last Name
    <input type="radio" id="{{$contact1->last_name}}" name="last_name" value="{{$contact1->last_name}}">
    <label for="{{$contact1->last_name}}">{{$contact1->last_name}}</label>
    <input type="radio" id="{{$contact2->last_name}}" name="last_name" value="{{$contact2->last_name}}">
    <label for="{{$contact2->last_name}}">{{$contact2->last_name}}</label>
    <hr>

    Primary Email
    <input type="radio" id="{{$contact1->primary_email}}" name="primary_email" value="{{$contact1->primary_email}}">
    <label for="{{$contact1->primary_email}}">{{$contact1->primary_email}}</label>
    <input type="radio" id="{{$contact2->primary_email}}" name="primary_email" value="{{$contact2->primary_email}}">
    <label for="{{$contact2->primary_email}}">{{$contact2->primary_email}}</label>
    <hr>

    Business Email
    <input type="radio" id="{{$contact1->business_email}}" name="business_email" value="{{$contact1->business_email}}">
    <label for="{{$contact1->business_email}}">{{$contact1->business_email}}</label>
    <input type="radio" id="{{$contact2->business_email}}" name="business_email" value="{{$contact2->business_email}}">
    <label for="{{$contact2->business_email}}">{{$contact2->business_email}}</label>
    <hr>

    Other Email
    <input type="radio" id="{{$contact1->other_email}}" name="other_email" value="{{$contact1->other_email}}">
    <label for="{{$contact1->other_email}}">{{$contact1->other_email}}</label>
    <input type="radio" id="{{$contact2->other_email}}" name="other_email" value="{{$contact2->other_email}}">
    <label for="{{$contact2->other_email}}">{{$contact2->other_email}}</label>
    <hr>

    Primary Phone
    <input type="radio" id="{{$contact1->primary_phone}}" name="primary_phone" value="{{$contact1->primary_phone}}">
    <label for="{{$contact1->primary_phone}}">{{$contact1->primary_phone}}</label>
    <input type="radio" id="{{$contact2->primary_phone}}" name="primary_phone" value="{{$contact2->primary_phone}}">
    <label for="{{$contact2->primary_phone}}">{{$contact2->primary_phone}}</label>
    <hr>

    Home Phone
    <input type="radio" id="{{$contact1->home_phone}}" name="home_phone" value="{{$contact1->home_phone}}">
    <label for="{{$contact1->home_phone}}">{{$contact1->home_phone}}</label>
    <input type="radio" id="{{$contact2->home_phone}}" name="home_phone" value="{{$contact2->home_phone}}">
    <label for="{{$contact2->home_phone}}">{{$contact2->home_phone}}</label>
    <hr>

    Mobile Phone
    <input type="radio" id="{{$contact1->mobile_phone}}" name="mobile_phone" value="{{$contact1->mobile_phone}}">
    <label for="{{$contact1->mobile_phone}}">{{$contact1->mobile_phone}}</label>
    <input type="radio" id="{{$contact2->mobile_phone}}" name="mobile_phone" value="{{$contact2->mobile_phone}}">
    <label for="{{$contact2->mobile_phone}}">{{$contact2->mobile_phone}}</label>
    <hr>

    Other Phone
    <input type="radio" id="{{$contact1->other_phone}}" name="other_phone" value="{{$contact1->other_phone}}">
    <label for="{{$contact1->other_phone}}">{{$contact1->other_phone}}</label>
    <input type="radio" id="{{$contact2->other_phone}}" name="other_phone" value="{{$contact2->other_phone}}">
    <label for="{{$contact2->other_phone}}">{{$contact2->other_phone}}</label>
    <hr>

    <button>Merge!</button>
</form>
