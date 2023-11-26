<?php

namespace App\Livewire\Posts;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Rule;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class Edit extends Component
{
    use WithFileUploads;

    public $postID;
    public $image;
    #[Rule("required", message: "Masukan Judul Post")]
    public $title;
    #[Rule("required", message: "Masukan Isi Post")]
    #[Rule("min:3", message: "Isi Post Minimal 3 Karakter")]
    public $content;

    public function mount($id)
    {
        $post = Post::find($id);
        
        $this->postID = $post->id;
        $this->title = $post->title;
        $this->content = $post->content;
    }

    public function update()
    {
        $this->validate();

        $post = Post::find($this->postID);

        if($this->image){
            $this->image->storeAs("public/posts", $this->image->hashName());

            Storage::delete("public/posts/".$post->image);

            $post->update([
                "image" => $this->image->hashName(),
                "title" => $this->title,
                "content" => $this->content,
            ]);
        }else{
            $post->update([
                "title" => $this->title,
                "content" => $this->content,
            ]);
        }

        session()->flash("message", "Data Berhasil Diupdate.");

        return redirect()->route("posts.index");
    }

    public function render()
    {
        return view('livewire.posts.edit')->layoutData([
            "title" => "Edit Post"
        ]);
    }
}
