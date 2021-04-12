<?php

namespace App\Helpers;


use Illuminate\Support\Facades\DB;

class ContactHelper
{
    /**
     * Check for duplication in contacts db table.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Support\Collection
     */
    public static function checkDuplication($request)
    {
        $emails = [$request->primary_email, $request->business_email, $request->other_email];
        $phones = [$request->primary_phone, $request->home_phone, $request->mobile_phone, $request->other_phone];

        $strong_check = self::strongCheck($request->first_name, $request->last_name, $emails, $phones);

        if ($strong_check->count()) {
            return $strong_check;
        }

        $medium_check = self::mediumCheck($emails, $phones);

        if ($medium_check->count()) {
            return $medium_check;
        }

        $weak_check = self::weakCheck($emails, $phones);

        return $weak_check;
    }

    /**
     * Check to see if there's another contact with similar name AND
     * at least one similar email or phone.
     *
     * @param string $first_name
     * @param string $last_name
     * @param array $emails
     * @param array $phones
     * @return \Illuminate\Support\Collection
     */
    public static function strongCheck(string $first_name, string $last_name, array $emails, array $phones)
    {
        return DB::table('contacts')
            ->where('contacts.first_name', 'LIKE', "%$first_name%")
            ->where('contacts.last_name', 'LIKE', "%$last_name%")
            ->orWhere(function ($query) use ($emails) {
                $query->orWhere(function ($query) use ($emails) {
                    $query->whereIn('contacts.primary_email', $emails);
                });
                $query->orWhere(function ($query) use ($emails) {
                    $query->whereIn('contacts.business_email', $emails);
                });
                $query->orWhere(function ($query) use ($emails) {
                    $query->whereIn('contacts.other_email', $emails);
                });
            })
            ->orWhere(function ($query) use ($phones) {
                $query->orWhere(function ($query) use ($phones) {
                    $query->whereIn('contacts.primary_phone', $phones);
                });

                $query->orWhere(function ($query) use ($phones) {
                    $query->whereIn('contacts.home_phone', $phones);
                });

                $query->orWhere(function ($query) use ($phones) {
                    $query->whereIn('contacts.mobile_phone', $phones);
                });

                $query->orWhere(function ($query) use ($phones) {
                    $query->whereIn('contacts.other_phone', $phones);
                });
            })
            ->get();
    }

    /**
     * Check to see if there's another contact with at least one
     * similar email AND phone.
     *
     * @param array $emails
     * @param array $phones
     * @return \Illuminate\Support\Collection
     */
    public static function mediumCheck(array $emails, array $phones)
    {
        return DB::table('contacts')
            ->where(function ($query) use ($emails) {
                $query->orWhere(function ($query) use ($emails) {
                    $query->whereIn('contacts.primary_email', $emails);
                });
                $query->orWhere(function ($query) use ($emails) {
                    $query->whereIn('contacts.business_email', $emails);
                });
                $query->orWhere(function ($query) use ($emails) {
                    $query->whereIn('contacts.other_email', $emails);
                });
            })
            ->where(function ($query) use ($phones) {
                $query->orWhere(function ($query) use ($phones) {
                    $query->whereIn('contacts.primary_phone', $phones);
                });

                $query->orWhere(function ($query) use ($phones) {
                    $query->whereIn('contacts.home_phone', $phones);
                });

                $query->orWhere(function ($query) use ($phones) {
                    $query->whereIn('contacts.mobile_phone', $phones);
                });

                $query->orWhere(function ($query) use ($phones) {
                    $query->whereIn('contacts.other_phone', $phones);
                });
            })
            ->get();
    }

    /**
     * Check to see if there's another contact with any of
     * the same email/phone fields.
     *
     * @param array $emails
     * @param array $phones
     * @return \Illuminate\Support\Collection
     */
    public static function weakCheck(array $emails, array $phones)
    {
        return DB::table('contacts')
            ->orWhere(function ($query) use ($emails) {
                $query->whereIn('contacts.primary_email', $emails);
            })
            ->orWhere(function ($query) use ($emails) {
                $query->whereIn('contacts.business_email', $emails);
            })
            ->orWhere(function ($query) use ($emails) {
                $query->whereIn('contacts.other_email', $emails);
            })
            ->orWhere(function ($query) use ($phones) {
                $query->whereIn('contacts.primary_phone', $phones);
            })
            ->orWhere(function ($query) use ($phones) {
                $query->whereIn('contacts.home_phone', $phones);
            })
            ->orWhere(function ($query) use ($phones) {
                $query->whereIn('contacts.mobile_phone', $phones);
            })
            ->orWhere(function ($query) use ($phones) {
                $query->whereIn('contacts.other_phone', $phones);
            })
            ->get();
    }
}
