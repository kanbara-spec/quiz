<x-app-layout>
    <h1 class="title">MyPage</h1>
    
    <div class="mypage">
        @if($user->posts->isEmpty()) 
            <a href="/posts/create">問題作成</a>
        @endif
    </div>
    
    <p>問題</p>
    <div class="my_flex">
        @foreach($user->posts as $post)
            @if($post->option1 == null)
                <div class="my_content">
                    <h1>問題</h1>
                    <p>{{ $post->question }}</p>
                    <h1>解答</h1>
                    <p>{{ $post->answer }}</p>
                    <div class="my_option">
                        <form action="/posts/{{ $post->id }}/delete" id="form_{{ $post->id }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn" type="button" onclick="deletePost({{ $post->id }})">削除</button> 
                        </form>
                        <a href="/posts/{{ $post->id }}/edit" class="my_right btn">編集</a>
                    </div>
                </div>  
            @endif
        @endforeach
    </div>
    
    <p class="choice">選択問題</p>
    <div class="my_flex">
        @foreach($user->posts as $post)
             @if($post->option1)
                <div class="my_content">
                    <h1>問題</h1>
                    <p>{{ $post->question }}</p>
                    <h1>選択肢</h1>
                    <div class="sh_option">
                        <p>{{ $post->option1 }}</p>
                        <p>{{ $post->option2 }}</p>
                        <p>{{ $post->option3 }}</p>
                    </div>
                    <h1>解答</h1>
                    <p>{{ $post->answer }}</p>
                    <div class="my_option">
                        <form action="/posts/{{ $post->id }}/delete" id="form_{{ $post->id }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn" type="button" onclick="deletePost({{ $post->id }})">削除</button> 
                        </form>
                        <a href="/posts/{{ $post->id }}/edit" class="my_right btn">編集</a>
                    </div>
                </div>  
            @endif
        @endforeach
    </div>
  
</x-app-layout>