<div>
    <h1>Contacts</h1>
    @if (session('success'))
        {{ session('success') }}
    @endif
    <a href="{{ route('contacts.create') }}">Create Contact</a>
    <a href="{{ route('contacts.merge') }}">Merge Contacts</a>


    @if($contacts->count())
        {{ $contacts->links() }}
        <table>
            <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Primary Email</th>
                <th>Business Email</th>
                <th>Alternate Email</th>
                <th>Primary Phone</th>
                <th>Home Phone</th>
                <th>Mobile Phone</th>
                <th>Other Phone</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($contacts as $contact)
                <tr>
                    <td>{{$contact->first_name}}</td>
                    <td>{{$contact->last_name}}</td>
                    <td>{{$contact->primary_email}}</td>
                    <td>{{$contact->business_email}}</td>
                    <td>{{$contact->other_email}}</td>
                    <td>{{$contact->primary_phone}}</td>
                    <td>{{$contact->home_phone}}</td>
                    <td>{{$contact->mobile_phone}}</td>
                    <td>{{$contact->other_phone}}</td>

                    <td>{{date('F d, Y h:i:s', strtotime($contact->created_at))}}</td>
                    <td>{{date('F d, Y h:i:s', strtotime($contact->updated_at))}}</td>
                    <td>
                        <a href="{{ route('contacts.show', ['contact' => $contact->id]) }}">View</a>
                        <a href="{{ route('contacts.edit', ['contact' => $contact->id]) }}">Edit</a>
                        <a href="{{route('contacts.delete', ['contact' => $contact->id]) }}">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
</div>
