@extends('admin.layouts.mainlayout')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
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
        <div class="col-12">
            <div class="card mb-4">
                <!-- Card Header -->
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div id="banner" class="bg-gradient-dark px-3 shadow-dark border-radius-lg pt-4 pb-3 d-flex justify-content-between align-items-center">
                        <h6 class="text-white text-capitalize ps-3 mb-0">جدول الفئات</h6>
                        <!-- Add Category Button -->
                        <button type="button" class="btn btn-success btn-sm me-3" data-bs-toggle="modal" data-bs-target="#createCategoryModal">
                            إضافة فئة
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
                                    <th>اسم الفئة</th>
                                    <th>الوصف</th>
                                    <th>الإجراءات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($categories as $category)
                                    <tr>
                                        <td>
                                            @if ($category->image)
                                                <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name_ar }}" width="50">
                                            @else
                                                <span>لا توجد صورة</span>
                                            @endif
                                        </td>
                                        <td>{{ $category->name_ar }}</td>
                                        <td>{{ $category->description_ar }}</td>
                                        <td>
                                            <!-- Edit Button -->
                                            <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editCategoryModal-{{ $category->id }}">
                                                تعديل
                                            </button>
                                            <!-- Delete Form -->
                                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('هل أنت متأكد من حذف هذه الفئة؟');">حذف</button>
                                            </form>
                                        </td>
                                    </tr>

                                    <!-- Edit Category Modal -->
                                    <div class="modal fade" id="editCategoryModal-{{ $category->id }}" tabindex="-1" aria-labelledby="editCategoryModalLabel-{{ $category->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editCategoryModalLabel-{{ $category->id }}">تعديل الفئة</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="إغلاق"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- Form Fields -->
                                                        <div class="mb-3">
                                                            <label for="name_ar_{{ $category->id }}" class="form-label">اسم الفئة</label>
                                                            <input type="text" class="form-control" id="name_ar_{{ $category->id }}" name="name_ar" value="{{ $category->name_ar }}" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="description_ar_{{ $category->id }}" class="form-label">وصف الفئة</label>
                                                            <textarea class="form-control" id="description_ar_{{ $category->id }}" name="description_ar" rows="3">{{ $category->description_ar }}</textarea>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="image_{{ $category->id }}" class="form-label">الصورة</label>
                                                            <input class="form-control" type="file" id="image_{{ $category->id }}" name="image">
                                                            @if ($category->image)
                                                                <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name_ar }}" width="50" class="mt-2">
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
                                        <td colspan="4">لا توجد فئات حالياً.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <!-- Pagination Links -->
                    <div class="d-flex justify-content-center mt-3">
                        {{ $categories->links('vendor.pagination.bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Category Modal -->
    <div class="modal fade" id="createCategoryModal" tabindex="-1" aria-labelledby="createCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createCategoryModalLabel">إضافة فئة جديدة</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="إغلاق"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Form Fields -->
                        <div class="mb-3">
                            <label for="name_ar" class="form-label">اسم الفئة</label>
                            <input type="text" class="form-control" id="name_ar" name="name_ar" required>
                        </div>
                        <div class="mb-3">
                            <label for="description_ar" class="form-label">وصف الفئة</label>
                            <textarea class="form-control" id="description_ar" name="description_ar" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">الصورة</label>
                            <input class="form-control" type="file" id="image" name="image">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                        <button type="submit" class="btn btn-primary">حفظ الفئة</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<style>
    /* Flash Messages Container */
#flash-message-container {
    position: fixed;
    top: 20px;
    right: 20px;
    width: 300px;
    z-index: 1050; /* Ensure it appears above other content */
}

/* Common Styles for All Flash Messages */
.flash-message {
    padding: 15px;
    margin-bottom: 10px;
    border-radius: 5px;
    color: #ffffff;
    opacity: 0.9;
    box-shadow: 0 2px 5px rgba(0,0,0,0.3);
    transition: opacity 0.5s ease, transform 0.5s ease;
}

/* Success Message */
#flash-success {
    background-color: #28a745; /* Green */
}

/* Error Message */
#flash-error {
    background-color: #dc3545; /* Red */
}

/* Optional: Hide the flash message after a certain time */
.flash-message.fade-out {
    opacity: 0;
    transform: translateY(-20px);
}

/* Trigger fade-out animation */
@keyframes fadeOut {
    to {
        opacity: 0;
        transform: translateY(-20px);
    }
}

/* Pagination Container */
.pagination-container {
    display: flex;
    justify-content: center;
    margin-top: 20px;
}

/* Custom Pagination Styles */
.custom-pagination {
    display: flex;
    list-style: none;
    padding: 0;
}

.custom-pagination li {
    margin: 0 5px;
}

.custom-pagination li a, .custom-pagination li span {
    display: block;
    padding: 8px 12px;
    border-radius: 4px;
    background-color: #f1f1f1;
    color: #333333;
    text-decoration: none;
    transition: background-color 0.3s ease;
}

.custom-pagination li a:hover {
    background-color: #dddddd;
}

.custom-pagination .active span {
    background-color: #007bff;
    color: #ffffff;
}

.custom-pagination .disabled span {
    background-color: #e9ecef;
    color: #6c757d;
}

/* Example Button Styles */
.btn-success {
    background-color: #28a745;
    color: #ffffff;
    border: none;
    padding: 8px 12px;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.btn-success:hover {
    background-color: #218838;
}

.btn-warning {
    background-color: #ffc107;
    color: #212529;
    border: none;
    padding: 8px 12px;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.btn-warning:hover {
    background-color: #e0a800;
}

.btn-danger {
    background-color: #dc3545;
    color: #ffffff;
    border: none;
    padding: 8px 12px;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.btn-danger:hover {
    background-color: #c82333;
}

.btn-secondary {
    background-color: #6c757d;
    color: #ffffff;
    border: none;
    padding: 8px 12px;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.btn-secondary:hover {
    background-color: #5a6268;
}

.btn-primary {
    background-color: #007bff;
    color: #ffffff;
    border: none;
    padding: 8px 12px;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.btn-primary:hover {
    background-color: #0069d9;
}
</style>
@endsection