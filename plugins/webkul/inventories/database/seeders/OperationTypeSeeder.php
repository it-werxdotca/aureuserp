<?php

namespace Webkul\Inventory\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Webkul\Inventory\Enums;
use Webkul\Security\Models\User;

class OperationTypeSeeder extends Seeder
{
    /**
     * Seed the application's database with currencies.
     */
    public function run(): void
    {
        $user = User::first();

        DB::table('inventories_operation_types')->delete();

        DB::table('inventories_operation_types')->insert([
            [
                'id'                      => 1,
                'sort'                    => 1,
                'name'                    => 'Receipts',
                'type'                    => Enums\OperationType::INCOMING,
                'sequence_code'           => 'IN',
                'reservation_method'      => Enums\ReservationMethod::AT_CONFIRM,
                'product_label_format'    => '2x7xprice',
                'lot_label_format'        => '4x12_lots',
                'package_label_to_print'  => 'pdf',
                'barcode'                 => 'WHIN',
                'create_backorder'        => Enums\CreateBackorder::ASK,
                'move_type'               => Enums\MoveType::DIRECT,
                'use_create_lots'         => true,
                'use_existing_lots'       => true,
                'print_label'             => false,
                'show_operations'         => false,
                'source_location_id'      => 4,
                'destination_location_id' => 12,
                'company_id'              => $user->default_company_id,
                'creator_id'              => $user->id,
                'deleted_at'              => null,
                'created_at'              => now(),
                'updated_at'              => now(),
            ], [
                'id'                      => 2,
                'sort'                    => 2,
                'name'                    => 'Delivery Orders',
                'type'                    => Enums\OperationType::OUTGOING,
                'sequence_code'           => 'OUT',
                'reservation_method'      => Enums\ReservationMethod::AT_CONFIRM,
                'product_label_format'    => '2x7xprice',
                'lot_label_format'        => '4x12_lots',
                'package_label_to_print'  => 'pdf',
                'barcode'                 => 'WHOUT',
                'create_backorder'        => Enums\CreateBackorder::ASK,
                'move_type'               => Enums\MoveType::DIRECT,
                'use_create_lots'         => true,
                'use_existing_lots'       => true,
                'print_label'             => true,
                'show_operations'         => false,
                'source_location_id'      => 12,
                'destination_location_id' => 5,
                'company_id'              => $user->default_company_id,
                'creator_id'              => $user->id,
                'deleted_at'              => null,
                'created_at'              => now(),
                'updated_at'              => now(),
            ], [
                'id'                      => 3,
                'sort'                    => 3,
                'name'                    => 'Pick',
                'type'                    => Enums\OperationType::INTERNAL,
                'sequence_code'           => 'PICK',
                'reservation_method'      => Enums\ReservationMethod::AT_CONFIRM,
                'product_label_format'    => '2x7xprice',
                'lot_label_format'        => '4x12_lots',
                'package_label_to_print'  => 'pdf',
                'barcode'                 => 'WHPICK',
                'create_backorder'        => Enums\CreateBackorder::ASK,
                'move_type'               => Enums\MoveType::DIRECT,
                'use_create_lots'         => true,
                'use_existing_lots'       => true,
                'print_label'             => false,
                'show_operations'         => false,
                'source_location_id'      => 12,
                'destination_location_id' => 16,
                'company_id'              => $user->default_company_id,
                'creator_id'              => $user->id,
                'deleted_at'              => now(),
                'created_at'              => now(),
                'updated_at'              => now(),
            ], [
                'id'                      => 4,
                'sort'                    => 4,
                'name'                    => 'Pack',
                'type'                    => Enums\OperationType::INTERNAL,
                'sequence_code'           => 'PACK',
                'reservation_method'      => Enums\ReservationMethod::AT_CONFIRM,
                'product_label_format'    => '2x7xprice',
                'lot_label_format'        => '4x12_lots',
                'package_label_to_print'  => 'pdf',
                'barcode'                 => 'WHPACK',
                'create_backorder'        => Enums\CreateBackorder::ASK,
                'move_type'               => Enums\MoveType::DIRECT,
                'use_create_lots'         => false,
                'use_existing_lots'       => true,
                'print_label'             => false,
                'show_operations'         => false,
                'source_location_id'      => 16,
                'destination_location_id' => 15,
                'company_id'              => $user->default_company_id,
                'creator_id'              => $user->id,
                'deleted_at'              => now(),
                'created_at'              => now(),
                'updated_at'              => now(),
            ], [
                'id'                      => 5,
                'sort'                    => 5,
                'name'                    => 'Quality Control',
                'type'                    => Enums\OperationType::INTERNAL,
                'sequence_code'           => 'QC',
                'reservation_method'      => Enums\ReservationMethod::AT_CONFIRM,
                'product_label_format'    => '2x7xprice',
                'lot_label_format'        => '4x12_lots',
                'package_label_to_print'  => 'pdf',
                'barcode'                 => 'WHQC',
                'create_backorder'        => Enums\CreateBackorder::ASK,
                'move_type'               => Enums\MoveType::DIRECT,
                'use_create_lots'         => false,
                'use_existing_lots'       => true,
                'print_label'             => false,
                'show_operations'         => false,
                'source_location_id'      => 13,
                'destination_location_id' => 14,
                'company_id'              => $user->default_company_id,
                'creator_id'              => $user->id,
                'deleted_at'              => now(),
                'created_at'              => now(),
                'updated_at'              => now(),
            ], [
                'id'                      => 6,
                'sort'                    => 6,
                'name'                    => 'Storage',
                'type'                    => Enums\OperationType::INTERNAL,
                'sequence_code'           => 'STOR',
                'reservation_method'      => Enums\ReservationMethod::AT_CONFIRM,
                'product_label_format'    => '2x7xprice',
                'lot_label_format'        => '4x12_lots',
                'package_label_to_print'  => 'pdf',
                'barcode'                 => 'WHSTOR',
                'create_backorder'        => Enums\CreateBackorder::ASK,
                'move_type'               => Enums\MoveType::DIRECT,
                'use_create_lots'         => false,
                'use_existing_lots'       => true,
                'print_label'             => false,
                'show_operations'         => false,
                'source_location_id'      => 14,
                'destination_location_id' => 12,
                'company_id'              => $user->default_company_id,
                'creator_id'              => $user->id,
                'deleted_at'              => now(),
                'created_at'              => now(),
                'updated_at'              => now(),
            ], [
                'id'                      => 7,
                'sort'                    => 7,
                'name'                    => 'Internal Transfers',
                'type'                    => Enums\OperationType::INTERNAL,
                'sequence_code'           => 'INT',
                'reservation_method'      => Enums\ReservationMethod::AT_CONFIRM,
                'product_label_format'    => '2x7xprice',
                'lot_label_format'        => '4x12_lots',
                'package_label_to_print'  => 'pdf',
                'barcode'                 => 'WHINT',
                'create_backorder'        => Enums\CreateBackorder::ASK,
                'move_type'               => Enums\MoveType::DIRECT,
                'use_create_lots'         => false,
                'use_existing_lots'       => true,
                'print_label'             => false,
                'show_operations'         => false,
                'source_location_id'      => 12,
                'destination_location_id' => 12,
                'company_id'              => $user->default_company_id,
                'creator_id'              => $user->id,
                'deleted_at'              => now(),
                'created_at'              => now(),
                'updated_at'              => now(),
            ], [
                'id'                      => 8,
                'sort'                    => 8,
                'name'                    => 'Cross Dock',
                'type'                    => Enums\OperationType::INTERNAL,
                'sequence_code'           => 'XD',
                'reservation_method'      => Enums\ReservationMethod::AT_CONFIRM,
                'product_label_format'    => '2x7xprice',
                'lot_label_format'        => '4x12_lots',
                'package_label_to_print'  => 'pdf',
                'barcode'                 => 'WHXD',
                'create_backorder'        => Enums\CreateBackorder::ASK,
                'move_type'               => Enums\MoveType::DIRECT,
                'use_create_lots'         => false,
                'use_existing_lots'       => true,
                'print_label'             => false,
                'show_operations'         => false,
                'source_location_id'      => 13,
                'destination_location_id' => 15,
                'company_id'              => $user->default_company_id,
                'creator_id'              => $user->id,
                'deleted_at'              => now(),
                'created_at'              => now(),
                'updated_at'              => now(),
            ], [
                'id'                      => 9,
                'sort'                    => 9,
                'name'                    => 'Dropship',
                'type'                    => Enums\OperationType::DROPSHIP,
                'sequence_code'           => 'DS',
                'reservation_method'      => Enums\ReservationMethod::AT_CONFIRM,
                'product_label_format'    => '2x7xprice',
                'lot_label_format'        => '4x12_lots',
                'package_label_to_print'  => 'pdf',
                'barcode'                 => 'DS',
                'create_backorder'        => Enums\CreateBackorder::ASK,
                'move_type'               => Enums\MoveType::DIRECT,
                'use_create_lots'         => true,
                'use_existing_lots'       => false,
                'print_label'             => false,
                'show_operations'         => false,
                'source_location_id'      => 4,
                'destination_location_id' => 5,
                'company_id'              => $user->default_company_id,
                'creator_id'              => $user->id,
                'deleted_at'              => now(),
                'created_at'              => now(),
                'updated_at'              => now(),
            ],
        ]);

        DB::table('inventories_operation_types')->where('id', 1)->update([
            'return_operation_type_id' => 2,
        ]);

        DB::table('inventories_operation_types')->where('id', 2)->update([
            'return_operation_type_id' => 1,
        ]);
    }
}
