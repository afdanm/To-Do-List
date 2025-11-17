<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TodoList extends Model
{
    // Field yang boleh diisi saat create/update
    protected $fillable = ['name'];

    // Relasi: satu TodoList memiliki banyak Task
    public function tasks()
    {
        // hasMany berarti foreign key berada pada tabel tasks
        return $this->hasMany(Task::class);
    }
}
