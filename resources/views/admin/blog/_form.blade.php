{{-- Shared form fields for create/edit --}}

@if($errors->any())
<div class="bg-red-50 border border-red-200 text-red-700 rounded-xl px-5 py-3">
    <ul class="list-disc list-inside text-sm space-y-1">
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div>
    <label class="block text-sm font-bold text-stone-700 mb-2">Title *</label>
    <input type="text" name="title" value="{{ old('title', $blog->title ?? '') }}"
        class="w-full border border-stone-200 rounded-xl px-4 py-3 text-stone-900 focus:outline-none focus:border-amber-400 focus:ring-2 focus:ring-amber-100"
        placeholder="Article title..." required>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div>
        <label class="block text-sm font-bold text-stone-700 mb-2">Category *</label>
        <input type="text" name="category" value="{{ old('category', $blog->category ?? '') }}"
            class="w-full border border-stone-200 rounded-xl px-4 py-3 text-stone-900 focus:outline-none focus:border-amber-400 focus:ring-2 focus:ring-amber-100"
            placeholder="e.g. Health Benefits, Cooking Tips..." required>
    </div>
    <div class="flex items-center gap-3 pt-8">
        <input type="checkbox" name="is_published" id="is_published" value="1" {{ old('is_published',
            $blog->is_published ?? true) ? 'checked' : '' }}
        class="w-5 h-5 accent-amber-500 rounded">
        <label for="is_published" class="text-sm font-semibold text-stone-700">Published (visible on website)</label>
    </div>
</div>

<div>
    <label class="block text-sm font-bold text-stone-700 mb-2">Meta Title <span class="text-stone-400 font-normal">(for
            Google — max 60 chars)</span></label>
    <input type="text" name="meta_title" value="{{ old('meta_title', $blog->meta_title ?? '') }}"
        class="w-full border border-stone-200 rounded-xl px-4 py-3 text-stone-900 focus:outline-none focus:border-amber-400 focus:ring-2 focus:ring-amber-100"
        placeholder="SEO title (leave blank to use article title)">
</div>

<div>
    <label class="block text-sm font-bold text-stone-700 mb-2">Meta Description <span
            class="text-stone-400 font-normal">(for Google — max 160 chars)</span></label>
    <textarea name="meta_description" rows="2"
        class="w-full border border-stone-200 rounded-xl px-4 py-3 text-stone-900 focus:outline-none focus:border-amber-400 focus:ring-2 focus:ring-amber-100"
        placeholder="Short description shown in Google search results...">{{ old('meta_description', $blog->meta_description ?? '') }}</textarea>
</div>

<div>
    <label class="block text-sm font-bold text-stone-700 mb-2">Excerpt <span class="text-stone-400 font-normal">(shown
            on blog listing card)</span></label>
    <textarea name="excerpt" rows="2"
        class="w-full border border-stone-200 rounded-xl px-4 py-3 text-stone-900 focus:outline-none focus:border-amber-400 focus:ring-2 focus:ring-amber-100"
        placeholder="Short intro paragraph...">{{ old('excerpt', $blog->excerpt ?? '') }}</textarea>
</div>

<div>
    <label class="block text-sm font-bold text-stone-700 mb-2">Content * <span class="text-stone-400 font-normal">(HTML
            allowed — use &lt;h2&gt;, &lt;h3&gt;, &lt;p&gt;, &lt;ul&gt;, &lt;li&gt;, &lt;strong&gt;)</span></label>
    <textarea name="content" rows="20"
        class="w-full border border-stone-200 rounded-xl px-4 py-3 text-stone-900 focus:outline-none focus:border-amber-400 focus:ring-2 focus:ring-amber-100 font-mono text-sm"
        placeholder="Full article content in HTML..." required>{{ old('content', $blog->content ?? '') }}</textarea>
</div>