<x-app-layout>
    <h1 class="title">編集</h1>
    
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
</x-app-layout>