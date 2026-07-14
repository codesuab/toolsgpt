@php
    $review = [
        [
            'rating' => '5',
            'message' => 'ToolsGPT replaced five different websites I used daily. The AI Writer alone pays for itself in time saved.',
            'user' => [
                'image' => '/media/placeholder.webp',
                'name' => 'Maya Chen',
                'title' => 'Content Lead, Lumen'
            ]
        ],
        [
            'rating' => '4',
            'message' => 'ToolsGPT replaced five different websites I used daily. The AI Writer alone pays for itself in time saved.',
            'user' => [
                'image' => '/media/placeholder.webp',
                'name' => 'Maya Chen',
                'title' => 'Content Lead, Lumen'
            ]
        ],
        [
            'rating' => '4',
            'message' => 'ToolsGPT replaced five different websites I used daily. The AI Writer alone pays for itself in time saved.',
            'user' => [
                'image' => '/media/placeholder.webp',
                'name' => 'Maya Chen',
                'title' => 'Content Lead, Lumen'
            ]
        ],
        [
            'rating' => '4',
            'message' => 'ToolsGPT replaced five different websites I used daily. The AI Writer alone pays for itself in time saved.',
            'user' => [
                'image' => '/media/placeholder.webp',
                'name' => 'Maya Chen',
                'title' => 'Content Lead, Lumen'
            ]
        ],
        [
            'rating' => '4',
            'message' => 'ToolsGPT replaced five different websites I used daily. The AI Writer alone pays for itself in time saved.',
            'user' => [
                'image' => '/media/placeholder.webp',
                'name' => 'Maya Chen',
                'title' => 'Content Lead, Lumen'
            ]
        ],
        [
            'rating' => '4',
            'message' => 'ToolsGPT replaced five different websites I used daily. The AI Writer alone pays for itself in time saved.',
            'user' => [
                'image' => '/media/placeholder.webp',
                'name' => 'Maya Chen',
                'title' => 'Content Lead, Lumen'
            ]
        ],
    ]
@endphp

<div class="w-full md:max-w-1/2 mb-10">
    <div
        class="inline-flex items-center gap-1.5 px-3 py-1 rounded-brand-card mb-1 bg-indigo-50 border border-indigo-100 text-[10px] font-bold text-brand-primary uppercase select-none">
        Testimonials
    </div>
    <h2 class="text-2xl sm:text-3xl font-space font-bold text-gradient-secondary">
        Loved by makers, builders & writers
    </h2>
    <p class="text-brand-muted text-sm leading-relaxed">
        Over 1.8 million people reach for ToolsGPT every month. Here's what a few of them say.
    </p>
</div>

<div class="columns-1 gap-3 sm:columns-2 lg:columns-3 [&>*]:mb-3">
    @foreach ($review as $r)
        <figure
            class="reveal break-inside-avoid rounded-brand-card bg-white p-6 ring-1 ring-brand-border transition-all duration-500 hover:-translate-y-1"
            data-delay="0">
            <div class="flex items-center gap-0.5 text-yellow-400">
                @for ($i = 1; $i <= 5; $i++)
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                        fill="{{ $i <= $r['rating'] ? 'currentColor' : 'none' }}" stroke="currentColor" stroke-width="2"
                        class="h-3.5 w-3.5">
                        <polygon
                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" />
                    </svg>
                @endfor
            </div>
            <blockquote class="mt-4 text-sm leading-relaxed text-brand-text">“{{ $r['message'] }}”</blockquote>
            <figcaption class="mt-5 flex items-center gap-3">
                <img src="{{ $r['user']['image'] }}" loading="lazy"
                    class="h-9 w-9 rounded-full object-cover ring-1 ring-brand-border">
                <div>
                    <div class="text-sm font-semibold text-brand-text">{{ $r['user']['name'] }}</div>
                    <div class="text-xs text-brand-muted">{{ $r['user']['title'] }}</div>
                </div>
            </figcaption>
        </figure>
    @endforeach
</div>