@extends('master')
@section('title', 'beranda')
@section('content')
<section id="dashboard-ecommerce">
    <div class="row match-height">
      <!-- Medal Card -->
      <div class="col-xl-4 col-md-6 col-12">
        <div class="card card-congratulation-medal">
          <div class="card-body">
            <h5>Congratulations 🎉 John!</h5>
            <p class="card-text font-small-3">You have won gold medal</p>
            <h3 class="mb-75 mt-2 pt-50">
              <a href="javascript:void(0);">$48.9k</a>
            </h3>
            <button type="button" class="btn btn-primary">View Sales</button>
            <img src="{{ asset('vuexy/vuexy/app-assets/images/illustration/badge.svg') }}" class="congratulation-medal" alt="Medal Pic" />
          </div>
        </div>
      </div>
</section>
      <!--/ Medal Card -->
@endsection
