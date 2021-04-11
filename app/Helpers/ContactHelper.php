<?php

namespace App\Helpers;


use Illuminate\Support\Facades\DB;

class ContactHelper {
    /**
     * Check for duplication in contacts db table.
     *
     * @param \Illuminate\Http\Request $requests
     */
    public static function checkDuplication($request) {
        $emails = [$request->primary_email, $request->business_email,  $request->other_email];
        $phones = [$request->primary_phone, $request->home_phone, $request->mobile_phone, $request->other_phone];

        return DB::table('contacts')
            ->where('contacts.first_name', 'LIKE', "%$request->first_name%")
            ->where('contacts.last_name', 'LIKE', "%$request->last_name%")
            ->orWhere(function($query) use ($emails) {
                $query->where('contacts.primary_email', 'IN', $emails);
            })
            ->orWhere(function($query) use ($emails) {
                $query->where('contacts.business_email', 'IN', $emails);
            })
            ->orWhere(function($query) use ($emails) {
                $query->where('contacts.other_email', 'IN', $emails);
            })
            ->orWhere(function($query) use ($phones) {
                $query->where('contacts.primary_phone', 'IN', $phones);
            })
            ->orWhere(function($query) use ($phones) {
                $query->where('contacts.home_phone', 'IN', $phones);
            })
            ->orWhere(function($query) use ($phones) {
                $query->where('contacts.mobile_phone', 'IN', $phones);
            })
            ->orWhere(function($query) use ($phones) {
                $query->where('contacts.other_phone', 'IN', $phones);
            })
            ->get();
    }
}
