namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class PhotoCategory extends Model
{
    use HasFactory;

    public function photographs()
    {
        return $this->hasMany(Photograph::class, 'photo_category', 'id');
    }

    public function getPhotographsCountAttribute()
    {
        return $this->photographs()->count();
    }

    public function getUserPhotographsCountAttribute()
    {
        // Bypass upload count check
        return 0;
    }

    public function competitions()
    {
        return $this->belongsToMany(Competition::class, 'competition_category', 'category_id', 'competition_id');
    }

    public static function hasReachedMaxUploadLimit()
    {
        // Disable all upload limit checks
        return false;
    }
}
