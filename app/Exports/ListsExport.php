<?php

namespace App\Exports;

use App\Models\Post;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class ListsExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings():array{
        return[
            'Id',
            'Title',
            'Url',
            'Description',
            'Image',
            'Category_id',
            'Created_at',
        ];
    }
    public function collection()
    {
        return Post::all();
        //return collect(Post::all);
    }
}
