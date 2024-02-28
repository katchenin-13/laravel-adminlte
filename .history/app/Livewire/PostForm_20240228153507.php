<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostForm extends Component
{
    use WithPagination;

    public $title;
    public $description;
    public $post_id;

    protected $rules = [
        'title' => 'required',
        'description' => 'required',
    ];

    public function storePost()
    {
        $this->validate();
        $post = Post::create([
            'title' => $this->title,
            'description' => $this->description
        ]);
        $this->reset();
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $this->post_id = $post->id;
        $this->title = $post->title;
        $this->description = $post->description;
    }

    public function update()
    {
        $post = Post::updateOrCreate(
            [
                'id'   => $this->post_id,
            ],
            [
                'title' => $this->title,
                'description' => $this->description
            ],

        );

        $this->reset();
    }

    public function destroy($id)
    {
        Post::destroy($id);
    }


    public function render()
    {
        return view('livewire.post-form', ['posts' => Post::latest()->paginate(10)]);
    }
}
