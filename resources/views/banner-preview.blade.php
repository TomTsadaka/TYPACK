<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banner Preview - {{ $banner->title ?? 'Untitled' }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=sora:300,400,500,600,700&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Sora', 'ui-sans-serif', 'system-ui', 'sans-serif'],
                    },
                    boxShadow: {
                        'store': '0 1px 3px 0 rgb(0 0 0 / 0.04), 0 1px 2px -1px rgb(0 0 0 / 0.02)',
                        'store-lg': '0 12px 32px -8px rgb(0 0 0 / 0.1), 0 4px 12px -4px rgb(0 0 0 / 0.04)',
                        'store-xl': '0 24px 48px -12px rgb(0 0 0 / 0.12)',
                    },
                    borderRadius: {
                        'store': '0.5rem',
                        'store-lg': '0.75rem',
                        'store-xl': '1rem',
                    },
                    colors: {
                        calm: {
                            primary: '#0f766e',
                            'primary-hover': '#0d9488',
                            background: '#fafaf9',
                            surface: '#f5f5f4',
                            card: '#ffffff',
                            charcoal: '#1c1917',
                            muted: '#78716c',
                            border: '#e7e5e4',
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-[#fafaf9] font-sans antialiased">
    <div class="min-h-screen p-4">
        <!-- Header -->
        <div class="bg-white shadow-store rounded-store-lg border border-[#e7e5e4] mb-6 p-4">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-[#1c1917] tracking-tight">Banner Preview</h1>
                    <p class="text-[#78716c] mt-1 text-sm">This is how your banner will appear on the frontend</p>
                </div>
                <div class="flex space-x-2">
                    @if($banner->link_url)
                        <a href="{{ $banner->link_url }}" target="_blank" class="inline-flex items-center px-4 py-2 bg-[#0f766e] text-white rounded-store hover:bg-[#0d9488]">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                            </svg>
                            Open Link
                        </a>
                    @endif
                    <button onclick="window.close()" class="inline-flex items-center px-4 py-2 bg-[#78716c] text-white rounded-store hover:bg-[#475569]">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                        Close
                    </button>
                </div>
            </div>
        </div>

        <!-- Banner Preview -->
        <div class="bg-white shadow-store-lg rounded-store-lg border border-[#e7e5e4] overflow-hidden">
            <div class="relative">
                @if($banner->link_url)
                    <a href="{{ $banner->link_url }}" target="_blank" class="block">
                @endif
                
                <!-- Desktop Image -->
                <div class="hidden lg:block">
                    @if($banner->image_url)
                        <img src="{{ $banner->image_url }}" alt="{{ $banner->title ?? 'Banner' }}" class="w-full max-h-64 md:max-h-80 h-auto object-contain object-center">
                    @else
                        <div class="bg-[#f5f5f4] h-64 flex items-center justify-center">
                            <p class="text-[#64748B]">No desktop image uploaded</p>
                        </div>
                    @endif
                </div>

                <!-- Mobile Image -->
                <div class="lg:hidden">
                    @if($banner->image_url)
                        <img src="{{ $banner->image_url }}" alt="{{ $banner->title ?? 'Banner' }}" class="w-full max-h-64 md:max-h-80 h-auto object-contain object-center">
                    @else
                        <div class="bg-[#f5f5f4] h-40 flex items-center justify-center">
                            <p class="text-[#64748B]">No mobile image uploaded</p>
                        </div>
                    @endif
                </div>

                <!-- Text Overlay -->
                @if($banner->title || $banner->subtitle)
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent flex items-end">
                        <div class="p-4 lg:p-6 text-white">
                            @if($banner->title)
                                <h2 class="text-xl lg:text-2xl font-bold mb-2">{{ $banner->title }}</h2>
                            @endif
                            @if($banner->subtitle)
                                <p class="text-sm lg:text-base opacity-90">{{ $banner->subtitle }}</p>
                            @endif
                        </div>
                    </div>
                @endif

                @if($banner->link_url)
                    </a>
                @endif
            </div>
        </div>

        <!-- Banner Details -->
        <div class="bg-white shadow-store-lg rounded-store-lg border border-[#e7e5e4] p-6 mt-6">
            <h2 class="text-xl font-bold text-[#0F172A] mb-4">Banner Details</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-[#2C2B28]">Title</label>
                    <p class="mt-1 text-sm text-[#2C2B28]">{{ $banner->title ?? 'None' }}</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-[#2C2B28]">Subtitle</label>
                    <p class="mt-1 text-sm text-[#2C2B28]">{{ $banner->subtitle ?? 'None' }}</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-[#2C2B28]">Link URL</label>
                    <p class="mt-1 text-sm text-[#2C2B28]">{{ $banner->link_url ?? 'None' }}</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-[#2C2B28]">Sort Order</label>
                    <p class="mt-1 text-sm text-[#2C2B28]">{{ $banner->sort_order }}</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-[#2C2B28]">Status</label>
                    <span class="inline-flex mt-1 px-2 py-1 text-xs font-semibold rounded-full {{ $banner->is_active ? 'bg-teal-100 text-[#0D9488]' : 'bg-red-100 text-red-600' }}">
                        {{ $banner->is_active ? 'Active' : 'Inactive' }}
                    </span>
                </div>
                <div>
                    <label class="block text-sm font-medium text-[#2C2B28]">Currently Active</label>
                    <span class="inline-flex mt-1 px-2 py-1 text-xs font-semibold rounded-full {{ $banner->isCurrentlyActive() ? 'bg-teal-100 text-[#0D9488]' : 'bg-slate-100 text-[#64748B]' }}">
                        {{ $banner->isCurrentlyActive() ? 'Yes' : 'No' }}
                    </span>
                </div>
                @if($banner->starts_at)
                <div>
                    <label class="block text-sm font-medium text-[#2C2B28]">Starts At</label>
                    <p class="mt-1 text-sm text-[#2C2B28]">{{ $banner->starts_at->format('M j, Y g:i A') }}</p>
                </div>
                @endif
                @if($banner->ends_at)
                <div>
                    <label class="block text-sm font-medium text-[#2C2B28]">Ends At</label>
                    <p class="mt-1 text-sm text-[#2C2B28]">{{ $banner->ends_at->format('M j, Y g:i A') }}</p>
                </div>
                @endif
            </div>
        </div>
    </div>
</body>
</html>