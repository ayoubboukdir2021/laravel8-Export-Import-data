<?php

namespace App\Exports;

use App\Models\Product;
use Illuminate\Support\Facades\Date;
use Maatwebsite\Excel\Concerns\FromCollection ;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ProductsExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $products =  Product::all();
        return $products;
    }

    public function map($products): array
    {
        return [
            $products->name,
            $products->description,
            $products->quantity,
            $products->price,
            $products->type_code,
            $products->created_at->toDateString(),
        ];
    }

    public function headings(): array
    {
        return [
            'name',
            'description',
            'quantity',
            'price',
            'type code',
            'Date',
        ];
    }
}
