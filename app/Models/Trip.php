<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Trip extends Model
{
    use HasFactory;
    //一度に複数の属性に値を設定してデータをデータベースに保存する場合に設定するとセキュリティを向上させる
    protected $fillable = ['category_id', 'tripTitle', 'image_url', 'user_id'];

    //ステータス定数
    const PUBLISHED = 1;
    const DRAFT = 2;

    //１対多の多の場合リレーション
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    //下書きかどうかをチェックするメゾット
    // public function isDraft()
    // {
    //     return $this->status === self::DRAFT;
    // }

    // //公開されているかどうかをチェックするメゾット
    // public function isPublished()
    // {
    //     return $this -> status === self::PUBLISHED;
    // }

}
