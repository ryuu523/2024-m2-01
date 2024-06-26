<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dispatche extends Model
{
    protected $table = "dispatches";
    public $incrementing = false;
    protected $primaryKey = ['events_id', 'workers_id'];
    protected $fillable = ['events_id', 'workers_id', 'is_approval', "memo"];
    protected $dates = ["create_at", "update_at"];
    public function getKeyName()
    {
        return $this->primaryKey;
    }
    public static function find($ids, $columns = ['*'])
    {
        $instance = new static;

        // 確認: $instance->getKeyName()がarrayを返しているか
        $keyNames = $instance->getKeyName();

        // エラーが出ないようにデータチェック
        if (!is_array($keyNames)) {
            throw new \UnexpectedValueException('The primary key is expected to be an array.');
        }

        // 複合キーを使って where 条件を追加
        foreach ($keyNames as $key) {
            if (!isset($ids[$key])) {
                return null;
            }
        }

        return $instance->newQuery()->where($ids)->first($columns);
    }
}
