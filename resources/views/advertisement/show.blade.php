@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="mb-4">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('home') }}">Strona główna</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('category.show', $advertisement->category) }}">{{ $advertisement->category->name }}</a>
                    </li>
                    <li class="breadcrumb-item active">{{ $advertisement->title }}</li>
                </ol>
            </nav>

            <!-- Advertisement Details -->
            <div class="card">
                <div class="card-header">
                    <h1 class="h3 mb-0">{{ $advertisement->title }}</h1>
                </div>
                <div class="card-body">
                    @if($advertisement->main_image)
                        <img src="{{ $advertisement->main_image }}" class="img-fluid mb-3" style="max-height: 400px;">
                    @endif
                    
                    <div class="row">
                        <div class="col-md-8">
                            <h5>Opis:</h5>
                            <p>{{ $advertisement->description }}</p>
                        </div>
                        <div class="col-md-4">
                            <div class="bg-light p-3 rounded">
                                @if($advertisement->price)
                                    <h4 class="text-success">{{ number_format($advertisement->price, 2) }} {{ $advertisement->currency }}</h4>
                                @endif
                                <p><strong>Lokalizacja:</strong> {{ $advertisement->location }}</p>
                                <p><strong>Kategoria:</strong> {{ $advertisement->category->name }}</p>
                                <p><strong>Dodane:</strong> {{ $advertisement->created_at->diffForHumans() }}</p>
                                
                                <hr>
                                
                                <h6>Kontakt:</h6>
                                <p><strong>{{ $advertisement->contact_name }}</strong></p>
                                <p><i class="fas fa-envelope"></i> {{ $advertisement->contact_email }}</p>
                                @if($advertisement->contact_phone)
                                    <p><i class="fas fa-phone"></i> {{ $advertisement->contact_phone }}</p>
                                @endif
                                
                                <button class="btn btn-primary btn-lg w-100">
                                    <i class="fas fa-phone"></i> Pokaż telefon
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-4">
            <h5>Podobne ogłoszenia:</h5>
            @foreach($relatedAds as $ad)
                <div class="card mb-3">
                    <div class="card-body">
                        <h6 class="card-title">{{ Str::limit($ad->title, 40) }}</h6>
                        @if($ad->price)
                            <p class="card-text"><strong>{{ number_format($ad->price, 2) }} {{ $ad->currency }}</strong></p>
                        @endif
                        <a href="{{ route('advertisement.show', $ad) }}" class="btn btn-sm btn-outline-primary">Zobacz</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection