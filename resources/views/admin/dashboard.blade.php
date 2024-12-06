@extends('admin.layouts.mainlayout')

@section('content')

<div class="container-fluid py-2">
    <div class="row">
      <div class="col-lg-3 col-sm-6 mb-lg-0 mb-4">
        <div class="card">
          <div class="card-header d-flex justify-content-between p-3 pt-2">
            <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark text-center border-radius-lg">
              <i class="material-symbols-rounded opacity-10">weekend</i>
            </div>
            <div class="text-start pt-1">
              <p class="text-sm mb-0 text-capitalize">أموال اليوم</p>
              <h4 class="mb-0">$53k</h4>
            </div>
          </div>

        </div>
      </div>
      <div class="col-lg-3 col-sm-6 mb-lg-0 mb-4">
        <div class="card">
          <div class="card-header d-flex justify-content-between p-3 pt-2">
            <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark text-center border-radius-lg">
              <i class="material-symbols-rounded opacity-10">leaderboard</i>
            </div>
            <div class="text-start pt-1">
              <p class="text-sm mb-0 text-capitalize">مستخدمو اليوم</p>
              <h4 class="mb-0">2,300</h4>
            </div>
          </div>

        </div>
      </div>
      <div class="col-lg-3 col-sm-6 mb-lg-0 mb-4">
        <div class="card">
          <div class="card-header d-flex justify-content-between p-3 pt-2">
            <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark text-center border-radius-lg">
              <i class="material-symbols-rounded opacity-10">store</i>
            </div>
            <div class="text-start pt-1">
              <p class="text-sm mb-0 text-capitalize">عملاء جدد</p>
              <h4 class="mb-0">
                <span class="text-danger text-sm font-weight-bolder ms-1">-2%</span>
                +3,462
              </h4>
            </div>
          </div>

        </div>
      </div>
      <div class="col-lg-3 col-sm-6">
        <div class="card">
          <div class="card-header d-flex justify-content-between p-3 pt-2">
            <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark text-center border-radius-lg">
              <i class="material-symbols-rounded opacity-10">weekend</i>
            </div>
            <div class="text-start pt-1">
              <p class="text-sm mb-0 text-capitalize">مبيعات</p>
              <h4 class="mb-0">$103,430</h4>
            </div>
          </div>

        </div>
      </div>
    </div>



  </div>


@endsection