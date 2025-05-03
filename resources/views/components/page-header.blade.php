<div class="page-header">
    <div class="header-content">
        <div class="breadcrumb">
            {{ $breadcrumb }}
        </div>
        <h1 class="page-title">{{ $title }}</h1>
        @if(isset($description))
            <p class="page-description">{{ $description }}</p>
        @endif
    </div>
    @if(isset($actions))
        <div class="header-actions">
            {{ $actions }}
        </div>
    @endif
</div>
