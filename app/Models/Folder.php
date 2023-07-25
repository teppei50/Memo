<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

    // FolderモデルにTaskモデルとの1対多の関連を定義
    public function todos()
    {
        return $this->hasMany(Todo::class);
    }
}
