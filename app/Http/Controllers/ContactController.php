<?php

namespace App\Http\Controllers;

use App\Helpers\ContactHelper;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Show and manage all contacts.
        return view('contacts.index', ['contacts' => Contact::latest()->paginate(50)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Go to contact creation form.
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // This if will be triggered if we found potential duplicates and editor confirms that
        // the duplicates are not the same contact and want to proceed with creating a new contact.
        if ($request->new_contact) {
            // Use request->only() since we don't want to send in the "new_contact" value.
            $contact = Contact::create($request->only(
                'first_name',
                'last_name',
                'primary_email',
                'business_email',
                'other_email',
                'primary_phone',
                'home_phone',
                'mobile_phone',
                'other_phone'
            ));
            return redirect()->route('contacts.dashboard')->with('success', 'Contact created!');
        }
        else {
            // Check for duplicates.
            $potential_contacts = ContactHelper::checkDuplication($request);

            // If duplicates are found alert the editor.
            if ($potential_contacts->count()) {
                return redirect()->route('contacts.create')
                    ->with('alert', 'Alert: Potential duplicates.')
                    ->with('duplicates', $potential_contacts);
            }

            // If no duplicates are found, create the contact and return to the dashboard.
            Contact::create($request->all());
            return redirect()->route('contacts.dashboard')->with('success', 'Contact created!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     */
    public function show(Contact $contact)
    {
        // Show specific contact.
        return view('contacts.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     */
    public function edit(Contact $contact)
    {
        // Edit specific contact.
        return view('contacts.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $data = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'primary_email' => $request->primary_email,
            'business_email' => $request->business_email,
            'other_email' => $request->other_email,
            'primary_phone' => $request->primary_phone,
            'home_phone' => $request->home_phone,
            'mobile_phone' => $request->mobile_phone,
            'other_phone' => $request->other_phone,
        ];

        $contacts = DB::table('contacts')
            ->where('id', '=', $id)
            ->update($data);
        return redirect()->route('contacts.dashboard')->with('success', 'Contact updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        // Delete specific contact.
        $contacts = DB::table('contacts')
            ->where('id', '=', $id)
            ->delete();
        return redirect()->route('contacts.dashboard')->with('success', 'Contact deleted!');
    }

    /**
     * Merge two contacts.
     *
     * @param  int  $id
     * @param int $merge_id
     * @return \Illuminate\Http\Response
     */
    public function merge($id, $merge_id)
    {

    }
}
