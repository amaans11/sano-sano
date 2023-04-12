<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class UsersExport implements FromCollection, WithMapping, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return User::all();
    }

    public function map($user): array
    {
        return [
            $user->id,
            $user->name,
            $user->email,
            $user->data?->get('hurdle_process'),
            $user->data?->get('source_id'),
            $user->data?->get('age'),
            $user->data?->get('gender'),
            $user->data?->get('noOfAdults'),
            $user->data?->get('noOfKids'),
            implode('|', $user->data?->get('kidsAge') ?? []),
            implode('|', $user->data?->get('allergies') ?? []),
            implode('|', $user->data?->get('healthPriorities') ?? []),
        ];
    }

    public function headings(): array
    {
        return [
            '#',
            'Name',
            'Email',
            'Hurdle process',
            'Source id',
            'Age',
            'Gender',
            'No. Of Adults',
            'No. Of Kids',
            'Kids Age Range',
            'Allergies',
            'Health Priorities',
        ];
    }
}
