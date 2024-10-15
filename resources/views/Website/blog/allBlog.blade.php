@extends('Website.Layouts.master')
@section('title')
    Read All The Latest News and Trends With Our Engaging Blogs
@endsection
@section('description')
    Stay informed with our engaging blogs that cover the latest news and trends. Get your daily dose of insightful articles
    on a wide range of topics.
@endsection
@section('tags')
    <link rel="canonical" href="https://clickinvitation.com/all/blog">
@endsection
@section('content')
    {{-- {{ dd($blogs) }} --}}
    <div class="container mt-5">

        <h1 class="text-center" style="font-family: 'night' !important;">All Blogs</h1>
        <div class="row mt-5">
            @foreach ($blogs as $blog)
                <div class="col-md-4">
                    <div class="item">
                        <div class="card mb-3 testimonial mt-5"
                            style="border-radius: 10px !important; border: none; align-items:start!important; ">
                            <img src="https://clickadmin.searchmarketingservices.online/storage/{{ $blog->image }}"
                                alt="" style=" width: 400px; border-radius: 30px">
                            <div class="des-container">
                                <p class="date-time text-end" style="float: right !important;
                            ">
                                    {{ $blog->created_at }}</p>
                            </div>
                            <div class="card-body" style="padding: 0!important;">
                                <h5 class="card-title " title="{{ $blog->title }}"
                                    style="
                                font-size: 22px;
                                font-family: 'night';
                                font-weight: 400;
                                margin-top: 10px;
                            ">
                                    {{ Str::limit($blog->title, 50) }} </h5>
                                <p class="card-text" title="{{ $blog->short_description }}"
                                    style="    font-size: 10px;
                                font-family: 'poppins';
                                font-weight: 400;
                                margin-top: 10px;">
                                    {{ Str::limit($blog->short_description, 100) }}</p>
                                <p class="card-text"
                                    style="    font-size: 10px;
                            font-family: 'poppins';
                            font-weight: 400;
                            margin-top: 10px;">
                                    {{-- <button onclick="window.location.href='/blog/{{ $blog->slug }}';">Read this
                                        article</button> --}}
                                    <a href="/blog/{{ $blog->slug }}">Read this article</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="heading-text hs-border">
            <h3>
                ORGANIZE YOUR EVENT OR SPECIAL DAY & <span class="bold-text"> IMMORTALIZE </span>YOUR MEMORIES
            </h3>
            <p>
                Digitize Your Invites, Control your guest List.

            </p>
        </div>

        <div class="form-container new-form form-153">
            <input type="email" placeholder="Enter your email address">
            <button class="btn-new" type="submit" id="register">Get Started</button>
        </div>
    </div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
     $('#register').click(function() {
            window.location.href = "{{ url('/register') }}";
        });
</script>

