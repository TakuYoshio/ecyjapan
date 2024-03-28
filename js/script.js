// メイン画像
const img = [
  "/image/luna-kay-tCapTaW1qpo-unsplash.jpg",
  "/image/david-edelstein-N4DbvTUDikw-unsplash.jpg",
  "/image/jezael-melgoza-alY6_OpdwRQ-unsplash.jpg",
]

let imageCount = -1;
picChange();
function picChange() {
  imageCount++;
  if (imageCount == img.length) imageCount = 0;
  //画像選択
  changePic.src = img[imageCount];
  //秒数の指定
  setTimeout("picChange()", 4000);
}


// スライドショー
$('.slide-contents').slick({
  // autoplay:true, // 自動再生
  autoplaySpeed: 4000, // 再生速度（ミリ秒設定） 1000ミリ秒=1秒
  infinite: true, // 無限スライド
  arrows: true, // 矢印
  dots: true, // インジケーター
});