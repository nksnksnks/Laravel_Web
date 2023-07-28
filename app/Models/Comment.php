<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $timestamps = false;
    protected $fillable = ['product_id', 'customer_id', 'vote_star', 'comment_content'];
    protected $primaryKey = 'comment_id';
    protected $table = 'tbl_product_comments';
}
