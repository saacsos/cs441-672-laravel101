<?php

namespace App\Repositories;

use App\Models\Playlist;
use App\Repositories\Traits\SimpleCRUD;
use Illuminate\Database\Eloquent\Collection;

class PlaylistRepository
{
    use SimpleCRUD;

    protected $model = Playlist::class;

    public function getByUserId($userId) : Collection
    {
        return $this->model::ofUser($userId)->get();
    }

    public function getPublicByUserId($userId) : Collection
    {
        return $this->model::ofUser($userId)->public()->get();
    }

    public function getPrivateByUserId($userId) : Collection
    {
        return $this->model::ofUser($userId)->private()->get();
    }

    public function filterByName(string $name) : Collection
    {
        return $this->model::where('name', 'LIKE', "%{$name}%")->get();
    }

}
