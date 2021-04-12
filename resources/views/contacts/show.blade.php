<h1>Contact: {{$contact->first_name}} {{$contact->last_name}}</h1>
<div>
    <a href="{{ route('contacts.edit', ['contact' => $contact->id]) }}">Edit</a>
    <a href="{{route('contacts.delete', ['contact' => $contact->id]) }}">Delete</a>
</div>

<div><strong>First Name:</strong> {{$contact->first_name}}</div>
<div><strong>Last Name:</strong> {{$contact->last_name}}</div>
<div><strong>Primary Email:</strong> {{$contact->primary_email}}</div>
<div><strong>Business Email:</strong> {{$contact->business_email}}</div>
<div><strong>Alternate Email:</strong> {{$contact->other_email}}</div>
<div><strong>Primary Phone:</strong> {{$contact->primary_phone}}</div>
<div><strong>Home Phone:</strong> {{$contact->home_phone}}</div>
<div><strong>Mobile Phone:</strong> {{$contact->mobile_phone}}</div>
<div><strong>Other Phone:</strong> {{$contact->other_phone}}</div>
