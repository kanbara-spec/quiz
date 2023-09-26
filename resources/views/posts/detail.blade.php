<x-app-layout>
    
    <div id="hidden">
        @if(substr(url()->previous(), -4) == "show")
            @foreach ($answers as $answer)
                @if($answer->user_answer !== $post->answer )
                    <div class="backcolor"></div>
                    
                    <div class="frame">
                        <h1>不正解</h1>
                        <p id="OK">OK</p>
                    </div>
                @else
                    <div class="backcolor"></div>
                    
                    <div class="frame">
                        <h1>正解</h1>
                        <p id="OK">OK</p>
                    </div>
                @endif
            @endforeach
        @endif
    </div>
    
    
    
    @if (Auth::user()->is_like($post->id))

        {!! Form::open(['route' => ['likes.unlike', $post->id], 'method' => 'delete']) !!}
            {!! Form::submit('いいね！を外す', ['class' => "button btn btn-warning"]) !!}
        {!! Form::close() !!}

    @else

        {!! Form::open(['route' => ['likes.like', $post->id]]) !!}
            {!! Form::submit('いいね！を付ける', ['class' => "button btn btn-success"]) !!}
        {!! Form::close() !!}

    @endif
   
   <div class="text-right mb-2">いいね！
     <span class="badge badge-pill badge-success">{{ $count__users }}</span>
    </div>
    
    
    
    <!--<div>-->
    <!--    <img src="" alt="画像が読み込めません。"/>-->
    <!--</div>-->
    
    <div class="de_content">
        <h2>問題</h2>
        <h1 class="de question">{{ $post->question }}</h1>
            
        <h2>解答</h2>
        <h1 class="de answer">{{ $post->answer }}</h1>
            
        <h2>コメント</h2>
        @foreach ($comments as $comment)
               <p class="de comment"> {{ $comment->body }}</p>
        @endforeach

        <div class='paginate'>
            {{ $comments->links() }}
        </div>
        
        <form action="/{{$post->id}}/comments" method="POST">
            @csrf
            <h2 class="comment_write">コメントを書く</h2>
            <textarea class="de_text" name="comment[body]" placeholder=""></textarea>
            <div class="submit">
                <input type="submit" value="投稿"/>
            </div>
        </form>
    </div>
</x-app-layout>

