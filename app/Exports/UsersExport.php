<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersExport implements FromCollection
{
    public function collection()
    {
        return  User::where('email_verified_at','!=', null)->get(['name', 'email_majelis', 'wa_majelis']) ;
    }
}
