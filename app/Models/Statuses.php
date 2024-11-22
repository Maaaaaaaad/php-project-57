<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use TYPO3\CMS\Reports\Status;

/**
 * App\Models\Statuses
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Task[] $tasks
 * @property-read int|null $tasks_count
 * @property-read \App\Models\User $user
 * @method static Statuses|null delete()
 * @method static \Illuminate\Database\Eloquent\Builder|Statuses first()
 * @method static Statuses|null firstOrFail()
 * @method static \Illuminate\Database\Eloquent\Builder|Statuses newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Statuses newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Statuses pluck($valueFirst, $valueSecond)
 * @method static \Illuminate\Database\Eloquent\Builder|Statuses query()
 * @method static \Illuminate\Database\Eloquent\Builder|Statuses whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Statuses whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Statuses whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Statuses whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Statuses whereUserId($value)
 */
class Statuses extends Model
{
    use HasFactory;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name'
    ];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
