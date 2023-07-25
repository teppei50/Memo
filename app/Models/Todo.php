<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    /**
     * 状態定義
     */
    const STATUS = [
        1 => ['label' => '未着手', 'class' => 'label-not-started'],
        2 => ['label' => '着手中', 'class' => 'label-in-progress'],
        3 => ['label' => '完了', 'class' => 'label-completed'],
    ];

    /**
     * 状態のラベルを取得するアクセサ
     *
     * @return string
     */
    public function getStatusClassAttribute()
    {
        $status = $this->attributes['status'];

        if (isset(self::STATUS[$status]['class'])) {
            return self::STATUS[$status]['class'];
        }

        return '';
    }

    /**
     * 状態のラベルを取得するアクセサ
     *
     * @return string
     */
    public function getStatusLabelAttribute()
    {
        $status = $this->attributes['status'];

        if (isset(self::STATUS[$status]['label'])) {
            return self::STATUS[$status]['label'];
        }

        return '';
    }

    public function getFormattedDueDateAttribute()
    {
        // モデルの属性 'due_date' を取得
        $dueDate = $this->attributes['due_date'];

        // $dueDate が null の場合は空文字を返す
        if (is_null($dueDate)) {
            return '';
        }

        // Carbon インスタンスを作成してスラッシュ区切りの形式にフォーマットして返す
        return \Carbon\Carbon::parse($dueDate)->format('Y/m/d');
    }
}
