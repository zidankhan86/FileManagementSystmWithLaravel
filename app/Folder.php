<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\FilterByUser;

/**
 * Class Folder
 *
 * @package App
 * @property string $name
 * @property string $created_by
*/
class Folder extends Model
{
    use SoftDeletes, FilterByUser;

    protected $fillable = ['name', 'created_by_id'];
    
    

    /**
     * Set to null if empty
     * @param $input
     */
    public function setCreatedByIdAttribute($input)
    {
        $this->attributes['created_by_id'] = $input ? $input : null;
    }
    

    public function files()
    {
        return $this->hasMany(User::class, 'folder_id');
    }
    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }
    public function getNameWithUserAttribute()
    {
        return $this->name . ' - ' . $this->created_by->name;
    }
    
}
