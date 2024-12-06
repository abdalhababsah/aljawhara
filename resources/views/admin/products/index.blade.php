@extends('admin.layouts.mainlayout')

@section('content')
    <style>
        /* Flash Messages Container */
        #flash-message-container {
            position: fixed;
            top: 20px;
            right: 20px;
            width: 300px;
            z-index: 1050;
        }

        .flash-message {
            padding: 15px;
            margin-bottom: 10px;
            border-radius: 5px;
            color: #ffffff;
            opacity: 0.9;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
            transition: opacity 0.5s ease, transform 0.5s ease;
        }

        #flash-success {
            background-color: #28a745;
        }

        #flash-error {
            background-color: #dc3545;
        }

        .modal {
            z-index: 1060 !important;
        }

        .modal-backdrop {
            z-index: 1050 !important;
        }

        .pagination-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        .btn-warning:hover {
            background-color: #e0a800;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }

        .btn-primary:hover {
            background-color: #0069d9;
        }
    </style>
    <div class="container-fluid py-4">
        <!-- Flash Messages -->
        <div id="flash-message-container">
            @if (session('success'))
                <div id="flash-success" class="flash-message">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div id="flash-error" class="flash-message">
                    {{ session('error') }}
                </div>
            @endif

            @if ($errors->any())
                <div id="flash-error" class="flash-message">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        <!-- Products Table -->
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-dark px-3 shadow-dark border-radius-lg pt-4 pb-3 d-flex justify-content-between align-items-center">
                            <h6 class="text-white text-capitalize ps-3 mb-0">جدول المنتجات</h6>
                            <button type="button" class="btn btn-success btn-sm me-3" data-bs-toggle="modal"
                                data-bs-target="#createProductModal">
                                إضافة منتج
                            </button>
                        </div>
                    </div>
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
                                                <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                                    data-bs-target="#editProductModal"
                                                    onclick="populateEditModal({{ $product }}, '{{ route('admin.products.update', $product->id) }}')">
                                                    تعديل
                                                </button>
                                                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger"
                                                        onclick="return confirm('هل أنت متأكد من حذف هذا المنتج؟');">حذف</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6">لا توجد منتجات حالياً.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-center mt-3">
                            {{ $products->links('vendor.pagination.bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Create Product Modal -->
        <div class="modal fade" id="createProductModal" tabindex="-1" aria-labelledby="createProductModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="createProductModalLabel">إضافة منتج جديد</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="إغلاق"></button>
                        </div>
                        <div class="modal-body">
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

        <!-- Edit Product Modal -->
        <div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form id="editProductForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editProductModalLabel">تعديل المنتج</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="إغلاق"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="editNameAr" class="form-label">اسم المنتج</label>
                                <input type="text" class="form-control" id="editNameAr" name="name_ar" required>
                            </div>
                            <div class="mb-3">
                                <label for="editDescriptionAr" class="form-label">وصف المنتج</label>
                                <textarea class="form-control" id="editDescriptionAr" name="description_ar" rows="3" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="editPrice" class="form-label">السعر</label>
                                <input type="number" step="0.01" class="form-control" id="editPrice" name="price" required>
                            </div>
                            <div class="mb-3">
                                <label for="editCategoryId" class="form-label">الفئة</label>
                                <select class="form-select" id="editCategoryId" name="category_id" required>
                                    <option value="" disabled>اختر الفئة</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name_ar }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="editImage" class="form-label">الصورة</label>
                                <input class="form-control" type="file" id="editImage" name="image">
                                <img id="editImagePreview" src="" alt="Product Image" width="50" class="mt-2">
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
    </div>

    <script>
        function populateEditModal(product, actionUrl) {
            document.getElementById('editProductForm').action = actionUrl;
            document.getElementById('editNameAr').value = product.name_ar;
            document.getElementById('editDescriptionAr').value = product.description_ar;
            document.getElementById('editPrice').value = product.price;
            document.getElementById('editCategoryId').value = product.category_id;

            const imagePreview = document.getElementById('editImagePreview');
            if (product.image) {
                imagePreview.src = `/storage/${product.image}`;
                imagePreview.style.display = 'block';
            } else {
                imagePreview.style.display = 'none';
            }
        }
    </script>
@endsection