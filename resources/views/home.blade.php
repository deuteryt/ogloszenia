@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <!-- Left Sidebar - Categories -->
        <div class="col-lg-3 col-md-4 mb-4">
            <div class="category-sidebar">
                <h5 class="mb-3">
                    <i class="fas fa-list"></i> Kategorie
                </h5>
                @foreach($categories as $category)
                    <div class="mb-2">
                        <a href="{{ route('category.show', $category) }}" class="category-link d-flex align-items-center">
                            @if($category->icon)
                                <i class="{{ $category->icon }} me-2"></i>
                            @endif
                            {{ $category->name }}
                            <span class="badge bg-secondary ms-auto">{{ $category->advertisements->count() }}</span>
                        </a>
                        @if($category->children->count() > 0)
                            <div class="ms-3">
                                @foreach($category->children as $child)
                                    <a href="{{ route('category.show', $child) }}" class="category-link d-block small">
                                        {{ $child->name }}
                                    </a>
                                @endforeach
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Center Content -->
        <div class="col-lg-6 col-md-8">
            <!-- Featured Ads -->
            @if($featuredAds->count() > 0)
                <section class="mb-4">
                    <h4 class="mb-3">
                        <i class="fas fa-star text-warning"></i> Promowane ogłoszenia
                    </h4>
                    <div class="row">
                        @foreach($featuredAds as $ad)
                            <div class="col-md-6 mb-3">
                                <div class="card ad-card h-100">
                                    @if($ad->main_image)
                                        <img src="{{ $ad->main_image }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                                    @endif
                                    <div class="card-body">
                                        <h6 class="card-title">{{ Str::limit($ad->title, 50) }}</h6>
                                        <p class="card-text small text-muted">{{ $ad->category->name }}</p>
                                        @if($ad->price)
                                            <p class="card-text"><strong>{{ number_format($ad->price, 2) }} {{ $ad->currency }}</strong></p>
                                        @endif
                                        <a href="{{ route('advertisement.show', $ad) }}" class="btn btn-primary btn-sm">Zobacz więcej</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </section>
            @endif

            <!-- Recent Ads -->
            <section>
                <h4 class="mb-3">
                    <i class="fas fa-clock"></i> Najnowsze ogłoszenia
                </h4>
                <div class="row">
                    @foreach($recentAds as $ad)
                        <div class="col-md-6 mb-3">
                            <div class="card ad-card h-100">
                                @if($ad->main_image)
                                    <img src="{{ $ad->main_image }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                                @endif
                                <div class="card-body">
                                    <h6 class="card-title">{{ Str::limit($ad->title, 50) }}</h6>
                                    <p class="card-text small text-muted">{{ $ad->category->name }}</p>
                                    @if($ad->price)
                                        <p class="card-text"><strong>{{ number_format($ad->price, 2) }} {{ $ad->currency }}</strong></p>
                                    @endif
                                    <p class="card-text"><small class="text-muted">{{ $ad->created_at->diffForHumans() }}</small></p>
                                    <a href="{{ route('advertisement.show', $ad) }}" class="btn btn-primary btn-sm">Zobacz więcej</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
        </div>

        <!-- Right Sidebar - Banners -->
        <div class="col-lg-3 d-none d-lg-block">
            @foreach($sidebarBanners as $banner)
                <div class="banner-sidebar">
                    @if($banner->link_url)
                        <a href="{{ $banner->link_url }}" target="_blank">
                    @endif
                    <img src="{{ $banner->image_url }}" alt="{{ $banner->title }}" class="img-fluid">
                    @if($banner->link_url)
                        </a>
                    @endif
                    @if($banner->description)
                        <p class="small text-muted mt-2">{{ $banner->description }}</p>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection