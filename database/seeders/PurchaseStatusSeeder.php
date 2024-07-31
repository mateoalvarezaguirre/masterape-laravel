<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Src\Purchase\Domain\Enums\PurchaseStatusEnum;

class PurchaseStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (PurchaseStatusEnum::cases() as $case) {
            DB::table('purchase_statuses')->insert([
                'id'                   => $case->value,
                'purchase_status_name' => $case->name,
            ]);
        }
    }
}
