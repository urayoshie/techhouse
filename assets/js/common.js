// JavaScript Document

/*----------------------------------------------------------*/
/* ドロワー呼び出し */
/*----------------------------------------------------------*/
$(document).ready(function () {
  $('.drawer').drawer();
});


/*----------------------------------------------------------*/
/* メインビジュアル太陽の動き */
/*----------------------------------------------------------*/
$(document).ready(function () {
  $('.section-mv__sun').addClass('is-active');
});


/*----------------------------------------------------------*/
/* TOP_FunToTryスライダー */
/*----------------------------------------------------------*/
$(function () {
  $('.slider').slick({
    autoplay: true,
    autoplaySpeed: 0,
    speed: 28000,
    cssEase: "linear",
    slidesToShow: 1.2,
    swipe: false,
    arrows: false,
    pauseOnFocus: false,
    pauseOnHover: false,
  });
});


/*----------------------------------------------------------*/
/* Caseページ_カテゴリータブ */
/*----------------------------------------------------------*/
$(function () {
  $('.tab-title').on('click', function () {
    var index = $('.tab-title').index(this);
    $('.tab-title').removeClass('selected');
    $(this).addClass('selected');
    $('.tab-contents .tab-list.show').removeClass('show');
    $('.tab-contents .tab-list').eq(index).addClass('show');
  });
});


/*----------------------------------------------------------*/
/* case一覧ページ_カテゴリータブ_タブとコンテンツの連動 */
/*----------------------------------------------------------*/
$(function () {
  $('.case_tab').on('click', function () {
    $('.case_tab, .panel').removeClass('active');

    $(this).addClass('active');

    var index = $('.case_tab').index(this);
    console.log(index);
    $('.panel').eq(index).addClass('active');
  });
});


/*----------------------------------------------------------*/
/* case一覧ページ_カテゴリータブ_トップページからの推移時 */
/*----------------------------------------------------------*/
$(document).ready(function () {
  const urlParams = new URLSearchParams(window.location.search);
  console.log(urlParams.toString());

  let index = "";
  if (urlParams.toString().indexOf("1") !== -1) {
    index = "1";
  } else if (urlParams.toString().indexOf("2") !== -1) {
    index = "2";
  } else if (urlParams.toString().indexOf("3") !== -1) {
    index = "3";
  } else if (urlParams.toString().indexOf("4") !== -1) {
    index = "4";
  } else if (urlParams.toString().indexOf("5") !== -1) {
    index = "5";
  } else {
    index = "0";
  }

  var url = location.href;
  //indexOf:取得したURLに'case/page'が含まれていたら、その場所のindex番号を返す
  var indextext = url.indexOf('case/page');
  console.log(url);

  let number = 0;
  //-1だったら
  if (indextext == -1) {
    // sessionStorage にデータを保存
    sessionStorage.setItem("tabnumber", index);
  }

  console.log(indextext);

  // sessionStorage に保存したデータを取得
  number = sessionStorage.getItem("tabnumber");

  //共通の処理
  $('.case_tab, .panel').removeClass('active');
  $('.panel').eq(Number(number)).addClass('active');
  $('.case_tab').eq(Number(number)).addClass('active');
});


/*----------------------------------------------------------*/
/* Rectuitページ_カジュアル面談ボタン */
/*----------------------------------------------------------*/
// function PageTopAnime() {

//   var scroll = $(window).scrollTop(); //スクロール値を取得
//   if (scroll >= 200) { //200pxスクロールしたら
//     $('.casual_interview_btn').removeClass('DownMove');   // DownMoveというクラス名を除去して
//     $('.casual_interview_btn').addClass('UpMove');      // UpMoveというクラス名を追加して出現
//   } else {
//     if ($('.casual_interview_btn').hasClass('UpMove')) {//UpMoveというクラス名が既に付与されていたら
//       $('.casual_interview_btn').removeClass('UpMove'); //  UpMoveというクラス名を除去し
//       $('.casual_interview_btn').addClass('DownMove');  // DownMoveというクラス名を追加して非表示
//     }
//   }

//   var wH = window.innerHeight; //画面の高さを取得
//   var footerPos = $('#footer').offset().top; //footerの位置を取得
//   if (scroll + wH >= (footerPos + 300)) {
//     var pos = (scroll + wH) - footerPos + 300 //スクロールの値＋画面の高さからfooterの位置＋10pxを引いた場所を取得し
//     $('.casual_interview_btn').css('bottom', pos); //#page-topに上記の値をCSSのbottomに直接指定してフッター手前で止まるようにする
//   } else {
//     if ($('.casual_interview_btn').hasClass('UpMove')) {//UpMoveというクラス名がついていたら
//       $('.casual_interview_btn').css('bottom', '300px');// 下から10pxの位置にページリンクを指定
//     }
//   }
// }


/*----------------------------------------------------------*/
/* Contactページ */
/*----------------------------------------------------------*/
$(function () {
  $('select.placeholder').on('change', function () {
    if ($(this).val() == "") { //first_as_labelのvalueは空文字で出力される。
      $(this).css('color', '#A3A3A3')
    } else {
      $(this).css('color', '#333')
    }
  });
});



/*----------------------------------------------------------*/
/* アニメーション */
/*----------------------------------------------------------*/
//スクロールしたら動く
function slideAnime() {
  //====左に動くアニメーションここから===
  $('.leftAnime').each(function () {
    var elemPos = $(this).offset().top - 0;
    var scroll = $(window).scrollTop();
    var windowHeight = $(window).height();
    if (scroll >= elemPos - windowHeight) {
      //左から右へ表示するクラスを付与
      //テキスト要素を挟む親要素（左側）とテキスト要素を元位置でアニメーションをおこなう
      $(this).addClass("slideAnimeLeftRight"); //要素を左枠外にへ移動しCSSアニメーションで左から元の位置に移動
      $(this).children(".leftAnimeInner").addClass("slideAnimeRightLeft");  //子要素は親要素のアニメーションに影響されないように逆の指定をし元の位置をキープするアニメーションをおこなう
    }
  });

  //====下に動くアニメーションここから===
  $('.downAnime').each(function () {
    var elemPos = $(this).offset().top - 0;
    var scroll = $(window).scrollTop();
    var windowHeight = $(window).height();
    if (scroll >= elemPos - windowHeight) {

      // 下から上へ表示するクラスを付与
      // テキスト要素を挟む親要素（下）とテキスト要素を元位置でアニメーションをおこなう
      $(this).addClass("slideAnimeDownUp");
      // 要素を下枠外に移動しCSS アニメーションで下から元の位置に移動
      $(this).children(".downAnimeInner").addClass("slideAnimeUpDown");
      // 子要素は親要素のアニメーションに影響されないように逆の指定をし元の位置をキープするアニメーションをおこなう

    }
  });
}

// 画面をスクロールをしたら動かしたい場合の記述
$(window).scroll(function () {
  slideAnime();
});// ここまで画面をスクロールをしたら動かしたい場合の記述




//画面ロードしたら動く
function slideAnimeLoad() {
  //====左に動くアニメーションここから===
  $('.leftAnime.load').each(function () {
    var elemPos = $(this).offset().top - 30;
    var scroll = $(window).scrollTop();
    var windowHeight = $(window).height();
    if (scroll >= elemPos - windowHeight) {
      //左から右へ表示するクラスを付与
      //テキスト要素を挟む親要素（左側）とテキスト要素を元位置でアニメーションをおこなう
      $(this).addClass("slideAnimeLeftRight"); //要素を左枠外にへ移動しCSSアニメーションで左から元の位置に移動
      $(this).children(".leftAnimeInner").addClass("slideAnimeRightLeft");  //子要素は親要素のアニメーションに影響されないように逆の指定をし元の位置をキープするアニメーションをおこなう
    }
  });

  //====下に動くアニメーションここから===
  $('.downAnime.load').each(function () {
    var elemPos = $(this).offset().top - 0;
    var scroll = $(window).scrollTop();
    var windowHeight = $(window).height();
    if (scroll >= elemPos - windowHeight) {

      // 下から上へ表示するクラスを付与
      // テキスト要素を挟む親要素（下）とテキスト要素を元位置でアニメーションをおこなう
      $(this).addClass("slideAnimeDownUp");
      // 要素を下枠外に移動しCSS アニメーションで下から元の位置に移動
      $(this).children(".downAnimeInner").addClass("slideAnimeUpDown");
      // 子要素は親要素のアニメーションに影響されないように逆の指定をし元の位置をキープするアニメーションをおこなう

    }
  });
}

// 画面が読み込まれたらすぐに動かしたい場合の記述
$(window).on('load', function () {
  slideAnime();
});// ここまで画面が読み込まれたらすぐに動かしたい場合の記述



//====順番に左から右アニメーションここから===
//スクロールしたら動く
$(function () {
  $(window).scroll(function () {
    $('.fadein_lr').each(function () {
      var position = $(this).offset().top - 0;
      var scroll = $(window).scrollTop();
      var windowHeight = $(window).height();
      if (scroll > position - windowHeight + 200) {
        $(function () {
          $('.fadein_lr').each(function (i) {
            $(this).delay(i * 300).queue(function () {
              $(this).addClass('active');
            });
          });
        });
      }
    });
  });
});


// blurTriggerにblurというクラス名を付ける定義
function BlurTextAnimeControl() {
  $('.blurTrigger').each(function () { //blurTriggerというクラス名が
    var elemPos = $(this).offset().top - 0;//要素より、50px上の
    var scroll = $(window).scrollTop();
    var windowHeight = $(window).height();
    if (scroll >= elemPos - windowHeight) {
      $(this).addClass('blur');// 画面内に入ったらblurというクラス名を追記
    } else {
      $(this).removeClass('blur');// 画面外に出たらblurというクラス名を外す
    }
  });
}

// 画面が読み込まれたらすぐに動かしたい場合の記述
$(window).on('load', function () {
  BlurTextAnimeControl();
});// ここまで画面が読み込まれたらすぐに動かしたい場合の記述


//ios safari のアドレスバー表示時の100vh調整
const setFillHeight = () => {
  let vh = window.innerHeight * 0.01;
  document.documentElement.style.setProperty("--vh", `${vh}px`);
};

window.addEventListener("resize", setFillHeight);
setFillHeight(); // 初期表示時に一度実行する


/*----------------------------------------------------------*/
/* 「その他」にチェックが入っていない時は、テキストエリアは非活性 */
/*----------------------------------------------------------*/
document.addEventListener('DOMContentLoaded', function() {
  const form = document.querySelector('.wpcf7 form');
  if (!form) return;

  const checkboxes = form.querySelectorAll('input[name="your-status[]"]');
  const textarea = form.querySelector('textarea[name="your-status-other"]');
  if (!checkboxes.length || !textarea) return;

  // 「その他」チェックボックスを特定
  const otherCheckbox = Array.from(checkboxes).find(c => c.value.includes('その他'));
  if (!otherCheckbox) return;

  // 初期状態：非活性
  textarea.disabled = !otherCheckbox.checked;

  // その他チェックボックス変更時
  otherCheckbox.addEventListener('change', () => {
    const isChecked = otherCheckbox.checked;

    // 入力可／不可切替
    textarea.disabled = !isChecked;

    // エラー表示リセット
    const wrap = textarea.closest('.wpcf7-form-control-wrap');
    if (wrap) {
      wrap.classList.remove('wpcf7-not-valid');
      const tip = wrap.querySelector('.wpcf7-not-valid-tip');
      if (tip) tip.remove();
    }

    // クラスもリセット
    textarea.classList.remove('wpcf7-not-valid');
  });

  // 送信時のバリデーション
  document.addEventListener('wpcf7submit', function(event) {
    if (!otherCheckbox.checked) return; // 非活性なら無視

    const wrap = textarea.closest('.wpcf7-form-control-wrap');
    if (!wrap) return;

    // 送信前に古いエラーを消す
    wrap.classList.remove('wpcf7-not-valid');
    wrap.setAttribute('data-error-message', '');

    if (textarea.value.trim() === '') {
      event.preventDefault(); // 送信停止
      wrap.classList.add('wpcf7-not-valid');
    }
  }, false);
});


/*----------------------------------------------------------*/
/* フォーム_ドロップダウン選択時に色を帰る */
/*----------------------------------------------------------*/
jQuery(function($) {

  // ページロード時、value が空でない select は色をメインカラーに
  $('.wpcf7-form select').each(function() {
    if ($(this).val()) {
      $(this).css('color', 'var(--main-color)');
    }
  });

  // 選択が変わったとき
  $('.wpcf7-form select').on('change', function() {
    if ($(this).val()) {
      $(this).css('color', 'var(--main-color)'); // 選択済
    } else {
      $(this).css('color', '#A3A3A3'); // 初期のグレー
    }
  });

});


/*----------------------------------------------------------*/
/* フォーム_バリデーション_送信ボタンを押したときだけバリデーション表示 */
/*----------------------------------------------------------*/
//送信ボタンを押したらエラーメッセージ非表示
$(function () {
  //formタグにクラス追加
  $(".wpcf7-form").addClass("hide_error_message");

  //送信または確認ボタンをクリックしたとき
  $(".wpcf7-confirm, .wpcf7-submit").click(function () {
    //formからクラスを削除
    $(".wpcf7-form").removeClass("hide_error_message");
  });
});


/*----------------------------------------------------------*/
/* お問い合わせページ遷移時、職種選択された状態にする */
/*----------------------------------------------------------*/
document.addEventListener('DOMContentLoaded', function() {

  const select = document.getElementById('inquiry_type');
  if (!select) return;

  const params = new URLSearchParams(window.location.search);
  const type = params.get('type');

  // URLパラメータがあればセット
  if (type) {
    select.value = type;
  }

  // 初期判定＋変更時判定
  function updateState() {
    select.classList.toggle('is-empty', select.value === "");
  }

  updateState();
  select.addEventListener('change', updateState);

});


/*----------------------------------------------------------*/
/* メディア一覧ページ：SP用カスタムドロップダウン */
/*----------------------------------------------------------*/
const dropdown = document.querySelector('.archive__dropdown');
if (dropdown) {
  const selected = dropdown.querySelector('.archive__dropdown__selected');
  
  selected.addEventListener('click', function() {
    dropdown.classList.toggle('is-open');
  });

  // 外側をクリックしたら閉じる
  document.addEventListener('click', function(e) {
    if (!dropdown.contains(e.target)) {
      dropdown.classList.remove('is-open');
    }
  });
}