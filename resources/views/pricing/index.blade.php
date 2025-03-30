<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pricing - Coolify</title>
    <meta name="description" content="Flexible pricing plans for Coolify - Self-Hosted Application Platform">
    <!-- Use Tailwind CSS directly from CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <style>
        /* Base styles */
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            line-height: 1.6;
            letter-spacing: -0.01em;
            background-color: #000;
            color: #fff;
        }
        
        /* Header */
        .header {
            position: fixed;
            top: 0;
            width: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(12px);
            z-index: 50;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        /* Navigation */
        .nav-link {
            color: #888;
            font-size: 0.875rem;
            font-weight: 500;
            transition: color 0.2s ease;
        }
        .nav-link:hover {
            color: #fff;
        }
        
        /* Buttons */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.5rem 1rem;
            font-weight: 500;
            border-radius: 0.375rem;
            text-align: center;
            transition: all 0.2s ease;
            height: 2.5rem;
        }
        .btn-primary {
            background-color: #fff;
            color: #000;
        }
        .btn-primary:hover {
            background-color: #f1f1f1;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        .btn-secondary {
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: #fff;
        }
        .btn-secondary:hover {
            border-color: rgba(255, 255, 255, 0.4);
            background-color: rgba(255, 255, 255, 0.05);
            transform: translateY(-1px);
        }
        
        /* Container */
        .container {
            width: 100%;
            max-width: 80rem;
            margin-left: auto;
            margin-right: auto;
            padding-left: 1.5rem;
            padding-right: 1.5rem;
        }
        
        /* Gradient backgrounds */
        .gradient-bg {
            background: linear-gradient(to bottom right, #000000, #111111);
        }
        .feature-gradient {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            transition: all 0.2s ease-in-out;
        }
        .feature-gradient:hover {
            border-color: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
        }
        
        /* Custom range slider styles */
        input[type="range"] {
            -webkit-appearance: none;
            width: 100%;
            height: 6px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 3px;
            outline: none;
        }
        
        input[type="range"]::-webkit-slider-thumb {
            -webkit-appearance: none;
            width: 18px;
            height: 18px;
            background: #3b82f6;
            border-radius: 50%;
            cursor: pointer;
            transition: all 0.2s ease;
        }
        
        input[type="range"]::-webkit-slider-thumb:hover {
            transform: scale(1.1);
        }
        
        .text-gradient {
            background-image: linear-gradient(90deg, #3b82f6, #10b981);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            color: transparent;
        }
    </style>
</head>
<body class="antialiased">
    <!-- Header -->
    <header class="header">
        <div class="container">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="/" class="flex items-center">
                        <img class="h-8 w-auto" src="{{ asset('svgs/coolify-logo.png') }}" alt="Coolify Logo">
                        <span class="ml-2 text-lg font-semibold">Coolify</span>
                    </a>
                </div>
                <div class="flex items-center space-x-8">
                    <a href="#features" class="nav-link">Features</a>
                    <a href="{{ route('pricing') }}" class="nav-link">Pricing</a>
                    <a href="https://coolify.io/docs" class="nav-link">Documentation</a>
                    <a href="https://github.com/coollabsio/coolify" class="nav-link">GitHub</a>
                    <div class="hidden sm:flex items-center space-x-3">
                        <a href="{{ route('login') }}" class="btn btn-secondary">Sign in</a>
                        <a href="{{ route('register') }}" class="btn btn-primary">Sign up</a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Pricing Section -->
    <main class="pt-32 pb-24">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h1 class="text-4xl sm:text-5xl font-bold mb-6">Simple, Transparent Pricing</h1>
                <p class="text-xl text-gray-400 max-w-2xl mx-auto">
                    Choose the perfect plan for your needs. Scale resources as you grow.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">
                <!-- Hobby Plan -->
                <div class="feature-gradient rounded-2xl p-8">
                    <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-blue-500 to-blue-400 opacity-70"></div>
                    <h2 class="text-2xl font-bold mb-4">Hobby</h2>
                    <div class="text-3xl font-bold mb-4">Free</div>
                    <p class="text-gray-400 mb-6">Perfect for side projects and experiments</p>
                    
                    <ul class="space-y-3 mb-8">
                        <li class="flex items-center text-sm">
                            <svg class="w-5 h-5 mr-3 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Import your repo
                        </li>
                        <li class="flex items-center text-sm">
                            <svg class="w-5 h-5 mr-3 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Deploy in seconds
                        </li>
                        <li class="flex items-center text-sm">
                            <svg class="w-5 h-5 mr-3 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Automatic CI/CD
                        </li>
                        <li class="flex items-center text-sm">
                            <svg class="w-5 h-5 mr-3 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            2 CPU & 1GB Storage
                        </li>
                        <li class="flex items-center text-sm">
                            <svg class="w-5 h-5 mr-3 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Community Support
                        </li>
                    </ul>
                    
                    <a href="{{ route('register') }}" class="block w-full py-3 px-4 text-center text-white border border-white/20 rounded-lg hover:bg-white/10">
                        Get Started
                    </a>
                </div>

                <!-- Pro Plan -->
                <div class="feature-gradient rounded-2xl p-8 transform scale-105 relative">
                    <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-purple-500 to-pink-500 opacity-70"></div>
                    <div class="absolute top-4 right-4 px-3 py-1 text-xs font-medium rounded-full bg-gradient-to-r from-purple-500 to-pink-500">Popular</div>
                    <h2 class="text-2xl font-bold mb-4">Pro</h2>
                    
                    <!-- Centralized Storage -->
                    <div class="mb-6">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-sm">Total Storage</span>
                            <span class="text-sm font-bold">$<span id="storagePrice">30</span>/mo</span>
                        </div>
                        <div class="space-y-4">
                            <div>
                                <label class="text-xs text-gray-400">Storage (GB)</label>
                                <input type="range" min="30" max="100" value="30" class="w-full" id="totalStorage" 
                                    oninput="updatePrice()">
                                <div class="flex justify-between text-xs mt-1">
                                    <span>30 GB</span>
                                    <span id="totalStorageValue">30 GB</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Frontend Pricing -->
                    <div class="mb-6">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-sm">Frontend</span>
                            <span class="text-sm font-bold">$<span id="frontendPrice">20</span>/mo</span>
                        </div>
                        <div class="space-y-4">
                            <div>
                                <label class="text-xs text-gray-400">CPU Cores</label>
                                <input type="range" min="4" max="12" value="4" class="w-full" id="frontendCPU" 
                                    oninput="updatePrice()">
                                <div class="flex justify-between text-xs mt-1">
                                    <span>4 cores</span>
                                    <span id="frontendCPUValue">4 cores</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Backend Pricing -->
                    <div class="mb-6">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-sm">Backend</span>
                            <span class="text-sm font-bold">$<span id="backendPrice">20</span>/mo</span>
                        </div>
                        <div class="space-y-4">
                            <div>
                                <label class="text-xs text-gray-400">CPU Cores</label>
                                <input type="range" min="4" max="12" value="4" class="w-full" id="backendCPU" 
                                    oninput="updatePrice()">
                                <div class="flex justify-between text-xs mt-1">
                                    <span>4 cores</span>
                                    <span id="backendCPUValue">4 cores</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Database Pricing -->
                    <div class="mb-6">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-sm">Database</span>
                            <span class="text-sm font-bold">$<span id="dbPrice">30</span>/mo</span>
                        </div>
                        <div class="space-y-4">
                            <div>
                                <label class="text-xs text-gray-400">CPU Cores</label>
                                <input type="range" min="4" max="12" value="4" class="w-full" id="dbCPU" 
                                    oninput="updatePrice()">
                                <div class="flex justify-between text-xs mt-1">
                                    <span>4 cores</span>
                                    <span id="dbCPUValue">4 cores</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-2xl font-bold mb-6">
                        Total: $<span id="totalPrice">70</span>/mo
                    </div>

                    <ul class="space-y-3 mb-8">
                        <li class="flex items-center text-sm">
                            <svg class="w-5 h-5 mr-3 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            30GB Initial Storage ($1/GB for additional)
                        </li>
                        <li class="flex items-center text-sm">
                            <svg class="w-5 h-5 mr-3 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Observability tools
                        </li>
                        <li class="flex items-center text-sm">
                            <svg class="w-5 h-5 mr-3 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Cold start prevention
                        </li>
                        <li class="flex items-center text-sm">
                            <svg class="w-5 h-5 mr-3 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Advanced WAF Protection
                        </li>
                        <li class="flex items-center text-sm">
                            <svg class="w-5 h-5 mr-3 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Email support
                        </li>
                    </ul>
                    
                    <a href="{{ route('register') }}" class="block w-full py-3 px-4 text-center bg-white text-black rounded-lg hover:bg-white/90">
                        Get Started
                    </a>
                </div>

                <!-- Enterprise Plan -->
                <div class="feature-gradient rounded-2xl p-8">
                    <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-yellow-500 to-orange-500 opacity-70"></div>
                    <h2 class="text-2xl font-bold mb-4">Enterprise</h2>
                    <div class="text-3xl font-bold mb-4">Custom</div>
                    <p class="text-gray-400 mb-6">For large-scale applications</p>
                    
                    <ul class="space-y-3 mb-8">
                        <li class="flex items-center text-sm">
                            <svg class="w-5 h-5 mr-3 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Everything in Pro
                        </li>
                        <li class="flex items-center text-sm">
                            <svg class="w-5 h-5 mr-3 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Dedicated support
                        </li>
                        <li class="flex items-center text-sm">
                            <svg class="w-5 h-5 mr-3 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Custom SLA
                        </li>
                        <li class="flex items-center text-sm">
                            <svg class="w-5 h-5 mr-3 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Priority feature requests
                        </li>
                        <li class="flex items-center text-sm">
                            <svg class="w-5 h-5 mr-3 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Custom integrations
                        </li>
                    </ul>
                    
                    <a href="{{ route('contact') }}" class="block w-full py-3 px-4 text-center text-white border border-white/20 rounded-lg hover:bg-white/10">
                        Contact Sales
                    </a>
                </div>
            </div>

            <!-- FAQ Section -->
            <div class="mt-24">
                <h2 class="text-3xl font-bold text-center mb-12">Frequently Asked Questions</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto">
                    <div class="feature-gradient rounded-xl p-6">
                        <h3 class="text-lg font-semibold mb-3">How does the pricing work?</h3>
                        <p class="text-gray-400">Our pricing is flexible and based on your resource needs. Start with base prices for frontend, backend, and database, then adjust CPU and storage as needed. Pay only for what you use.</p>
                    </div>
                    <div class="feature-gradient rounded-xl p-6">
                        <h3 class="text-lg font-semibold mb-3">Can I upgrade or downgrade anytime?</h3>
                        <p class="text-gray-400">Yes! You can adjust your resources and plan at any time. Changes take effect immediately, and billing is prorated to the day.</p>
                    </div>
                    <div class="feature-gradient rounded-xl p-6">
                        <h3 class="text-lg font-semibold mb-3">What's included in the free plan?</h3>
                        <p class="text-gray-400">The Hobby plan includes basic deployment features, 2 CPU cores, 1GB storage, and community support - perfect for personal projects and learning.</p>
                    </div>
                    <div class="feature-gradient rounded-xl p-6">
                        <h3 class="text-lg font-semibold mb-3">Do you offer a trial period?</h3>
                        <p class="text-gray-400">Yes, you can start with our Hobby plan for free and upgrade to Pro when you're ready. No credit card required to get started.</p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="py-16 bg-gray-900 text-white">
        <div class="container max-w-6xl">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12">
                <div class="col-span-1 md:col-span-1">
                    <div class="mb-6">
                        <a href="/" class="text-2xl font-bold flex items-center">
                            <span class="text-gradient mr-1">Coolify</span>
                        </a>
                    </div>
                    <p class="text-gray-400 mb-6">Your private Heroku-like cloud infrastructure, focused on simplicity and privacy.</p>
                    <div class="flex items-center space-x-4">
                        <a href="https://twitter.com/coollabsio" class="text-gray-400 hover:text-blue-400 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.052a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
                            </svg>
                        </a>
                        <a href="https://github.com/coollabsio/coolify" class="text-gray-400 hover:text-gray-100 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.207 6.839 9.504.5.092.682-.217.682-.577 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.205.07 1.839 1.237 1.237 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z" clip-rule="evenodd"></path>
                            </svg>
                        </a>
                        <a href="https://discord.gg/JpdKBzSf" class="text-gray-400 hover:text-indigo-400 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M20.317 4.37a19.791 19.791 0 00-4.885-1.515.074.074 0 00-.079.037c-.21.375-.444.864-.608 1.25a18.27 18.27 0 00-5.487 0 12.64 12.64 0 00-.617-1.25.077.077 0 00-.079-.037A19.736 19.736 0 003.677 4.37a.07.07 0 00-.032.027C.533 9.046-.32 13.58.099 18.057a.082.082 0 00.031.057 19.9 19.9 0 005.993 3.03.078.078 0 00.084-.028c.462-.63.874-1.295 1.226-1.994a.076.076 0 00.084.028 13.107 13.107 0 01-1.872-.892.077.077 0 01-.008-.128 10.2 10.2 0 00.372-.292.074.074 0 01.077-.01c3.928 1.793 8.18 1.793 12.062 0a.074.074 0 01.078.01c.12.098.246.198.373.292a.077.077 0 01-.006.127 12.299 12.299 0 01-1.873.892.077.077 0 00-.041.107c.36.698.772 1.362 1.225 1.993a.076.076 0 00.084.028 19.839 19.839 0 006.002-3.03.077.077 0 00.032-.054c.5-5.177-.838-9.674-3.549-13.66a.061.061 0 00-.031-.03zM8.02 15.33c-1.183 0-2.157-1.085-2.157-2.419 0-1.333.956-2.419 2.157-2.419 1.21 0 2.176 1.096 2.157 2.42 0 1.333-.956 2.418-2.157 2.418zm7.975 0c-1.183 0-2.157-1.085-2.157-2.419 0-1.333.955-2.419 2.157-2.419 1.21 0 2.176 1.096 2.157 2.42 0 1.333-.946 2.418-2.157 2.418z"></path>
                            </svg>
                        </a>
                    </div>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Product</h3>
                    <ul class="space-y-2">
                        <li><a href="#features" class="text-gray-400 hover:text-white transition-colors">Features</a></li>
                        <li><a href="/docs" class="text-gray-400 hover:text-white transition-colors">Documentation</a></li>
                        <li><a href="https://github.com/coollabsio/coolify/releases" class="text-gray-400 hover:text-white transition-colors">Changelog</a></li>
                        <li><a href="https://coolify.io/blog" class="text-gray-400 hover:text-white transition-colors">Blog</a></li>
                        <li><a href="https://status.coolify.io" class="text-gray-400 hover:text-white transition-colors">Status</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Resources</h3>
                    <ul class="space-y-2">
                        <li><a href="https://github.com/coollabsio/coolify" class="text-gray-400 hover:text-white transition-colors">GitHub Repository</a></li>
                        <li><a href="https://discord.gg/JpdKBzSf" class="text-gray-400 hover:text-white transition-colors">Discord Community</a></li>
                        <li><a href="https://twitter.com/coollabsio" class="text-gray-400 hover:text-white transition-colors">Twitter</a></li>
                        <li><a href="/roadmap" class="text-gray-400 hover:text-white transition-colors">Roadmap</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Company</h3>
                    <ul class="space-y-2">
                        <li><a href="/about" class="text-gray-400 hover:text-white transition-colors">About</a></li>
                        <li><a href="/privacy" class="text-gray-400 hover:text-white transition-colors">Privacy Policy</a></li>
                        <li><a href="/terms" class="text-gray-400 hover:text-white transition-colors">Terms of Service</a></li>
                        <li><a href="/contact" class="text-gray-400 hover:text-white transition-colors">Contact</a></li>
                    </ul>
                </div>
            </div>
            <div class="mt-12 pt-8 border-t border-gray-800 text-gray-400 text-sm flex flex-col md:flex-row justify-between items-center">
                <div>© {{ date('Y') }} Coolify. All rights reserved.</div>
                <div class="mt-4 md:mt-0">
                    Made with ❤️ by <a href="https://coollabs.io" class="text-blue-400 hover:text-blue-300">CoolLabs</a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        function updatePrice() {
            // Base prices
            const baseFrontend = 20;
            const baseBackend = 20;
            const baseDB = 30;
            const baseStorage = 30; // Base storage included
            
            // Get slider values
            const frontendCPU = parseInt(document.getElementById('frontendCPU').value);
            const backendCPU = parseInt(document.getElementById('backendCPU').value);
            const dbCPU = parseInt(document.getElementById('dbCPU').value);
            const totalStorage = parseInt(document.getElementById('totalStorage').value);
            
            // Update display values
            document.getElementById('frontendCPUValue').textContent = `${frontendCPU} cores`;
            document.getElementById('backendCPUValue').textContent = `${backendCPU} cores`;
            document.getElementById('dbCPUValue').textContent = `${dbCPU} cores`;
            document.getElementById('totalStorageValue').textContent = `${totalStorage} GB`;
            
            // Calculate prices
            const frontendPrice = baseFrontend + (frontendCPU - 4) * 2;
            const backendPrice = baseBackend + (backendCPU - 4) * 2;
            const dbPrice = baseDB + (dbCPU - 4) * 2;
            const storagePrice = Math.max(0, totalStorage - baseStorage) * 1; // $1 per GB over base storage
            
            // Update price displays
            document.getElementById('frontendPrice').textContent = frontendPrice;
            document.getElementById('backendPrice').textContent = backendPrice;
            document.getElementById('dbPrice').textContent = dbPrice;
            document.getElementById('storagePrice').textContent = storagePrice;
            document.getElementById('totalPrice').textContent = frontendPrice + backendPrice + dbPrice + storagePrice;
        }
    </script>
</body>
</html> 