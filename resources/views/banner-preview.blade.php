<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banner Preview - {{ $banner->title ?? 'Untitled' }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,500,600,700&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'ui-sans-serif', 'system-ui', 'sans-serif'],
                    },
                    boxShadow: {
                        'store': '0 1px 3px 0 rgb(0 0 0 / 0.06), 0 1px 2px -1px rgb(0 0 0 / 0.04)',
                        'store-lg': '0 10px 40px -10px rgb(0 0 0 / 0.12)',
                    },
                    borderRadius: {
                        'store': '0.75rem',
                        'store-lg': '1rem',
                    },
                    colors: {
                        calm: {
                            primary: '#0D9488',
                            'primary-hover': '#0F766E',
                            background: '#FAFAFA',
                            surface: '#F8FAFC',
                            card: '#FFFFFF',
                            charcoal: '#0F172A',
                            muted: '#64748B',
                            border: '#E2E8F0',
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-[#FAFAFA] font-sans antialiased">
    <div class="min-h-screen p-4">
        <!-- Header -->
        <div class="bg-white shadow-store rounded-store-lg border border-[#E2E8F0] mb-6 p-4">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-[#0F172A]">Banner Preview</h1>
                    <p class="text-[#64748B] mt-1">This is how your banner will appear on the frontend</p>
                </div>
                <div class="flex space-x-2">
                    @if($banner->link_url)
                        <a href="{{ $banner->link_url }}" target="_blank" class="inline-flex items-center px-4 py-2 bg-[#0D9488] text-white rounded-store hover:bg-[#0F766E]">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                            </svg>
                            Open Link
                        </a>
                    @endif
                    <button onclick="window.close()" class="inline-flex items-center px-4 py-2 bg-[#64748B] text-white rounded-store hover:bg-[#475569]">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                        Close
                    </button>
                </div>
            </div>
        </div>

        <!-- Banner Preview -->
        <div class="bg-white shadow-store-lg rounded-store-lg border border-[#E2E8F0] overflow-hidden">
            <div class="relative">
                @if($banner->link_url)
                    <a href="{{ $banner->link_url }}" target="_blank" class="block">
                @endif
                
                <!-- Desktop Image -->
                <div class="hidden lg:block">
                    @if($banner->image_url)
                        <img src="{{ $banner->image_url }}" alt="{{ $banner->title ?? 'Banner' }}" class="w-full max-h-64 md:max-h-80 h-auto object-contain object-center">
                    @else
                        <div class="bg-[#F8FAFC] h-64 flex items-center justify-center">
                            <p class="text-[#64748B]">No desktop image uploaded</p>
                        </div>
                    @endif
                </div>

                <!-- Mobile Image -->
                <div class="lg:hidden">
                    @if($banner->image_url)
                        <img src="{{ $banner->image_url }}" alt="{{ $banner->title ?? 'Banner' }}" class="w-full max-h-64 md:max-h-80 h-auto object-contain object-center">
                    @else
                        <div class="bg-[#F8FAFC] h-40 flex items-center justify-center">
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
        <div class="bg-white shadow-store-lg rounded-store-lg border border-[#E2E8F0] p-6 mt-6">
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