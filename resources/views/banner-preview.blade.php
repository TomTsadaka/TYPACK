<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banner Preview - {{ $banner->title ?? 'Untitled' }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=nunito:400,500,600,700&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Nunito', 'ui-sans-serif', 'system-ui', 'sans-serif'],
                    },
                    colors: {
                        calm: {
                            primary: '#5B7B6B',
                            'primary-hover': '#4A6A5A',
                            accent: '#9B8B7E',
                            background: '#F8F7F4',
                            surface: '#F0F2EF',
                            card: '#FDFCFA',
                            charcoal: '#2C2B28',
                            muted: '#6B6A65',
                            border: '#E5E3DF',
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-[#F8F7F4] font-sans antialiased">
    <div class="min-h-screen p-4">
        <!-- Header -->
        <div class="bg-[#FDFCFA] shadow-sm rounded-xl border border-[#E5E3DF] mb-6 p-4">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-[#2C2B28]">Banner Preview</h1>
                    <p class="text-[#6B6A65] mt-1">This is how your banner will appear on the frontend</p>
                </div>
                <div class="flex space-x-2">
                    @if($banner->link_url)
                        <a href="{{ $banner->link_url }}" target="_blank" class="inline-flex items-center px-4 py-2 bg-[#5B7B6B] text-white rounded-lg hover:bg-[#4A6A5A]">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                            </svg>
                            Open Link
                        </a>
                    @endif
                    <button onclick="window.close()" class="inline-flex items-center px-4 py-2 bg-[#6B6A65] text-white rounded-lg hover:bg-[#5B5A55]">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                        Close
                    </button>
                </div>
            </div>
        </div>

        <!-- Banner Preview -->
        <div class="bg-[#FDFCFA] shadow-lg rounded-xl border border-[#E5E3DF] overflow-hidden">
            <div class="relative">
                @if($banner->link_url)
                    <a href="{{ $banner->link_url }}" target="_blank" class="block">
                @endif
                
                <!-- Desktop Image -->
                <div class="hidden lg:block">
                    @if($banner->image_url)
                        <img src="{{ $banner->image_url }}" alt="{{ $banner->title ?? 'Banner' }}" class="w-full h-auto">
                    @else
                        <div class="bg-[#F0F2EF] h-96 flex items-center justify-center">
                            <p class="text-[#6B6A65]">No desktop image uploaded</p>
                        </div>
                    @endif
                </div>

                <!-- Mobile Image -->
                <div class="lg:hidden">
                    @if($banner->image_url)
                        <img src="{{ $banner->image_url }}" alt="{{ $banner->title ?? 'Banner' }}" class="w-full h-auto">
                    @else
                        <div class="bg-[#F0F2EF] h-48 flex items-center justify-center">
                            <p class="text-[#6B6A65]">No mobile image uploaded</p>
                        </div>
                    @endif
                </div>

                <!-- Text Overlay -->
                @if($banner->title || $banner->subtitle)
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent flex items-end">
                        <div class="p-8 text-white">
                            @if($banner->title)
                                <h2 class="text-3xl lg:text-5xl font-bold mb-2">{{ $banner->title }}</h2>
                            @endif
                            @if($banner->subtitle)
                                <p class="text-lg lg:text-xl opacity-90">{{ $banner->subtitle }}</p>
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
        <div class="bg-[#FDFCFA] shadow-lg rounded-xl border border-[#E5E3DF] p-6 mt-6">
            <h2 class="text-xl font-bold text-[#2C2B28] mb-4">Banner Details</h2>
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
                    <span class="inline-flex mt-1 px-2 py-1 text-xs font-semibold rounded-full {{ $banner->is_active ? 'bg-[#E8F0EC] text-[#5B7B6B]' : 'bg-[#F5E8E8] text-[#B86B6B]' }}">
                        {{ $banner->is_active ? 'Active' : 'Inactive' }}
                    </span>
                </div>
                <div>
                    <label class="block text-sm font-medium text-[#2C2B28]">Currently Active</label>
                    <span class="inline-flex mt-1 px-2 py-1 text-xs font-semibold rounded-full {{ $banner->isCurrentlyActive() ? 'bg-[#E8F0EC] text-[#5B7B6B]' : 'bg-[#F0F2EF] text-[#6B6A65]' }}">
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