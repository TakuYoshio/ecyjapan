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