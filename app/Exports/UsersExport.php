<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class UsersExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return User::with('bahagian')->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama',
            'Email',
            'No. KP',
            'No. Kakitangan',
            'Phone',
            'Bahagian',
            'Status',
            'Tarikh Cipta',
            'Tarikh Kemaskini'
        ];
    }

    public function map($user): array
    {
        return [
            $user->id,
            $user->name,
            $user->email,
            $user->no_kp,
            $user->no_kakitangan,
            $user->phone,
            $user->bahagian->nama ?? 'Tiada',
            ucfirst($user->status),
            $user->created_at->format('d/m/Y H:i:s'),
            $user->updated_at->format('d/m/Y H:i:s')
        ];
    }
}
