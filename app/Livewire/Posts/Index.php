<?php

namespace App\Livewire\Posts;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Post;

class Index extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.posts.index', [
            "posts" => Post::latest()->paginate(5)
        ])->layoutData([
            "title" => "Data Posts"
        ]);
    }
}
