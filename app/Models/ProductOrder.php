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

    public static function types() {
        return [
            'Sponge' => 'Sponge',
            'Butter' => 'Butter',
            'Cupcake' => 'Cupcake',
            'Tart' => 'Tart',
            '20 Cupcake' => '20 Cupcake',
            '30 Cupcake' => '30 Cupcake',
            'Mousse' => 'Mousse',
            'Cheese' => '30 Cupcake',
            'Other' => 'Other',
        ];
    }

    public static function flavours() {
        return [
            'Original' => 'Original',
            'Chocolate' => 'Chocolate',
            'Matcha' => 'Matcha',
            'Dark Chocolate' => 'Dark Chocolate',
            'Red Velvet' => '20 Cupcake',
            'Other' => 'Other',
        ];
    }

    public static function fillings() {
        return [
            'Chocolate' => 'Chocolate',
            'Mocha' => 'Mocha',
            'Blueberry' => 'Blueberry',
            'Strawberry' => 'Strawberry',
            'Mango' => 'Mango',
            'Peach' => 'Peach',
            'Other' => 'Other',
        ];
    }

    public static function shapes() {
        return [
            'Round' => 'Round',
            'Square' => 'Square',
            'Rectangle' => 'Rectangle',
            'Heart' => 'Heart',
            'Other' => 'Other',
        ];
    }

    public static function sizes() {
        return [
            '6 inch' => '6 inch',
            '7 inch' => '7 inch',
            '8 inch' => '8 inch',
            '9 inch' => '9 inch',
            '10 inch' => '10 inch',
            '12 inch' => '12 inch',
        ];
    }

    public static function statuses() {
        return [
            'pending' => 'pending',
            'ready' => 'ready',
            'delivered' => 'delivered',
        ];
    }
}
