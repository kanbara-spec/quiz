<x-app-layout>
    <h1 class="title">MyPage</h1>
    
    <div class="my_flex">
        @foreach($user->posts as $post)
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
        @endforeach
    </div>
  
</x-app-layout>