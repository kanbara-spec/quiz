<x-app-layout>
    <h1 class="title">問題を作ろう！！</h1>
    
    <form action="/posts" method="POST" enctype="multipart/form-data">
        <div class="cr_content">
            @csrf
            <p>写真</p>
            <input type="file" name="post[img_path]">
            <div class="cr_flex">
                <div class="cr_left">
                    <h2>問題</h2>
                    <textarea class="cr_text" name="post[question]" placeholder=""></textarea>
                    <p class="question_error">{{ $errors->first('post.question') }}</p>
                </div>
                <div class="cr_right">
                    <h2>解答</h2>
                    <input class="cr_answer" type="text" name="post[answer]" placeholder="" />
                    <p class="answer_error">{{ $errors->first('post.answer') }}</p>
                </div>
            </div>
            <div class="submit">
                <input type="submit" value="投稿"/>
            </div>
        </div>
    </form>
</x-app-layout>
