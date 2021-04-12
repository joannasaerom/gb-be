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
     */
    public function index()
    {
        // Show and manage all contacts.
        return view('contacts.index', ['contacts' => Contact::latest()->paginate(50)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        // Go to contact creation form.
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // This if will be triggered if we found potential duplicates and editor confirms that
        // the duplicates are not the same contact and want to proceed with creating a new contact.
        if ($request->new_contact) {
            // Use request->only() since we don't want to send in the "new_contact" value.
            Contact::create($request->only(
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
        } else {
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
     * @param \App\Models\Contact $contact
     */
    public function show(Contact $contact)
    {
        // Show specific contact.
        return view('contacts.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Contact $contact
     */
    public function edit(Contact $contact)
    {
        // Edit specific contact.
        return view('contacts.edit', compact('contact'));
    }

    /**
     * Update the specified contact.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
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

        DB::table('contacts')
            ->where('id', '=', $id)
            ->update($data);
        return redirect()->route('contacts.dashboard')->with('success', 'Contact updated!');
    }

    /**
     * Remove the specified contact from the database.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        // Delete specific contact.
        DB::table('contacts')
            ->where('id', '=', $id)
            ->delete();
        return redirect()->route('contacts.dashboard')->with('success', 'Contact deleted!');
    }

    /**
     * Return a view of contacts to select for merging.
     */
    public function mergeList()
    {
        return view('contacts.merge', ['contacts' => Contact::all()]);
    }

    /**
     *  Return a view with two contacts to compare for merging.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function compare(Request $request)
    {
        if (!$request->has('merge_list')) {
            return view('contacts.merge', ['contacts' => Contact::all()]);
        } else {
            $merge_list = $request->merge_list;
            return view('contacts.compare', [
                'contact1' => Contact::find($merge_list[0]),
                'contact2' => Contact::find($merge_list[1])
            ]);
        }
    }

    /**
     * Merge two contacts.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function mergeUpdate(Request $request)
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

        DB::table('contacts')
            ->where('id', '=', $request->master_id)
            ->update($data);

        // If the master id the editor selected is not contact1's id, then delete
        // contact1 since that's the 'secondary' account.
        if ($request->master_id !== $request->contact1) {
            DB::table('contacts')
                ->where('id', '=', $request->contact1)
                ->delete();
        } else {
            DB::table('contacts')
                ->where('id', '=', $request->contact2)
                ->delete();
        }
        return redirect()->route('contacts.dashboard')->with('success', 'Contact has been merged!');
    }
}
