<x-app-layout>
    <h1 class="title">問題を作ろう！！</h1>
    
    <form action="/posts" method="POST" enctype="multipart/form-data">
        
        <p>写真</p>
            <input type="file" name="image">
            
        <div class="cr_content">
            @csrf
            <div class="cr_flex">
                <div class="cr_left form">
                    <h2>問題</h2>
                    <textarea class="cr_text" name="post[question]" placeholder="問題"></textarea>
                    <p class="question_error">{{ $errors->first('post.question') }}</p>
                </div>
                <div class="cr_right">
                    <h2>解答</h2>
                    <div class="form">
                        <input class="cr_answer" type="text" name="post[answer]" placeholder="解答" />
                        <p class="answer_error">{{ $errors->first('post.answer') }}</p>
                    </div>
                </div>
            </div>
            <div class="submit">
                <input type="submit" value="投稿"/>
            </div>
        </div>
    </form>
</x-app-layout>

