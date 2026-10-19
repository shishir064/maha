<?php

namespace App\Livewire\SuperAdmin\Blogs;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public string $title = '';
    public string $slug = '';
    public string $excerpt = '';
    public string $content = '';
    public $featured_image = null;
    public $category_id = '';
    public string $status = 'draft';
    public $published_at = '';
    public bool $is_featured = false;

    public function updatedTitle(string $value): void
    {
        $this->slug = Str::slug($value);
    }

    public function save(): void
    {
        $this->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => [
                'required',
                'string',
                'max:255',
                'alpha_dash',
                Rule::unique('blogs', 'slug'),
            ],
            'excerpt' => ['nullable', 'string', 'max:500'],
            'content' => ['required', 'string'],
            'featured_image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],
            'category_id' => [
                'nullable',
                'integer',
                'exists:categories,id',
            ],
            'status' => ['required', Rule::in(['draft', 'published'])],
            'published_at' => ['nullable', 'date'],
            'is_featured' => ['boolean'],
        ]);

        $imagePath = null;

        if ($this->featured_image) {
            $imagePath = $this->featured_image->store('blogs', 'public');
        }

        Blog::create([
            'title' => $this->title,
            'slug' => $this->slug,
            'excerpt' => $this->excerpt ?: null,
            'content' => $this->content,
            'featured_image' => $imagePath,
            'category_id' => $this->category_id ?: null,
            'author_id' => Auth::id(),
            'status' => $this->status,
            'published_at' => $this->status === 'published'
                ? ($this->published_at ?: now())
                : null,
            'is_featured' => $this->is_featured,
        ]);

        session()->flash('success', 'Blog post created successfully!');

        $this->redirectRoute('super-admin.blogs.create');
    }

    public function render()
    {
        return view('livewire.super-admin.blogs.create', [
            'categories' => Category::orderBy('name')->get(),
        ]);
    }
}
