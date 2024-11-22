<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use phpDocumentor\Reflection\Types\Static_;

/**
 * App\Models\Label
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Task[] $tasks
 * @method static \Illuminate\Database\Eloquent\Builder|Labels first()
 * @method static Labels|null firstOrFail()
 * @method static Labels|null delete()
 * @method static Labels|null getTasks()
 * @method static \Illuminate\Database\Query\Builder exists()
 * @method static \Illuminate\Database\Eloquent\Builder|Labels newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Labels newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Labels pluck($valueFirst, $valueSecond)
 * @method static \Illuminate\Database\Eloquent\Builder|Labels query()
 * @method static \Illuminate\Database\Eloquent\Builder|Labels whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Labels whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Labels whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Labels whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Labels whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Labels whereUserId($value)
 */

class Labels extends Model
{
    use HasFactory;
    use Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description'
    ];


    public function tasks(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Task::class);
    }

    public function getTasks()
    {
        return $this->tasks()->exists();
    }
}
