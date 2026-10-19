
<div class="mx-auto max-w-6xl space-y-6">

    {{-- Header --}}
    <div class="flex flex-col justify-between gap-4 sm:flex-row sm:items-center">
        <div>
            <p class="mb-2 text-sm text-slate-500">
                Super Admin / Blogs / Create Blog
            </p>
            <h1 class="text-2xl font-bold text-slate-900">Create Blog Post</h1>
            <p class="mt-1 text-sm text-slate-500">
                Publish shopping tips, product guides, and store updates.
            </p>
        </div>
    </div>

    {{-- Form --}}
    <form wire:submit="save" class="space-y-6">
        <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">

            {{-- Main Form --}}
            <div class="space-y-6 lg:col-span-2">

                {{-- Blog Details --}}
                <section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
                    <div class="border-b border-slate-200 px-6 py-5">
                        <h2 class="font-semibold text-slate-900">Blog Information</h2>
                        <p class="mt-1 text-sm text-slate-500">
                            Enter the title and content for your article.
                        </p>
                    </div>

                    <div class="space-y-5 p-6">

                        {{-- Title --}}
                        <div>
                            <label for="title" class="mb-2 block text-sm font-medium text-slate-700">
                                Blog Title <span class="text-red-500">*</span>
                            </label>
                            <input
                                id="title"
                                type="text"
                                wire:model.live.debounce.400ms="title"
                                placeholder="e.g. How to Choose the Best Laptop"
                                class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm
                                       outline-none transition focus:border-indigo-500 focus:ring-4 focus:ring-indigo-50"
                            >
                            @error('title')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Slug --}}
                        <div>
                            <label for="slug" class="mb-2 block text-sm font-medium text-slate-700">
                                URL Slug <span class="text-red-500">*</span>
                            </label>
                            <div class="flex overflow-hidden rounded-xl border border-slate-300
                                        focus-within:border-indigo-500 focus-within:ring-4
                                        focus-within:ring-indigo-50">
                                <span class="flex items-center border-r border-slate-200 bg-slate-50
                                             px-3 text-sm text-slate-500">/blog/</span>
                                <input
                                    id="slug"
                                    type="text"
                                    wire:model="slug"
                                    placeholder="how-to-choose-the-best-laptop"
                                    class="min-w-0 flex-1 px-4 py-3 text-sm outline-none"
                                >
                            </div>
                            @error('slug')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Excerpt --}}
                        <div>
                            <label for="excerpt" class="mb-2 block text-sm font-medium text-slate-700">
                                Short Description
                            </label>
                            <textarea
                                id="excerpt"
                                wire:model="excerpt"
                                rows="3"
                                maxlength="500"
                                placeholder="Write a short summary of your article..."
                                class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm
                                       outline-none focus:border-indigo-500 focus:ring-4 focus:ring-indigo-50"
                            ></textarea>
                            <div class="mt-1 flex justify-between gap-3">
                                @error('excerpt')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                @else
                                    <span class="text-xs text-slate-400">Maximum 500 characters</span>
                                @enderror
                            </div>
                        </div>

                        {{-- Content --}}
                        <div>
                            <label for="content" class="mb-2 block text-sm font-medium text-slate-700">
                                Blog Content <span class="text-red-500">*</span>
                            </label>
                            <textarea
                                id="content"
                                wire:model="content"
                                rows="13"
                                placeholder="Write your complete blog article here..."
                                class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm
                                       leading-7 outline-none focus:border-indigo-500 focus:ring-4 focus:ring-indigo-50"
                            ></textarea>
                            @error('content')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            <p class="mt-2 text-xs text-slate-500">
                                Plain text content for now. A rich text editor can be added later.
                            </p>
                        </div>
                    </div>
                </section>

                {{-- Featured Image --}}
                <section class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                    <h2 class="font-semibold text-slate-900">Featured Image</h2>
                    <p class="mt-1 text-sm text-slate-500">
                        Upload a cover image for your blog article.
                    </p>

                    <label for="featured_image"
                           class="mt-5 flex cursor-pointer flex-col items-center justify-center rounded-xl
                                  border-2 border-dashed border-slate-300 bg-slate-50 px-5 py-8
                                  text-center transition hover:border-indigo-400 hover:bg-indigo-50/40">

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke-width="1.5" stroke="currentColor" class="mb-3 size-10 text-slate-400">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5m-13.5-3L12 6m0 0 4.5 7.5M12 6v12"/>
                        </svg>

                        <span class="text-sm font-semibold text-slate-700">
                            Click to select an image
                        </span>
                        <span class="mt-1 text-xs text-slate-500">
                            PNG, JPG or WEBP · Maximum 2 MB
                        </span>

                        <input
                            id="featured_image"
                            type="file"
                            wire:model="featured_image"
                            accept="image/png,image/jpeg,image/webp"
                            class="sr-only"
                        >
                    </label>

                    <div wire:loading wire:target="featured_image"
                         class="mt-3 text-sm text-indigo-600">
                        Uploading image...
                    </div>

                    @if ($featured_image)
                        <div class="mt-4">
                            <img src="{{ $featured_image->temporaryUrl() }}"
                                 alt="Featured image preview"
                                 class="max-h-64 w-full rounded-xl object-cover">
                            <p class="mt-2 text-sm text-slate-500">
                                {{ $featured_image->getClientOriginalName() }}
                            </p>
                        </div>
                    @endif

                    @error('featured_image')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </section>
            </div>

            {{-- Sidebar --}}
            <div class="space-y-6">

                {{-- Publish Settings --}}
                <section class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                    <h2 class="mb-5 font-semibold text-slate-900">Publish Settings</h2>

                    <div class="space-y-5">
                        <div>
                            <label for="status" class="mb-2 block text-sm font-medium text-slate-700">
                                Status <span class="text-red-500">*</span>
                            </label>
                            <select
                                id="status"
                                wire:model="status"
                                class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm
                                       outline-none focus:border-indigo-500 focus:ring-4 focus:ring-indigo-50"
                            >
                                <option value="draft">Draft</option>
                                <option value="published">Published</option>
                            </select>
                            @error('status')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="published_at" class="mb-2 block text-sm font-medium text-slate-700">
                                Publish Date
                            </label>
                            <input
                                id="published_at"
                                type="datetime-local"
                                wire:model="published_at"
                                class="w-full rounded-xl border border-slate-300 px-3 py-3 text-sm
                                       outline-none focus:border-indigo-500 focus:ring-4 focus:ring-indigo-50"
                            >
                            @error('published_at')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            <p class="mt-1 text-xs text-slate-500">
                                Leave blank to use the current time when publishing.
                            </p>
                        </div>

                        <div class="border-t border-slate-100 pt-5">
                            <label class="flex cursor-pointer items-start gap-3">
                                <input
                                    type="checkbox"
                                    wire:model="is_featured"
                                    class="mt-1 size-4 rounded border-slate-300 text-indigo-600 focus:ring-indigo-500"
                                >
                                <span>
                                    <span class="block text-sm font-medium text-slate-800">
                                        Featured Article
                                    </span>
                                    <span class="mt-1 block text-xs leading-5 text-slate-500">
                                        Highlight this post on your store.
                                    </span>
                                </span>
                            </label>
                        </div>
                    </div>
                </section>

                {{-- Category --}}
                <section class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                    <h2 class="mb-5 font-semibold text-slate-900">Category</h2>

                    <label for="category_id" class="mb-2 block text-sm font-medium text-slate-700">
                        Blog Category
                    </label>
                    <select
                        id="category_id"
                        wire:model="category_id"
                        class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm
                               outline-none focus:border-indigo-500 focus:ring-4 focus:ring-indigo-50"
                    >
                        <option value="">Select category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </section>

                {{-- Author --}}
                <section class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                    <h2 class="mb-4 font-semibold text-slate-900">Author</h2>

                    <div class="flex items-center gap-3">
                        <div class="flex size-11 items-center justify-center rounded-full bg-indigo-100
                                    font-bold text-indigo-700">
                            {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
                        </div>
                        <div class="min-w-0">
                            <p class="truncate text-sm font-semibold text-slate-800">
                                {{ auth()->user()->name ?? 'Administrator' }}
                            </p>
                            <p class="text-xs text-slate-500">Logged-in user</p>
                        </div>
                    </div>
                </section>
            </div>
        </div>

        {{-- Actions --}}
        <div class="sticky bottom-0 z-20 flex flex-col justify-between gap-3 rounded-2xl
                    border border-slate-200 bg-white/95 p-4 shadow-lg backdrop-blur sm:flex-row sm:items-center">
            <p class="text-sm text-slate-500">
                <span class="text-red-500">*</span> Required fields
            </p>

            <div class="flex flex-col-reverse gap-3 sm:flex-row">
                <a href="{{ url('/super-admin/blogs') }}"
                   wire:navigate
                   class="inline-flex items-center justify-center rounded-xl border border-slate-300
                          px-5 py-3 text-sm font-semibold text-slate-700 hover:bg-slate-50">
                    Cancel
                </a>

                <button
                    type="submit"
                    wire:loading.attr="disabled"
                    wire:target="save"
                    class="inline-flex items-center justify-center gap-2 rounded-xl bg-indigo-600
                           px-5 py-3 text-sm font-semibold text-white transition
                           hover:bg-indigo-700 disabled:cursor-not-allowed disabled:opacity-60"
                >
                    <svg wire:loading.remove wire:target="save"
                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke-width="1.8" stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M4.5 12.75 10.5 18 19.5 6"/>
                    </svg>
                    <svg wire:loading wire:target="save"
                         class="size-5 animate-spin" xmlns="http://www.w3.org/2000/svg"
                         fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10"
                                stroke="currentColor" stroke-width="4"/>
                        <path class="opacity-75" fill="currentColor"
                              d="M4 12a8 8 0 0 1 8-8v4a4 4 0 0 0-4 4H4z"/>
                    </svg>
                    <span wire:loading.remove wire:target="save">Create Blog Post</span>
                    <span wire:loading wire:target="save">Saving...</span>
                </button>
            </div>
        </div>
    </form>
</div>
