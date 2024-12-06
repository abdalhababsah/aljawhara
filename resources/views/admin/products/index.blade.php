@extends('admin.layouts.mainlayout')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <!-- Card Header -->
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div id="banner" class="bg-gradient-dark px-3 shadow-dark border-radius-lg pt-4 pb-3 d-flex justify-content-between align-items-center">
                        <h6 class="text-white text-capitalize ps-3 mb-0">جدول المنتجات</h6>
                        <!-- Add Product Button -->
                        <button type="button" class="btn btn-success btn-sm me-3" data-bs-toggle="modal" data-bs-target="#createProductModal">
                            إضافة منتج
                        </button>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive">
                        <table class="table align-items-center">
                            <thead>
                                <tr>
                                    <th>الصورة</th>
                                    <th>اسم المنتج</th>
                                    <th>الوصف</th>
                                    <th>السعر</th>
                                    <th>الفئة</th>
                                    <th>الإجراءات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($products as $product)
                                    <tr>
                                        <td>
                                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name_ar }}" width="50">
                                        </td>
                                        <td>{{ $product->name_ar }}</td>
                                        <td>{{ $product->description_ar }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{ $product->category->name_ar }}</td>
                                        <td>
                                            <!-- Edit Button -->
                                            <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editProductModal-{{ $product->id }}">
                                                تعديل
                                            </button>
                                            <!-- Delete Form -->
                                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('هل أنت متأكد من حذف هذا المنتج؟');">حذف</button>
                                            </form>
                                        </td>
                                    </tr>

                                    <!-- Edit Product Modal -->
                                    <div class="modal fade" id="editProductModal-{{ $product->id }}" tabindex="-1" aria-labelledby="editProductModalLabel-{{ $product->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editProductModalLabel-{{ $product->id }}">تعديل المنتج</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="إغلاق"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- Form Fields -->
                                                        <div class="mb-3">
                                                            <label for="name_ar_{{ $product->id }}" class="form-label">اسم المنتج</label>
                                                            <input type="text" class="form-control" id="name_ar_{{ $product->id }}" name="name_ar" value="{{ $product->name_ar }}" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="description_ar_{{ $product->id }}" class="form-label">وصف المنتج</label>
                                                            <textarea class="form-control" id="description_ar_{{ $product->id }}" name="description_ar" rows="3">{{ $product->description_ar }}</textarea>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="price_{{ $product->id }}" class="form-label">السعر</label>
                                                            <input type="number" step="0.01" class="form-control" id="price_{{ $product->id }}" name="price" value="{{ $product->price }}" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="category_id_{{ $product->id }}" class="form-label">الفئة</label>
                                                            <select class="form-select" id="category_id_{{ $product->id }}" name="category_id" required>
                                                                <option value="" disabled>اختر الفئة</option>
                                                                @foreach ($categories as $category)
                                                                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                                                        {{ $category->name_ar }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="image_{{ $product->id }}" class="form-label">الصورة</label>
                                                            <input class="form-control" type="file" id="image_{{ $product->id }}" name="image">
                                                            @if ($product->image)
                                                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name_ar }}" width="50" class="mt-2">
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                                                        <button type="submit" class="btn btn-primary">حفظ التعديلات</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                @empty
                                    <tr>
                                        <td colspan="6">لا توجد منتجات حالياً.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <!-- Pagination Links -->
                    <div class="d-flex justify-content-center mt-3">
                        {{ $products->links('vendor.pagination.bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Product Modal -->
    <div class="modal fade" id="createProductModal" tabindex="-1" aria-labelledby="createProductModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createProductModalLabel">إضافة منتج جديد</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="إغلاق"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Form Fields -->
                        <div class="mb-3">
                            <label for="name_ar" class="form-label">اسم المنتج</label>
                            <input type="text" class="form-control" id="name_ar" name="name_ar" required>
                        </div>
                        <div class="mb-3">
                            <label for="description_ar" class="form-label">وصف المنتج</label>
                            <textarea class="form-control" id="description_ar" name="description_ar" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">السعر</label>
                            <input type="number" step="0.01" class="form-control" id="price" name="price" required>
                        </div>
                        <div class="mb-3">
                            <label for="category_id" class="form-label">الفئة</label>
                            <select class="form-select" id="category_id" name="category_id" required>
                                <option value="" disabled selected>اختر الفئة</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name_ar }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">الصورة</label>
                            <input class="form-control" type="file" id="image" name="image">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                        <button type="submit" class="btn btn-primary">حفظ المنتج</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection