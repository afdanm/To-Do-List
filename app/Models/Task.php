<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    // Field yang boleh diisi saat create/update
    protected $fillable = ['todo_list_id', 'name', 'is_done'];

    // Relasi: satu Task milik satu TodoList
    public function list()
    {
        // belongsTo berarti task memiliki foreign key: todo_list_id
        return $this->belongsTo(TodoList::class);
    }
}
