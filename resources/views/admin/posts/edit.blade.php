@extends('layouts.admin')

@section('header_title', 'Edit Berita')

@section('content')
<div class="card">
    <h3 style="margin-top:0;">Ubah Berita / Artikel: {{ $post->title }}</h3>
    
    <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 8px; font-weight: bold;">Judul Berita</label>
            <input type="text" name="title" value="{{ old('title', $post->title) }}" required style="width: 100%; padding: 12px; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box;">
            @error('title')
                <span style="color: #ef4444; font-size: 14px;">{{ $message }}</span>
            @enderror
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
            <div>
                <label style="display: block; margin-bottom: 8px; font-weight: bold;">Kategori</label>
                <select name="category_id" required style="width: 100%; padding: 12px; border: 1px solid #d1d5db; border-radius: 6px;">
                    <option value="">-- Pilih Kategori --</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <span style="color: #ef4444; font-size: 14px;">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label style="display: block; margin-bottom: 8px; font-weight: bold;">Status</label>
                <select name="status" required style="width: 100%; padding: 12px; border: 1px solid #d1d5db; border-radius: 6px;">
                    <option value="draft" {{ old('status', $post->status) == 'draft' ? 'selected' : '' }}>Simpan sebagai Draft</option>
                    <option value="published" {{ old('status', $post->status) == 'published' ? 'selected' : '' }}>Terbitkan</option>
                </select>
                @error('status')
                    <span style="color: #ef4444; font-size: 14px;">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 8px; font-weight: bold;">Gambar Utama</label>
            @if($post->image)
                <div style="margin-bottom: 10px;">
                    <img src="{{ asset('storage/' . $post->image) }}" alt="Thumbnail" style="max-height: 150px; border-radius: 6px;">
                </div>
            @endif
            <input type="file" name="image" style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 6px; background: #f9fafb;">
            @error('image')
                <span style="color: #ef4444; font-size: 14px;">{{ $message }}</span>
            @enderror
            <br>
            <small style="color: #6b7280;">Kosongkan jika tidak ingin mengubah gambar. Format: JPG, PNG. Maks: 2MB.</small>
        </div>

        <div style="margin-bottom: 25px;">
            <label style="display: block; margin-bottom: 10px; font-weight: bold;">Pilih Tag</label>
            <div style="display: flex; flex-wrap: wrap; gap: 15px; background: #f9fafb; padding: 15px; border: 1px solid #d1d5db; border-radius: 6px;">
                @foreach($tags as $tag)
                    <div style="display: flex; align-items: center; gap: 5px;">
                        <input type="checkbox" name="tags[]" value="{{ $tag->id }}" id="tag-{{ $tag->id }}" {{ in_array($tag->id, old('tags', $post->tags->pluck('id')->toArray())) ? 'checked' : '' }}>
                        <label for="tag-{{ $tag->id }}" style="cursor: pointer; font-size: 14px;">{{ $tag->name }}</label>
                    </div>
                @endforeach
                @if($tags->count() == 0)
                    <span style="color: #6b7280; font-size: 14px;">Belum ada tag. Buat tag di menu Kategori Berita/Tag.</span>
                @endif
            </div>
            @error('tags')
                <span style="color: #ef4444; font-size: 14px;">{{ $message }}</span>
            @enderror
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 8px; font-weight: bold;">Isi Berita</label>
            <textarea name="content" required style="width: 100%; height: 400px; padding: 12px; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box;">{{ old('content', $post->content) }}</textarea>
            @error('content')
                <span style="color: #ef4444; font-size: 14px;">{{ $message }}</span>
            @enderror
        </div>

        <div style="display: flex; gap: 10px;">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Perbarui Berita
            </button>
            <a href="{{ route('admin.posts.index') }}" class="btn btn-outline">Batal</a>
        </div>
    </form>
</div>
@endsection
