<x-app-layout>
    <h1 class="title">問題を解こう！！</h1>
    
    <h1>文章問題</h1>
    <div class="sh_flex">
        @foreach ($posts as $post)
            @if($post->option1 == null)
                <div class="sh_content">
                    <!--<div class="sh_image">-->
                    <!--    <img src=" $post->image_url "/>-->
                    <!--</div>-->
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
            @endif
        @endforeach
    </div>
    
    <h1 class="choice">選択問題</h1>
    <div class="sh_flex">
        @foreach ($posts as $post)
            @if($post->option1)
                <div class="sh_content">
                    <p>{{ $post->question }}</p>
                    <div class="sh_option">
                        <p>{{ $post->option1 }}</p>
                        <p>{{ $post->option2 }}</p>
                        <p>{{ $post->option3 }}</p>
                    </div>
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
            @endif
        @endforeach
    </div>        
</x-app-layout>
