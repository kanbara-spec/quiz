'use strict'

function hamburger() {
  document.getElementById('line1').classList.toggle('line_1');
  document.getElementById('line2').classList.toggle('line_2');
  document.getElementById('line3').classList.toggle('line_3');
  document.getElementById('nav').classList.toggle('in');
}

document.getElementById('hamburger').addEventListener('click' , function () {
  hamburger();
} );



function deletePost(id) {
        'use strict'

        if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
            document.getElementById(`form_${id}`).submit();
        }
    }
    


const enter = document.querySelector('.enter');
const contents = document.querySelectorAll('.contents');

contents.forEach(function(value) {
  value.addEventListener('click', function() {
     enter.classList.add('show');
  });
});



const OK = document.getElementById('OK');
const hidden = document.getElementById('hidden');

OK.addEventListener('click' , function () {
  hidden.classList.add('hidden');
 } );


const I = document.getElementById('In');
I.addEventListener('click' , function () {
  console.log(document.referrer);
});






// ページ内のすべてのinput要素を取得
var inputElements = document.querySelectorAll('input');

// focusinイベントのリスナーを追加
inputElements.forEach(function(input) {
  input.addEventListener('focus', function() {
    // 親要素を取得し、その中からlabel要素を探してactiveクラスを追加
    var parentElement = this.parentElement;
    var labelElement = parentElement.querySelector('label');
    if (labelElement) {
      labelElement.classList.add('active');
    }
  });
});

// focusoutイベントのリスナーを追加
inputElements.forEach(function(input) {
  input.addEventListener('blur', function() {
    // 値が空であれば、親要素を取得し、その中からlabel要素を探してactiveクラスを削除
    var parentElement = this.parentElement;
    var labelElement = parentElement.querySelector('label');
    if (labelElement && !this.value) {
      labelElement.classList.remove('active');
    }
  });
});
