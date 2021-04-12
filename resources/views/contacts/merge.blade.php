<h1>Merge contacts</h1>
<p>Select two contacts to merge.</p>
<form action="{{ route('contacts.compare') }}" method="POST">
    @csrf
    @foreach ($contacts as $contact)
        <div>
            <input name="merge_list[]" type="checkbox" value="{{$contact->id}}">
            <div>{{$contact->first_name}}</div>
            <div>{{$contact->last_name}}</div>
            <div>{{$contact->primary_email}}</div>
            <div>{{$contact->business_email}}</div>
            <div>{{$contact->other_email}}</div>
            <div>{{$contact->primary_phone}}</div>
            <div>{{$contact->home_phone}}</div>
            <div>{{$contact->mobile_phone}}</div>
            <div>{{$contact->other_phone}}</div>
        </div>
        <hr>
    @endforeach
    <button>Merge</button>
</form>
