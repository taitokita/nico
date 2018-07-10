<?php

use Illuminate\Database\Seeder;

use App\Shop;
use App\Tag;
use App\Review;

class ShopReviewSeeder extends Seeder{

public function run(){
	$content = 'この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。';

	$reviewdammy = 'コメントダミーです。ダミーコメントだよ。';

	for( $i = 1 ; $i <= 10 ; $i++) {
		$shop = new Shop;
		$shop->name = "$i 番目の投稿";
		$shop->content = $content;
		$shop->tag_id = 1;
		$shop->path = 0;
		$shop->user_id= 1;
		$shop->review_count= 0;
		
		$shop->save();
		
		

		$maxReviews = mt_rand(3, 15);
		for ($j=0; $j <= $maxReviews; $j++) {
			$review = new Review;
			$review->review = $reviewdammy;

			// モデル(Shop.php)のReviewsメソッドを読み込み、shop_idにデータを保存する
			$shop->reviews()->save($review);
			$shop->increment('review_count');
		}
	}

	// カテゴリーを追加する
	$tag1 = new Tag;
	$tag1->name = "和食";
	$tag1->save();

	$tag2 = new Tag;
	$tag2->name = "フレンチ";
	$tag2->save();
	
	$tag3 = new Tag;
	$tag3->name = "イタリアン";
	$tag3->save();

	$tag4 = new Tag;
	$tag4->name = "チャイニーズ";
	$tag4->save();
	
	$tag5 = new Tag;
	$tag5->name = "コリアン";
	$tag5->save();

	$tag6 = new Tag;
	$tag6->name = "スパニッシュ";
	$tag6->save();
	
	$tag7 = new Tag;
	$tag7->name = "インド";
	$tag7->save();

	$tag8 = new Tag;
	$tag8->name = "エスニック";
	$tag8->save();
	
	$tag9 = new Tag;
	$tag9->name = "居酒屋・Bar";
	$tag9->save();

	$tag10 = new Tag;
	$tag10->name = "Café";
	$tag10->save();

}
}