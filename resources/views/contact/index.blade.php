<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact Us - Coolify</title>
    <meta name="description" content="Contact Coolify for enterprise solutions and custom deployments">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <style>
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            line-height: 1.6;
            letter-spacing: -0.01em;
            background-color: #000;
            color: #fff;
        }
        .feature-gradient {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            transition: all 0.2s ease-in-out;
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
    @include('components.header')

    <!-- Contact Form Section -->
    <main class="pt-32 pb-24">
        <div class="container mx-auto px-6">
            <div class="max-w-3xl mx-auto">
                <div class="text-center mb-12">
                    <h1 class="text-4xl sm:text-5xl font-bold mb-4">Contact Our Enterprise Team</h1>
                    <p class="text-xl text-gray-400">Get in touch with us to discuss your enterprise needs and custom deployment requirements.</p>
                </div>

                <div class="feature-gradient rounded-2xl p-8">
                    <form action="mailto:enterprise@coolify.io" method="GET" class="space-y-6">
                        <div>
                            <label class="block text-sm font-medium mb-2" for="name">Name</label>
                            <input type="text" id="name" name="name" required 
                                class="w-full px-4 py-2 bg-black/50 border border-white/20 rounded-lg focus:outline-none focus:border-blue-500">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium mb-2" for="email">Email</label>
                            <input type="email" id="email" name="email" required 
                                class="w-full px-4 py-2 bg-black/50 border border-white/20 rounded-lg focus:outline-none focus:border-blue-500">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium mb-2" for="company">Company</label>
                            <input type="text" id="company" name="company" required 
                                class="w-full px-4 py-2 bg-black/50 border border-white/20 rounded-lg focus:outline-none focus:border-blue-500">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium mb-2" for="message">Message</label>
                            <textarea id="message" name="message" rows="4" required 
                                class="w-full px-4 py-2 bg-black/50 border border-white/20 rounded-lg focus:outline-none focus:border-blue-500"></textarea>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit" 
                                class="px-6 py-3 bg-white text-black rounded-lg hover:bg-white/90 font-medium transition-colors">
                                Send Message
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Additional Contact Methods -->
                <div class="mt-12 grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="feature-gradient rounded-xl p-6">
                        <h3 class="text-lg font-semibold mb-2">Email Us Directly</h3>
                        <p class="text-gray-400 mb-4">For direct inquiries, you can email us at:</p>
                        <a href="mailto:enterprise@coolify.io" class="text-blue-400 hover:text-blue-300">enterprise@coolify.io</a>
                    </div>
                    
                    <div class="feature-gradient rounded-xl p-6">
                        <h3 class="text-lg font-semibold mb-2">Schedule a Call</h3>
                        <p class="text-gray-400 mb-4">Want to discuss your needs in person?</p>
                        <a href="https://calendly.com/coolify" target="_blank" class="text-blue-400 hover:text-blue-300">Book a meeting →</a>
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
</body>
</html> 