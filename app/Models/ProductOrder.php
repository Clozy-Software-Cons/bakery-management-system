<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductOrder extends Model
{
    use HasFactory;
    protected $table = "product_order";
    protected $primaryKey = "cust_id";
    protected $fillable = [
        'cust_name',
        'cust_hpn',
        'quantity',
        'type',
        'flavour',
        'filling',
        'shape',
        'size',
        'price',
        'order_datetime',
        'dispatch_datetime',
        'dispatch_place',
        'remark',
        'status'
    ];

    public static function get_records($search)
    {
        $query = ProductOrder::query();

        if (@$search['status']) {
            $query->where('status', $search['status']);
        } else {
            $query->where('status', 'pending');
        }

        $query->orderBy('order_datetime', 'desc');
        $result = $query->paginate(10);
        return $result;
    }
}
