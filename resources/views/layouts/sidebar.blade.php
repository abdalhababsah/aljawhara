<!-- resources/views/layouts/sidebar.blade.php -->

<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-radius-lg fixed-end me-2 rotate-caret bg-white my-2"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-dark opacity-5 position-absolute start-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand px-4 py-3 m-0" href="#" target="_blank">
            
            <span class="me-1 text-sm text-dark">جوهرة الشرق</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0 mb-2">
    <div class="collapse navbar-collapse px-0 w-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <!-- Retrieve the current category_id -->
            @php
                $currentCategoryId = request()->input('category_id');
            @endphp

            <!-- All Categories Link -->
            <li class="nav-item">
                <a class="nav-link text-dark {{ is_null($currentCategoryId) ? 'active' : '' }}"
                    href="{{ route('home') }}">
                    <i class="material-symbols-rounded opacity-10">category</i>
                    <span class="nav-link-text me-1">
                        جميع الأصناف
                    </span>
                </a>
            </li>

            <!-- Loop through categories -->
            @if (isset($navcategories) && $navcategories->count() > 0)
                @foreach ($navcategories as $category)
                    <li class="nav-item">
                        <a class="nav-link text-dark {{ $currentCategoryId == $category->id ? 'bg-gradient-dark text-white' : '' }}"
                            href="{{ route('home', ['category_id' => $category->id]) }}">
                            <img src="{{ $category->image ? asset('storage/' . $category->image) : asset('assets/img/default-category-icon.png') }}"
                                alt="{{ $category->name_ar }}" class="category-icon me-2"
                                style="width: 20px; height: 20px; object-fit: cover; border-radius: 50%;">
                            <span class="nav-link-text me-1">
                                {{ $category->name_ar }}
                            </span>
                        </a>
                    </li>
                @endforeach
            @else
                <li class="nav-item">
                    <span class="nav-link text-dark">لا توجد فئات متاحة</span>
                </li>
            @endif
   
        </ul>
    </div>
</aside>
