<?php

namespace App\Imports;

use App\Models\Price;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToCollection;

class PriceImport implements ToCollection
{
    protected $airportCode;
    protected $operatorId;

    public function __construct($airportCode, $operatorId)
    {
        $this->airportCode = $airportCode;
        $this->operatorId = $operatorId;
    }

    public function collection(Collection $rows)
    {
        $carTypes = $rows[1];
        $carTypes = collect($carTypes)->filter(function ($item) {
            return $item !== null;
        })
            ->transform(function ($item) {
                return trim(preg_replace('/[\t\n\r\s]+/', ' ', $item));
            })
            ->values();

        $rows = $rows->slice(2);
        foreach ($rows as $row) {
            $postCode = $row[0];
            $row = collect($row)->filter(function ($item) {
                return $item !== null && is_numeric($item);
            })
                ->values()
                ->chunk(8);
            DB::transaction(function () use ($postCode, $carTypes, $row) {
                $pickUpPrices = $row[0];
                foreach ($pickUpPrices as $key => $value) {
                    $carType = Str::slug($carTypes[$key]);
                    Price::create([
                        'operator_id' => $this->operatorId,
                        'airport_code' => $this->airportCode,
                        'post_code' => $postCode,
                        'car_type' => $carType,
                        'value' => $value,
                        'direction' => 'pick_up'
                    ]);
                }
                $dropOffPrices = $row[1];
                foreach ($dropOffPrices as $key => $value) {
                    $carType = Str::slug($carTypes[$key]);
                    Price::create([
                        'operator_id' => $this->operatorId,
                        'airport_code' => $this->airportCode,
                        'post_code' => $postCode,
                        'car_type' => $carType,
                        'value' => $value,
                        'direction' => 'drop_off'
                    ]);
                }
            });
        }
    }
}
