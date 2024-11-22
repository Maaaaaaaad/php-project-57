<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

/**
 * App\Models\Task
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property int $status_id
 * @property int|null $assigned_to_id
 * @property int $created_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $creator
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Labels[] $labels
 * @property-read int|null $labels_count
 * @property-read \App\Models\Statuses $status
 * @property-read \App\Models\User|null $worker
 * @method static Task|null delete()
 * @method static Task|null gatStatusesName()
 * @method static Task|null getLabels()
 * @method static Task|null labels()
 * @method static \Illuminate\Database\Eloquent\Builder|Task find($value)
 * @method static Task|null findOrFail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task first()
 * @method static Task|null firstOrFail()
 * @method static \Illuminate\Database\Eloquent\Builder|Task newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Task newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Task query()
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereAssignedToId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereUpdatedAt($value)
 */
class Task extends Model
{
    use HasFactory;
    use Notifiable;

    protected $fillable = [
        'name',
        'description',
        'status_id',
        'created_by_id',
        'assigned_to_id'
    ];

    public function labels()
    {
        return $this->belongsToMany(Labels::class);
    }
    public function status()
    {
        return $this->belongsTo(Statuses::class);
    }

    public function gatStatusesName()
    {
        return $this->status->name;
    }

    public function getLabels()
    {
        return $this->labels->toArray();
    }
}
