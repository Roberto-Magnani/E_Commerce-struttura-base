<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

class CreateArticleForm extends Component
{
    #[Validate('required | min:5')]
    public $title;

    #[Validate('required | min:10')]    
    public $description;
    #[Validate('required | numeric')]
    public $price;
    #[Validate('required')]
    public $category;
    public $article;
    
    protected function messages() 
    {
        return [
            'content.required' => 'The :attribute are missing.',
            'content.min' => 'The :attribute is too short.',
        ];
    }
    public function save()
    {
        $this->validate();

        $this->article = Article::create([
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'category_id' => $this->category,   
            'user_id' => Auth::id()
        ]);

        session()->flash('success', 'Article created successfully.');

        $this->reset();
    }

    public function render()
    {
        return view('livewire.create-article-form');
    }
}
