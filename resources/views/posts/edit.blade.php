<x-app-layout>
    <h1 class="title">編集</h1>
    
    @if($post->option1 == null)
        <form action="/posts/{{ $post->id }}" method="POST">
            <div class="cr_content">
                @csrf
                @method('PUT')
                <div class="cr_flex">
                    <div class="cr_left form">
                        <h2>問題</h2>
                        <input class="cr_text" type='text' name='post[question]' value="{{ $post->question }}">
                        <p class="question_error">{{ $errors->first('post.question') }}</p>
                    </div>
                    <div class="cr_right form">
                        <h2>解答</h2>
                        <input class="cr_answer" type='text' name='post[answer]' value="{{ $post->answer }}">
                        <p class="answer_error">{{ $errors->first('post.answer') }}</p>
                    </div>
                </div>
                <div class="submit">
                    <input type="submit" value="保存"/>
                </div>
            </div>
        </form>
    @endif
    
    @if($post->option1)
         <form action="/posts/{{ $post->id }}" method="POST">
            <div class="cr_content">
                @csrf
                @method('PUT')
                <div class="cr_left form">
                    <h2>問題</h2>
                    <input class="cr_text" type='text' name='post[question]' value="{{ $post->question }}">
                    <p class="question_error">{{ $errors->first('post.question') }}</p>
                </div>
                <h2>選択肢</h2>
                <div class="ed_optionflex">
                    <div class="form">
                        <input class="ed_option" type='text' name='post[option1]' value="{{ $post->option1 }}">
                        <p class="option_error">{{ $errors->first('post.option1') }}</p>
                    </div>
                    <div class="form">
                        <input class="ed_option" type='text' name='post[option2]' value="{{ $post->option2 }}">
                        <p class="option_error">{{ $errors->first('post.option2') }}</p>
                    </div>
                    <div class="form">
                        <input class="ed_option" type='text' name='post[option3]' value="{{ $post->option3 }}">
                        <p class="option_error">{{ $errors->first('post.option3') }}</p>
                    </div>
                </div>
                <div class="cr_right form">
                    <h2>解答</h2>
                    <input class="cr_answer" type='text' name='post[answer]' value="{{ $post->answer }}">
                    <p class="answer_error">{{ $errors->first('post.answer') }}</p>
                </div>
                <div class="submit">
                    <input type="submit" value="保存"/>
                </div>
            </div>
        </form>
    @endif
</x-app-layout>