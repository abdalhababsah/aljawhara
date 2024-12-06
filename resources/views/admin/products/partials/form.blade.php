<div class="mb-3">
    <label for="productName" class="form-label">اسم المنتج</label>
    <input type="text" class="form-control" id="productName" name="name_ar" value="{{ old('name_ar', $product->name_ar ?? '') }}" required>
</div>
<div class="mb-3">
    <label for="productDescription" class="form-label">وصف المنتج</label>
    <textarea class="form-control" id="productDescription" name="description_ar" rows="3">{{ old('description_ar', $product->description_ar ?? '') }}</textarea>
</div>
<div class="mb-3">
    <label for="productPrice" class="form-label">السعر</label>
    <input type="number" step="0.01" class="form-control" id="productPrice" name="price" value="{{ old('price', $product->price ?? '') }}" required>
</div>
<div class="mb-3">
    <label for="productCategory" class="form-label">الفئة</label>
    <select class="form-select" id="productCategory" name="category_id" required>
        <option value="" disabled {{ isset($product) ? '' : 'selected' }}>اختر الفئة</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}" {{ old('category_id', $product->category_id ?? '') == $category->id ? 'selected' : '' }}>
                {{ $category->name_ar }}
            </option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label for="productImage" class="form-label">الصورة</label>
    <input class="form-control" type="file" id="productImage" name="image">
    @if(isset($product) && $product->image)
        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name_ar }}" width="50" class="mt-2">
    @endif
</div>