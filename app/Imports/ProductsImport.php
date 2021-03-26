<?php

namespace App\Imports;

use App\Models\Product;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class ProductsImport implements ToModel ,WithHeadingRow , WithChunkReading, ShouldQueue
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
            'name'          => $row['name'],
            'type_code'     => $row['type_code'],
            'description'   => $row['description'],
            'quantity'      => $row['quantity'],
            'price'         => $row['price'],
        ]);
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
