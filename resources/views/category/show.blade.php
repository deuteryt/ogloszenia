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
                @foreach($categories as $cat)
                    <div class="mb-2">
                        <a href="{{ route('category.show', $cat) }}" 
                           class="category-link d-flex align-items-center {{ $cat->id == $category->id ? 'bg-primary text-white' : '' }}">
                            @if($cat->icon)
                                <i class="{{ $cat->icon }} me-2"></i>
                            @endif
                            {{ $cat->name }}
                            <span class="badge {{ $cat->id == $category->id ? 'bg-light text-dark' : 'bg-secondary' }} ms-auto">
                                {{ $cat->advertisements->count() }}
                            </span>
                        </a>
                        @if($cat->children->count() > 0)
                            <div class="ms-3">
                                @foreach($cat->children as $child)
                                    <a href="{{ route('category.show', $child) }}" 
                                       class="category-link d-block small {{ $child->id == $category->id ? 'bg-primary text-white' : '' }}">
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
            <!-- Category Header -->
            <div class="d-flex align-items-center mb-4">
                @if($category->icon)
                    <i class="{{ $category->icon }} me-2 text-primary" style="font-size: 2rem;"></i>
                @endif
                <div>
                    <h2 class="mb-0">{{ $category->name }}</h2>
                    @if($category->description)
                        <p class="text-muted mb-0">{{ $category->description }}</p>
                    @endif
                </div>
            </div>

            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="mb-4">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('home') }}">Strona główna</a>
                    </li>
                    @if($category->parent)
                        <li class="breadcrumb-item">
                            <a href="{{ route('category.show', $category->parent) }}">{{ $category->parent->name }}</a>
                        </li>
                    @endif
                    <li class="breadcrumb-item active">{{ $category->name }}</li>
                </ol>
            </nav>

            <!-- Filters -->
            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Szukaj w kategorii...">
                        <button class="btn btn-outline-secondary" type="button">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
                <div class="col-md-6">
                    <select class="form-select">
                        <option>Sortuj: Najnowsze</option>
                        <option>Sortuj: Najstarsze</option>
                        <option>Sortuj: Cena rosnąco</option>
                        <option>Sortuj: Cena malejąco</option>
                    </select>
                </div>
            </div>

            <!-- Results Count -->
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="mb-0">
                    Znaleziono {{ $advertisements->total() }} ogłoszeń
                </h5>
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-outline-secondary active">
                        <i class="fas fa-th"></i>
                    </button>
                    <button type="button" class="btn btn-outline-secondary">
                        <i class="fas fa-list"></i>
                    </button>
                </div>
            </div>

            <!-- Advertisements Grid -->
            @if($advertisements->count() > 0)
                <div class="row">
                    @foreach($advertisements as $ad)
                        <div class="col-md-6 mb-4">
                            <div class="card ad-card h-100">
                                @if($ad->is_featured)
                                    <div class="position-absolute top-0 start-0 m-2">
                                        <span class="badge bg-warning text-dark">
                                            <i class="fas fa-star"></i> Promowane
                                        </span>
                                    </div>
                                @endif
                                
                                @if($ad->main_image)
                                    <img src="{{ $ad->main_image }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                                @else
                                    <div class="card-img-top d-flex align-items-center justify-content-center bg-light" style="height: 200px;">
                                        <i class="fas fa-image fa-3x text-muted"></i>
                                    </div>
                                @endif
                                
                                <div class="card-body">
                                    <h6 class="card-title">
                                        <a href="{{ route('advertisement.show', $ad) }}" class="text-decoration-none">
                                            {{ Str::limit($ad->title, 50) }}
                                        </a>
                                    </h6>
                                    
                                    <p class="card-text small text-muted">
                                        <i class="fas fa-map-marker-alt"></i> {{ $ad->location }}
                                    </p>
                                    
                                    @if($ad->price)
                                        <p class="card-text">
                                            <strong class="text-success">{{ number_format($ad->price, 2) }} {{ $ad->currency }}</strong>
                                        </p>
                                    @endif
                                    
                                    <p class="card-text">
                                        <small class="text-muted">
                                            <i class="fas fa-clock"></i> {{ $ad->created_at->diffForHumans() }}
                                        </small>
                                    </p>
                                    
                                    <div class="d-flex justify-content-between align-items-center">
                                        <a href="{{ route('advertisement.show', $ad) }}" class="btn btn-primary btn-sm">
                                            Zobacz więcej
                                        </a>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-outline-secondary btn-sm">
                                                <i class="fas fa-heart"></i>
                                            </button>
                                            <button type="button" class="btn btn-outline-secondary btn-sm">
                                                <i class="fas fa-share"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-center">
                    {{ $advertisements->links() }}
                </div>
            @else
                <div class="text-center py-5">
                    <i class="fas fa-search fa-3x text-muted mb-3"></i>
                    <h4>Brak ogłoszeń w tej kategorii</h4>
                    <p class="text-muted">Sprawdź inne kategorie lub dodaj pierwsze ogłoszenie!</p>
                    <a href="{{ route('home') }}" class="btn btn-primary">
                        Wróć do strony głównej
                    </a>
                </div>
            @endif
        </div>

        <!-- Right Sidebar - Banners -->
        <div class="col-lg-3 d-none d-lg-block">
            <div class="banner-sidebar">
                <img src="https://via.placeholder.com/300x250/007bff/ffffff?text=Reklama+1" 
                     alt="Banner" class="img-fluid mb-3">
            </div>
            <div class="banner-sidebar">
                <img src="https://via.placeholder.com/300x250/28a745/ffffff?text=Reklama+2" 
                     alt="Banner" class="img-fluid mb-3">
            </div>
            <div class="banner-sidebar">
                <img src="https://via.placeholder.com/300x250/dc3545/ffffff?text=Reklama+3" 
                     alt="Banner" class="img-fluid">
            </div>
        </div>
    </div>
</div>
@endsection