<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    //tất cả các mô hình Eloquent được bảo vệ chống lại các lỗ hổng phân công hàng loạt theo mặc định
    protected $fillable = [
        'name',
        'slug',
    ];
}