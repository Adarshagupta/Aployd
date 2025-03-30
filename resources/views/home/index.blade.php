<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Coolify - Self-Hosted Application Platform</title>
    <meta name="description" content="Coolify is an open-source self-hosted Heroku/Netlify alternative">
    <meta name="keywords" content="coolify, self-hosted, paas, deployment, heroku, netlify, vercel, alternative">
    <!-- Use Tailwind CSS directly from CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <!-- Inline all styles to avoid dependency on Mix/Vite -->
    <style>
        /* Base styles */
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            line-height: 1.6;
            letter-spacing: -0.01em;
        }
        
        /* Dark mode */
        .dark-mode {
            color: #f1f1f1;
            background-color: #000;
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
        .hero-gradient {
            position: relative;
            overflow: hidden;
        }
        .hero-gradient::before {
            content: '';
            position: absolute;
            top: 10%;
            left: 50%;
            width: 200%;
            height: 200%;
            transform: translateX(-50%);
            background: radial-gradient(circle, rgba(59, 130, 246, 0.15) 0%, transparent 50%);
            z-index: -1;
        }
        .text-gradient {
            background-image: linear-gradient(90deg, #3b82f6, #10b981);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            color: transparent;
        }
        
        /* Animation */
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        }
        .float {
            animation: float 5s ease-in-out infinite;
        }
        
        @keyframes pulse {
            0%, 100% { opacity: 0.8; }
            50% { opacity: 1; }
        }
        .pulse {
            animation: pulse 3s ease-in-out infinite;
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
        
        /* Feature cards */
        .feature-card {
            padding: 1.75rem;
            border-radius: 0.75rem;
            transition: all 0.2s ease;
        }
        .feature-icon {
            width: 3rem;
            height: 3rem;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 0.5rem;
            margin-bottom: 1.25rem;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        /* Circle blur */
        .circle-blur {
            position: absolute;
            width: 40vw;
            height: 40vw;
            border-radius: 100%;
            filter: blur(90px);
            z-index: -1;
            opacity: 0.6;
        }
        
        /* Footer */
        .footer {
            background-color: #000;
            padding: 4rem 0;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* Dots grid background for specific sections */
        .dots-grid {
            position: relative;
        }
        .dots-grid::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: radial-gradient(rgba(255, 255, 255, 0.1) 1px, transparent 1px);
            background-size: 30px 30px;
            background-position: 0 0;
            z-index: -1;
            opacity: 0.5;
        }
    </style>
</head>
<body class="antialiased dark-mode">
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

    <!-- Hero Section -->
    <section class="pt-32 pb-24 hero-gradient overflow-hidden relative">
        <!-- Abstract cloud-inspired elements -->
        <div class="circle-blur" style="background: rgba(59, 130, 246, 0.15); left: 0; top: 15%; width: 60vw; height: 60vw;"></div>
        <div class="circle-blur" style="background: rgba(16, 185, 129, 0.15); right: -20%; top: 30%; width: 50vw; height: 50vw;"></div>
        <div class="circle-blur pulse" style="background: rgba(99, 102, 241, 0.1); left: 25%; top: 60%; width: 40vw; height: 40vw;"></div>
        
        <!-- Floating cloud elements -->
        <div class="absolute top-20 left-10 opacity-40 float" style="animation-delay: 0.5s;">
            <svg width="80" height="60" viewBox="0 0 80 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M75 40C77.7614 40 80 37.7614 80 35C80 32.2386 77.7614 30 75 30H74.4369C73.624 30 72.9168 29.4797 72.72 28.7L72.5 27.8C71.5 23.8 67.8 21 63.6 21H63.2C62.2724 21 61.4265 20.4154 61.1337 19.5361L60.9352 18.9459C59.2724 14.4008 55.1703 11.3623 50.4 11.0444L50 11C47.5 11 45.1 11.8 43.2 13.2C41.8 14.2 40.8 15.6 40.1 17.2C39.9608 17.6643 39.5493 18 39.0654 18H38.2C36.6973 18 35.3798 17.094 34.9487 15.6389C33.5281 11.0437 29.2869 8 24.5 8C20.7 8 17.2 9.9 15.3 13C14.5168 14.2962 13.2525 15 11.8 15H10C4.5 15 0 19.5 0 25C0 30.5 4.5 35 10 35H13C15.2 35 17 33.2 17 31H20C21.6569 31 23 32.3431 23 34V35C23 37.7614 25.2386 40 28 40H33.5C36.5376 40 39 42.4624 39 45.5C39 48.5376 41.4624 51 44.5 51C47.5376 51 50 48.5376 50 45.5V45C50 42.2386 52.2386 40 55 40H75Z" fill="white" fill-opacity="0.3"/>
            </svg>
        </div>
        <div class="absolute bottom-40 right-20 opacity-30 float" style="animation-delay: 1.5s; animation-duration: 7s;">
            <svg width="100" height="75" viewBox="0 0 100 75" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M93.75 50C97.2018 50 100 47.2018 100 43.75C100 40.2982 97.2018 37.5 93.75 37.5H93.0461C92.03 37.5 91.146 36.8496 90.9 35.875L90.625 34.75C89.375 29.75 84.75 26.25 79.5 26.25H79C77.8405 26.25 76.7831 25.5193 76.4171 24.4201L76.169 23.6824C74.0905 18.001 68.9629 14.2029 63 13.8055L62.5 13.75C59.375 13.75 56.375 14.75 54 16.5C52.25 17.75 51 19.5 50.125 21.5C49.951 22.0804 49.4366 22.5 48.8318 22.5H47.75C45.8716 22.5 44.2248 21.3675 43.6859 19.5486C41.9101 13.8046 36.6086 10 30.625 10C25.875 10 21.5 12.375 19.125 16.25C18.146 17.8703 16.5656 18.75 14.75 18.75H12.5C5.625 18.75 0 24.375 0 31.25C0 38.125 5.625 43.75 12.5 43.75H16.25C19 43.75 21.25 41.5 21.25 38.75H25C27.0711 38.75 28.75 40.4289 28.75 42.5V43.75C28.75 47.2018 31.5482 50 35 50H41.875C45.672 50 48.75 53.078 48.75 56.875C48.75 60.672 51.828 63.75 55.625 63.75C59.422 63.75 62.5 60.672 62.5 56.875V56.25C62.5 52.7982 65.2982 50 68.75 50H93.75Z" fill="white" fill-opacity="0.3"/>
            </svg>
        </div>
        
        <!-- Code-like background elements -->
        <div class="absolute inset-0 overflow-hidden opacity-10">
            <div class="absolute left-10 top-40 text-xs font-mono opacity-30 text-blue-300">
                deploy(app) {<br>
                &nbsp;&nbsp;return new Promise((resolve) => {<br>
                &nbsp;&nbsp;&nbsp;&nbsp;buildContainer();<br>
                &nbsp;&nbsp;&nbsp;&nbsp;setupNetwork();<br>
                &nbsp;&nbsp;&nbsp;&nbsp;resolve(true);<br>
                &nbsp;&nbsp;});<br>
                }
            </div>
            <div class="absolute right-10 bottom-40 text-xs font-mono opacity-30 text-green-300">
                infrastructure.create({<br>
                &nbsp;&nbsp;type: 'container',<br>
                &nbsp;&nbsp;replicas: 3,<br>
                &nbsp;&nbsp;autoScale: true<br>
                });
            </div>
        </div>
        
        <div class="container relative z-10">
            <div class="text-center">
                <h1 class="text-4xl sm:text-5xl lg:text-7xl font-bold mb-8 tracking-tight">
                    Deploy Your Apps <span class="text-gradient">Simply</span> and <span class="text-gradient">Securely</span>
                </h1>
                <p class="max-w-3xl mx-auto text-xl text-gray-400 mb-12 leading-relaxed">
                    Take control of your infrastructure with the open-source, self-hosted alternative to Heroku and Netlify.
                </p>
                <div class="flex flex-col sm:flex-row justify-center gap-4 mb-20">
                    <a href="{{ route('register') }}" class="btn btn-primary px-6 py-3">
                        Start for free
                    </a>
                    <a href="https://docs.coolify.io/installation" class="btn btn-secondary px-6 py-3">
                        Self-host Coolify
                    </a>
                </div>
                
                <!-- Stats section -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-5xl mx-auto">
                    <div class="feature-gradient rounded-xl p-6 text-center backdrop-blur-md">
                        <div class="text-3xl font-bold mb-2 text-gradient">100%</div>
                        <div class="text-sm text-gray-400">Open Source</div>
                    </div>
                    <div class="feature-gradient rounded-xl p-6 text-center backdrop-blur-md">
                        <div class="text-3xl font-bold mb-2 text-gradient">10K+</div>
                        <div class="text-sm text-gray-400">Active Deployments</div>
                    </div>
                    <div class="feature-gradient rounded-xl p-6 text-center backdrop-blur-md">
                        <div class="text-3xl font-bold mb-2 text-gradient">5K+</div>
                        <div class="text-sm text-gray-400">GitHub Stars</div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Moving dots background -->
        <div class="absolute inset-0 overflow-hidden" style="z-index: -1;">
            <div id="particles-js" class="absolute inset-0"></div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-24 relative overflow-hidden">
        <!-- Background elements -->
        <div class="absolute inset-0 dots-grid"></div>
        <div class="circle-blur" style="background: rgba(99, 102, 241, 0.07); right: -10%; bottom: 10%; width: 45vw; height: 45vw;"></div>
        
        <div class="container relative z-10">
            <div class="text-center mb-16">
                <span class="inline-block px-3 py-1 mb-4 text-xs font-medium rounded-full text-blue-500 bg-blue-500 bg-opacity-10 border border-blue-500 border-opacity-20">Cloud Features</span>
                <h2 class="text-3xl sm:text-4xl font-bold mb-4 leading-tight">Everything You Need to Deploy</h2>
                <p class="max-w-2xl mx-auto text-lg text-gray-400 leading-relaxed">
                    A full-featured platform for developers and teams to manage deployments with ease and confidence.
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-20">
                <!-- Feature 1 -->
                <div class="feature-gradient group rounded-xl p-8 relative overflow-hidden backdrop-blur-md">
                    <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-blue-500 to-blue-400 opacity-70"></div>
                    <div class="feature-icon bg-blue-500 bg-opacity-10 border-blue-500 border-opacity-20 mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 group-hover:text-blue-400 transition-colors">One-Click Deployments</h3>
                    <p class="text-gray-400 leading-relaxed">
                        Deploy applications from Git repositories with automatic builds and zero-downtime deployments.
                    </p>
                </div>
                
                <!-- Feature 2 -->
                <div class="feature-gradient group rounded-xl p-8 relative overflow-hidden backdrop-blur-md">
                    <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-green-500 to-green-400 opacity-70"></div>
                    <div class="feature-icon bg-green-500 bg-opacity-10 border-green-500 border-opacity-20 mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 group-hover:text-green-400 transition-colors">Database Management</h3>
                    <p class="text-gray-400 leading-relaxed">
                        Deploy and manage databases (MySQL, PostgreSQL, MongoDB, Redis) with automated backups.
                    </p>
                </div>
                
                <!-- Feature 3 -->
                <div class="feature-gradient group rounded-xl p-8 relative overflow-hidden backdrop-blur-md">
                    <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-purple-500 to-purple-400 opacity-70"></div>
                    <div class="feature-icon bg-purple-500 bg-opacity-10 border-purple-500 border-opacity-20 mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 group-hover:text-purple-400 transition-colors">Self-Hosted & Secure</h3>
                    <p class="text-gray-400 leading-relaxed">
                        Maintain full control over your data and infrastructure. No vendor lock-in, ever.
                    </p>
                </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Feature 4 -->
                <div class="feature-gradient group rounded-xl p-8 relative overflow-hidden backdrop-blur-md">
                    <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-pink-500 to-pink-400 opacity-70"></div>
                    <div class="feature-icon bg-pink-500 bg-opacity-10 border-pink-500 border-opacity-20 mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-pink-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37.836-1.369.253-2.473-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 group-hover:text-pink-400 transition-colors">Highly Customizable</h3>
                    <p class="text-gray-400 leading-relaxed">
                        Configure everything to your needs with environment variables, custom domains, and more.
                    </p>
                </div>
                
                <!-- Feature 5 -->
                <div class="feature-gradient group rounded-xl p-8 relative overflow-hidden backdrop-blur-md">
                    <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-yellow-500 to-yellow-400 opacity-70"></div>
                    <div class="feature-icon bg-yellow-500 bg-opacity-10 border-yellow-500 border-opacity-20 mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 group-hover:text-yellow-400 transition-colors">Advanced Monitoring</h3>
                    <p class="text-gray-400 leading-relaxed">
                        Real-time logs, metrics, and alerts to keep your applications running smoothly at all times.
                    </p>
                </div>
                
                <!-- Feature 6 -->
                <div class="feature-gradient group rounded-xl p-8 relative overflow-hidden backdrop-blur-md">
                    <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-indigo-500 to-indigo-400 opacity-70"></div>
                    <div class="feature-icon bg-indigo-500 bg-opacity-10 border-indigo-500 border-opacity-20 mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 group-hover:text-indigo-400 transition-colors">Team Collaboration</h3>
                    <p class="text-gray-400 leading-relaxed">
                        Multi-user support with role-based access control to manage permissions properly.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-24 gradient-bg text-white overflow-hidden relative">
        <!-- Cloud graphics -->
        <div class="circle-blur pulse" style="background: rgba(59, 130, 246, 0.15); right: -10%; top: 20%; width: 50vw; height: 50vw;"></div>
        <div class="circle-blur" style="background: rgba(124, 58, 237, 0.1); left: -5%; bottom: 10%; width: 30vw; height: 30vw;"></div>
        
        <!-- Abstract cloud shapes -->
        <div class="absolute top-1/3 left-0 opacity-10">
            <svg width="300" height="200" viewBox="0 0 300 200" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M275 140C287.15 140 297 130.15 297 118C297 105.85 287.15 96 275 96H273.15C270.6 96 268.448 94.2948 267.952 91.8L267.5 89.6C264.5 76.2 253.2 66.5 240 66.5H238.8C235.298 66.5 232.257 63.9954 231.434 60.601L230.871 57.7568C226.13 43.6506 212.995 33.9404 198 33.1332L196.5 33C188.5 33 180.8 35.4 174.6 39.9C170.2 43.1 166.8 47.35 164.3 52.15C163.863 53.3293 162.698 54.25 161.328 54.25H158.7C154.155 54.25 150.19 51.282 149.003 47.0167C144.651 31.3747 130.092 20 113.5 20C101.1 20 89.6 26.85 83.2 37.5C80.302 42.037 75.432 45 70.15 45H63.5C47.25 45 34 58.25 34 74.5C34 90.75 47.25 104 63.5 104H74.5C81.4 104 87 98.4 87 91.5H97C102.523 91.5 107 95.9772 107 101.5V104C107 116.15 116.85 126 129 126H148.5C157.613 126 165 133.387 165 142.5C165 151.613 172.387 159 181.5 159C190.613 159 198 151.613 198 142.5V142C198 129.85 207.85 120 220 120H275Z" fill="white" fill-opacity="0.2"/>
            </svg>
        </div>
        <div class="absolute bottom-0 right-0 opacity-10 transform rotate-180">
            <svg width="300" height="200" viewBox="0 0 300 200" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M275 140C287.15 140 297 130.15 297 118C297 105.85 287.15 96 275 96H273.15C270.6 96 268.448 94.2948 267.952 91.8L267.5 89.6C264.5 76.2 253.2 66.5 240 66.5H238.8C235.298 66.5 232.257 63.9954 231.434 60.601L230.871 57.7568C226.13 43.6506 212.995 33.9404 198 33.1332L196.5 33C188.5 33 180.8 35.4 174.6 39.9C170.2 43.1 166.8 47.35 164.3 52.15C163.863 53.3293 162.698 54.25 161.328 54.25H158.7C154.155 54.25 150.19 51.282 149.003 47.0167C144.651 31.3747 130.092 20 113.5 20C101.1 20 89.6 26.85 83.2 37.5C80.302 42.037 75.432 45 70.15 45H63.5C47.25 45 34 58.25 34 74.5C34 90.75 47.25 104 63.5 104H74.5C81.4 104 87 98.4 87 91.5H97C102.523 91.5 107 95.9772 107 101.5V104C107 116.15 116.85 126 129 126H148.5C157.613 126 165 133.387 165 142.5C165 151.613 172.387 159 181.5 159C190.613 159 198 151.613 198 142.5V142C198 129.85 207.85 120 220 120H275Z" fill="white" fill-opacity="0.2"/>
            </svg>
        </div>
        
        <div class="container max-w-5xl text-center relative z-10">
            <span class="inline-block px-3 py-1 mb-4 text-xs font-medium rounded-full text-blue-300 bg-blue-900 bg-opacity-30 border border-blue-800">Cloud Platform</span>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold mb-6 leading-tight">Ready to Take Control of Your <span class="text-gradient">Cloud Deployments?</span></h2>
            <p class="text-xl mb-12 text-gray-300 max-w-2xl mx-auto leading-relaxed">
                Join thousands of developers deploying applications with Coolify. Start building on your own infrastructure today.
            </p>
            
            <!-- Feature highlights -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-8 mb-12">
                <div class="backdrop-blur-md rounded-xl p-5 border border-white/10">
                    <div class="flex items-center justify-center mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="font-medium">Self-Hosted Control</div>
                    <p class="text-sm text-gray-400">Full control over your infrastructure and data</p>
                </div>
                <div class="backdrop-blur-md rounded-xl p-5 border border-white/10">
                    <div class="flex items-center justify-center mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" />
                            <path d="M9 13h2v5a1 1 0 11-2 0v-5z" />
                        </svg>
                    </div>
                    <div class="font-medium">One-Click Deployment</div>
                    <p class="text-sm text-gray-400">From code to production in seconds</p>
                </div>
                <div class="backdrop-blur-md rounded-xl p-5 border border-white/10">
                    <div class="flex items-center justify-center mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M12.316 3.051a1 1 0 01.633 1.265l-4 12a1 1 0 11-1.898-.632l4-12a1 1 0 011.265-.633zM5.707 6.293a1 1 0 010 1.414L3.414 10l2.293 2.293a1 1 0 11-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0zm8.586 0a1 1 0 011.414 0l3 3a1 1 0 010 1.414l-3 3a1 1 0 11-1.414-1.414L16.586 10l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="font-medium">Advanced Customization</div>
                    <p class="text-sm text-gray-400">Configure to your exact needs</p>
                </div>
            </div>
            
            <div class="flex flex-col sm:flex-row justify-center gap-5">
                <a href="{{ route('register') }}" class="btn px-8 py-4 bg-white text-black hover:bg-gray-100 font-medium rounded-lg text-base group relative overflow-hidden">
                    <span class="relative z-10">Create an account</span>
                    <div class="absolute inset-0 translate-y-full group-hover:translate-y-0 bg-gradient-to-r from-blue-500 to-purple-500 transition-transform duration-300 ease-in-out"></div>
                    <div class="absolute inset-0 opacity-0 group-hover:opacity-100 group-hover:text-white transition-opacity duration-300 ease-in-out z-10 flex items-center justify-center">Create an account</div>
                </a>
                <a href="https://github.com/coollabsio/coolify" class="btn px-8 py-4 border border-white/20 hover:bg-white/10 font-medium rounded-lg text-base">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="currentColor" class="mr-2">
                        <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.237 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z" />
                    </svg>
                    Star on GitHub
                </a>
            </div>
            <div class="mt-12 text-sm text-gray-400 flex items-center justify-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-400" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M6.625 2.655A9 9 0 0119 11a1 1 0 11-2 0 7 7 0 00-9.625-6.492 1 1 0 11-.75-1.853zM4.662 4.959A1 1 0 014.75 6.37 6.97 6.97 0 003 11a1 1 0 11-2 0 8.97 8.97 0 012.25-5.953 1 1 0 011.412-.088z" clip-rule="evenodd" />
                    <path fill-rule="evenodd" d="M5 11a5 5 0 1110 0 1 1 0 11-2 0 3 3 0 10-6 0c0 1.677-.345 3.276-.968 4.729a1 1 0 11-1.838-.789A9.964 9.964 0 005 11zm8.921 2.012a1 1 0 01.831 1.145 19.86 19.86 0 01-.545 2.436 1 1 0 11-1.92-.558c.207-.713.371-1.445.49-2.192a1 1 0 011.144-.83z" clip-rule="evenodd" />
                    <path fill-rule="evenodd" d="M10 10a1 1 0 011 1c0 2.236-.46 4.368-1.29 6.304a1 1 0 01-1.838-.789A13.952 13.952 0 009 11a1 1 0 011-1z" clip-rule="evenodd" />
                </svg>
                Self-host on your own infrastructure or use our managed cloud
            </div>
        </div>
    </section>

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
    
    <!-- Add particles.js for animated background -->
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            if (typeof particlesJS !== 'undefined') {
                particlesJS("particles-js", {
                    "particles": {
                        "number": {
                            "value": 80,
                            "density": {
                                "enable": true,
                                "value_area": 800
                            }
                        },
                        "color": {
                            "value": "#ffffff"
                        },
                        "shape": {
                            "type": "circle",
                            "stroke": {
                                "width": 0,
                                "color": "#000000"
                            },
                        },
                        "opacity": {
                            "value": 0.1,
                            "random": true,
                            "anim": {
                                "enable": true,
                                "speed": 0.5,
                                "opacity_min": 0.05,
                                "sync": false
                            }
                        },
                        "size": {
                            "value": 3,
                            "random": true,
                            "anim": {
                                "enable": true,
                                "speed": 2,
                                "size_min": 0.1,
                                "sync": false
                            }
                        },
                        "line_linked": {
                            "enable": true,
                            "distance": 150,
                            "color": "#ffffff",
                            "opacity": 0.05,
                            "width": 1
                        },
                        "move": {
                            "enable": true,
                            "speed": 0.5,
                            "direction": "none",
                            "random": true,
                            "straight": false,
                            "out_mode": "out",
                            "bounce": false,
                        }
                    },
                    "interactivity": {
                        "detect_on": "canvas",
                        "events": {
                            "onhover": {
                                "enable": true,
                                "mode": "bubble"
                            },
                            "onclick": {
                                "enable": false
                            },
                            "resize": true
                        },
                        "modes": {
                            "bubble": {
                                "distance": 200,
                                "size": 4,
                                "duration": 2,
                                "opacity": 0.2,
                                "speed": 3
                            }
                        }
                    },
                    "retina_detect": true
                });
            }
        });
    </script>
</body>
</html> 