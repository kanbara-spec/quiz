<x-app-layout>
    <h1 class="title">三択問題を作ろう！！</h1>
    
    <form action="/posts" method="POST">
        <div class="cr_content">
            @csrf
            <div class="cr3_question form">
                <h2>問題</h2>
                <textarea name="post[question]" placeholder="問題"></textarea>
                <p class="question_error">{{ $errors->first('post.question') }}</p>
            </div>
            <div class="cr3_option">
                <h2>選択肢</h2>
                <div class="option_flex">
                    <div class="form">
                        <input type="text" name="post[option1]" placeholder="選択肢1" />
                        <p class="option_error">{{ $errors->first('post.option1') }}</p>
                    </div>
                    <div class="form">
                        <input type="text" name="post[option2]" placeholder="選択肢2" />
                        <p class="option_error">{{ $errors->first('post.option2') }}</p>
                    </div>
                    <div class="form">
                        <input type="text" name="post[option3]" placeholder="選択肢3" />
                        <p class="option_error">{{ $errors->first('post.option3') }}</p>
                    </div>
                </div>
            </div>
            <div class="cr3_answer">
                <h2>解答</h2>
                <div class="form">
                    <input type="text" name="post[answer]" placeholder="解答" />
                    <p class="answer_error">{{ $errors->first('post.answer') }}</p>
                </div>
            </div>
            <div class="submit">
                <input type="submit" value="投稿"/>
            </div>
        </div>
    </form>

</x-app-layout>

