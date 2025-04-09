const target = '.splide';

const target_options = {
  type: 'fade',
  rewind: true,
  autoplay: true,
  arrows: false,
  interval: 7000, //1枚のスライドをどのぐらい表示させておくか（次のスライド表示まで何秒かけるか。）⇒Swiperのautoplayのdelayに相当
  speed: 2000, //次のスライダーへの移動時間をミリ秒単位で指定（ミリ秒）
}
 
const mySplide = new Splide(target, target_options);

mySplide.mount();

const voiceSlide = '.voice-slide';

const voiceSlide_options = {
  type: 'fade',   // フェードエフェクト
  rewind: true,   // 最後まで行ったら最初に戻る
  autoplay: false, // 自動再生
  arrows: true,  // 矢印を非表示
  interval: 7000, // 7秒ごとにスライド
  speed: 2000     // 2秒かけてフェード
};

const myVoiceSlide = new Splide(voiceSlide, voiceSlide_options);

myVoiceSlide.mount();