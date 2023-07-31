<?php

namespace App\Models;

use App\Models\Concerns\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory, SoftDeletes, HasUuid;

    protected $fillable = [
        'uuid',
        'name',
        'surname',
        'email',
        'avatar',
        'phone',
        'address',
        'province',
        'district',
        'deleted_at'
    ];

    protected $appends = ['src'];

    public static function search($search, $isDeleted)
    {
        $query = empty($search) ? static::query()
            : static::query()->where('name', 'like', '%'.$search.'%')
            ->orWhere('surname', 'like', '%'.$search.'%')
            ->orWhere('email', 'like', '%'.$search.'%');

        if ($isDeleted) {
            $query->withTrashed();
        }

        return $query;
    }

    public function getSrcAttribute() {
        return asset("storage/{$this->avatar}");
    }

    public function getRouteKeyName()
    {
        return 'uuid';
    }
}
