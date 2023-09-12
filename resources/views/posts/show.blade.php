<x-app-layout>
    <h1 class="title">問題を解こう！！</h1>
    
    <div class="sh_flex">
        @foreach ($posts as $post)
            <div class="sh_content">
                @if($post->image_url)
                <div class="sh_image">
                    <img src="{{ $post->image_url }}" alt="画像が読み込めません。"/>
                </div>
                @endif
                <p>{{ $post->question }}</p>
                <form action="/{{ $post->id }}/answers"  method="POST">
                @csrf
                    <div class="sh_answer">
                        <input class="answer" type="text" name="answer[user_answer]" placeholder="解答"/>
                        <div class="submit">
                            <input type="submit" value="解答"/>
                        </div>
                    </div>
                </form>
            </div>
            
        @endforeach
    </div>
        
</x-app-layout>
