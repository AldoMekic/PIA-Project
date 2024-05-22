@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
<div class="welcome-section">
    <!-- Upper Div -->
    <div class="upper-div">
        <h1>Welcome to Writer's Realm</h1>
        <x-text_card>
            This forum website is meant to help writers, readers and anyone interested in both writing and reading new stories to find newly created material, be it from beginners or long time experts.
        </x-text_card>
    </div>

    <!-- Middle Div -->
    <div class="middle-div">
        <x-text_card>
            Through this website, you will be able to find various posts regarding many literary topics, like writing stories, the development and work needed to make a story and many more from those who are actively part of this community.
        </x-text_card>
        <x-text_card>
            Follow various themes you may be interested in, allowing interaction between various members of the community to share their knowledge and love for writing. With posts and polls, you will be able to come in contact with various opinions that can help you refine your skill as a writer or allow you to know the work put into writing.
        </x-text_card>
        <x-text_card>
            For those who join our community, you will be able to make your own posts, follow and learn more about the themes that interest you and much more.
        </x-text_card>
    </div>

    <!-- Lower Div -->
    
    <div class="lower-div">
        <x-text_card>
            To be able to see the full extent of what our website offers, you will need to become part of the community. For our new arrivals, you will need to <a href="{{ route('register') }}" class="auth-link">register</a> yourselves to our page, while for those who already have accounts, you will need to <a href="{{ route('login') }}" class="auth-link">log in</a> to be able to access the website's full features.
        </x-text_card>
    </div>
    
</div>
@endsection