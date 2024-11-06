@extends('pages.layouts.app')

@section('title', 'MicroBlog')

@section('content')
    <body>
        <div style="background-image: url('/img/bg.webp')" class="l-landing__bg-img">
            <div class="l-landing__container">
                <nav class="l-landing__nav">
                    <div class="l-landing__logo">
                        @include('/svg/logo-nav')  
                        <a href="{{ route('landing-page')}}">Microblog</a>
                    </div>
                    <div class="grid-cols-3"></div>
                    <div class="l-landing__login">
                    @auth
                        <div class="font-normal">
                            <a href="{{ route('dashboard', ['id' => auth()->id()])}}">Dashboard</a>
                        </div>
                    @else
                        <div class="font-normal">
                            <a href="{{ route('login')}}">Login</a>
                        </div>
                        <div class="font-normal">
                            <a href="{{ route('register-form')}}">Register</a>
                        </div>
                    @endauth
                    </div>  
                </nav>
            </div>
            <div class="l-landing__caption">
                <div class="md:text-5xl text-center text-2xl font-lora text-[#333333]">
                    <p>"Your Thoughts, Your Voice, Your Community"</p>
                </div>
            </div>
            <div class="l-landing__subtitle">
                    <p class="l-landing__libre">
                    Join our vibrant microblogging community where your voice matters. Share your thoughts, connect with like-minded individuals, and discover a world of inspiration.</p>
            </div>
        </div>
        <div class="l-landing__features-container">
                <div class="l-landing__features-title">
                    <p>Why join us?</p>
                </div>
            </div>
        </div>
        <div class="l-landing__features-row">
            <div class="l-landing__features-card">
               <div class="l-landing__features-card-img">
                    <div class="l-landing__features-img">
                        <img class="object-cover w-32 h-32 md:w-full md:h-full" src='/img/share.webp'>
                    </div>
                    <p class="l-landing__features-card-title">Share Your Moments</p>
                </div>
                <div class="l-landing__features-card-subtitle-container">
                    <p class="l-landing__features-card-subtitle">Upload images and content.</p>
                </div>
            </div>
            <div class="l-landing__features-card">
               <div class="l-landing__features-card-img">
                    <div class="l-landing__features-img">
                        <img class="object-cover w-32 h-32 md:w-full md:h-full" src='/img/post.webp'>
                    </div>
                    <p class="l-landing__features-card-title">Amplify Voices</p>
                </div>
                <div class="l-landing__features-card-subtitle-container">
                    <p class="l-landing__features-card-subtitle">Share others' posts.</p>
                </div>
            </div>
            <div class="l-landing__features-card">
               <div class="l-landing__features-card-img">
                    <div class="l-landing__features-img">
                        <img class="object-cover w-32 h-32 md:w-full md:h-full" src='/img/join.webp'>
                    </div>
                    <p class="l-landing__features-card-title">Join the Conversation</p>
                </div>
                <div class="l-landing__features-card-subtitle-container">
                    <p class="l-landing__features-card-subtitle">Leave comments and engage in discussions.</p>
                </div>
            </div>
        </div>
        <div class="l-landing__features-row1">
            <div class="l-landing__features-card">
               <div class="l-landing__features-card-img">
                    <div class="l-landing__features-img">
                        <img class="object-cover w-32 h-32 md:w-full md:h-full" src='/img/stay.webp'>
                    </div>
                    <p class="l-landing__features-card-title">Stay Connected</p>
                </div>
                <div class="l-landing__features-card-subtitle-container">
                    <p class="l-landing__features-card-subtitle">Follow people and topics to stay updated.</p>
                </div>
            </div>
            <div class="l-landing__features-card">
               <div class="l-landing__features-card-img">
                    <div class="l-landing__features-img">
                        <img class="object-cover w-32 h-32 md:w-full md:h-full" src='/img/follow.webp'>
                    </div>
                    <p class="l-landing__features-card-title">Tailor Your Feed</p>
                </div>
                <div class="l-landing__features-card-subtitle-container">
                    <p class="l-landing__features-card-subtitle">Unfollow to keep your feed relevant.</p>
                </div>
            </div>
        </div>
        <div class="l-landing__joinus">
            <div class="container mx-auto">
                <div class="l-landing__joinus-container">
                    <p class="l-landing__joinus-title">Be part of a supportive and engaging community. Whether you are here to share or to discover, our platform welcomes you.</p>
                    <div class="l-landing__joinus-img-container">
                        <img class="l-landing__joinus-img" src='/img/joinus.webp'>
                    </div>
                </div>
            </div> 
        </div>
        <div class="l-landing__features-container">
                <div class="l-landing__features-title">
                    <p>About us</p>
                </div>
            </div>
        </div>
        <div class="l-landing__container">
        <div class="l-landing__aboutus">
            <div class="l-landing__aboutus-container">
                <div class="l-landing__aboutus-par1">
                    <p class="l-landing__aboutus-par1-content">Welcome to MicroBlog, the go-to platform for sharing your thoughts, ideas, and moments in a concise and impactful way. At MicroBlog, we believe in the power of brevity and the value of every voice. Our mission is to provide a space where users can express themselves freely, connect with others, and stay informed about what's happening around the world.</p>
                </div>
                <div class="l-landing__aboutus-par2">
                    <p class="l-landing__aboutus-par2-content">Founded in 2024, MicroBlog has grown into a vibrant community of diverse individuals, each contributing to a rich tapestry of content. Whether you’re here to share your latest project, discuss current events, or simply connect with like-minded individuals, MicroBlog offers the tools and community support you need.</p>
                </div>
            </div>
            </div>
        </div>
        <div class="l-landing__developers">
                <div class="l-landing__developers-title">
                    <p>Developers</p>
                </div>
            </div>
        </div>
        <div class="l-landing__developers-container">
            <div class="l-landing__developers-card">
               <div class="l-landing__developers-img-container">
                    <div class="l-landing__developers-img-card">
                        <img class="l-landing__developers-img" src='/img/erika.webp'>
                    </div>
                </div>
                <div class="l-landing__developers-name-container">
                    <p class="l-landing__developers-name">Erika Fuerte</p>
                </div>
                <div class="l-landing__developers-position-container">
                    <p class="l-landing__developers-position">Software Engineer Intern - Full Stack</p>
                </div>
            </div>
            <div class="l-landing__developers-card">
               <div class="l-landing__developers-img-container">
                    <div class="l-landing__developers-img-card">
                        <img class="l-landing__developers-img" src='/img/peter.webp'>
                    </div>
                </div>
                <div class="l-landing__developers-name-container">
                    <p class="l-landing__developers-name">Peter Madrid</p>
                </div>
                <div class="l-landing__developers-position-container">
                    <p class="l-landing__developers-position">Software Engineer Intern - Full Stack</p>
                </div>
            </div>
        </div>
        <nav class="l-landing__footer">
            <div class="l-landing__footer-logo">    
                 @include('/svg/logo-nav')  
                <a href="{{ route('landing-page')}}">Microblog</a>
            </div>
            <div class="grid-cols-3"></div>
            <div class="l-landing__footer-all">
                <div class="font-medium">
                    <p>© 2024 MicroBlog. All rights reserved.</p>
                </div>
            </div>
        </nav> 
