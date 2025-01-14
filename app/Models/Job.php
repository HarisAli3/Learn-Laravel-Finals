<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model {

    use HasFactory; /* So we can use Factory*/

    protected $table = 'job_listing';

    protected $fillable = ['title', 'salary', 'employer_id']; /*Only User can modify these data.*/

    /*
    fillable Alternative (If we want to disable this feature use below)
    protected $guarded = [];
    */
    public function employer(){

        return $this->belongsTo(Employer::class);
    }

/*    public static function all(): array {
        return [
            [
                'id' => '1',
                'title' => 'Directory',
                'salary' => '$50,000'
            ],
            [
                'id' => '2',
                'title' => 'Programmer',
                'salary' => '$10,000'
            ]
        ];
    }

    public static function find(int $id): array|null {
        // Use `Arr::first` to locate the job by id
        return Arr::first(static::all(), fn($job) => intval($job['id']) === $id);
    }*/
}
