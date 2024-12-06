@extends('admin.layouts.mainlayout')

@section('content')

<div class="container-fluid py-2">
    <div class="row">
      <!-- Card for Number of Products -->
      <div class="col-lg-6 col-sm-6 mb-lg-0 mb-4">
        <div class="card">
          <div class="card-header d-flex justify-content-between p-3 pt-2">
            <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark text-center border-radius-lg">
              <i class="material-symbols-rounded opacity-10">inventory</i>
            </div>
            <div class="text-start pt-1">
              <p class="text-sm mb-0 text-capitalize">عدد المنتجات</p>
              <h4 class="mb-0">{{ $productCount }}</h4>
            </div>
          </div>
        </div>
      </div>

      <!-- Card for Number of Categories -->
      <div class="col-lg-6 col-sm-6 mb-lg-0 mb-4">
        <div class="card">
          <div class="card-header d-flex justify-content-between p-3 pt-2">
            <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark text-center border-radius-lg">
              <i class="material-symbols-rounded opacity-10">category</i>
            </div>
            <div class="text-start pt-1">
              <p class="text-sm mb-0 text-capitalize">عدد الفئات</p>
              <h4 class="mb-0">{{ $categoryCount }}</h4>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>

@endsection