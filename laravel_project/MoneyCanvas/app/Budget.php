<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    //
    protected $table = 'budgets';

    protected static function boot() {
        parent::boot();

        static::deleting(function($budget) {
            $budget->category->delete(); // カテゴリを削除
        });
    }
    
    protected $fillable =
    [
        'user_id',
        'category_id',
        'amount',
        'month'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }
}
