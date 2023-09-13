<?php

namespace App\Imports;

use App\Models\PostCode;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class PostCodeImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        $rows = $rows->slice(2);
        $postCodes = [];
        foreach ($rows as $row) {
            $postCodes[] = $row[0];
        }
        $postCodes = collect($postCodes)->unique();
        foreach ($postCodes as $postCode) {
            PostCode::create(['code' => $postCode]);
        }
    }
}
