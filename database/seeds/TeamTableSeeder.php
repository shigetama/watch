<?php

use Illuminate\Database\Seeder;
use App\Team;

class TeamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('teams')->insert([['name' => '埼玉西武ライオンズ', 'gametype_id' => 1],
                                 ['name' => '福岡ソフトバンクホークス', 'gametype_id' => 1],
                                 ['name' => '日本ハムファイターズ', 'gametype_id' => 1],
                                 ['name' => '東北楽天ゴールデンイーグルス', 'gametype_id' => 1],
                                 ['name' => 'オリックスバファローズ', 'gametype_id' => 1],
                                 ['name' => '千葉ロッテマリーンズ', 'gametype_id' => 1],
                                 ['name' => '広島東洋カープ', 'gametype_id' => 1],
                                 ['name' => '横浜DeNAベイスターズ', 'gametype_id' => 1],
                                 ['name' => '東京ヤクルトスワローズ', 'gametype_id' => 1],
                                 ['name' => '東京読売ジャイアンツ', 'gametype_id' => 1],
                                 ['name' => '阪神タイガース', 'gametype_id' => 1],
                                 ['name' => '中日ドラゴンズ', 'gametype_id' => 1],

                                 ['name' => '北海道コンサドーレ札幌', 'gametype_id' => 2],
                                 ['name' => 'ベガルタ仙台', 'gametype_id' => 2],
                                 ['name' => '鹿島アントラーズ', 'gametype_id' => 2],
                                 ['name' => '浦和レッズ', 'gametype_id' => 2],
                                 ['name' => '柏レイソル', 'gametype_id' => 2],
                                 ['name' => 'FC東京', 'gametype_id' => 2],
                                 ['name' => '川崎フロンターレ', 'gametype_id' => 2],
                                 ['name' => '横浜Fマリノス', 'gametype_id' => 2],
                                 ['name' => '湘南ベルマーレ', 'gametype_id' => 2],
                                 ['name' => '清水エスパルス', 'gametype_id' => 2],
                                 ['name' => 'ジュビロ磐田', 'gametype_id' => 2],
                                 ['name' => '名古屋グランパス', 'gametype_id' => 2],
                                 ['name' => 'ガンバ大阪', 'gametype_id' => 2],
                                 ['name' => 'セレッソ大阪', 'gametype_id' => 2],
                                 ['name' => 'ヴィッセル神戸', 'gametype_id' => 2],
                                 ['name' => 'サンフレッチェ広島', 'gametype_id' => 2],
                                 ['name' => 'サガン鳥栖', 'gametype_id' => 2],
                                 ['name' => 'Vファーレン長崎', 'gametype_id' => 2],

                                 ['name' => 'レバンガ北海道', 'gametype_id' => 3],
                                 ['name' => '栃木ブレックス', 'gametype_id' => 3],
                                 ['name' => '千葉ジェッツ', 'gametype_id' => 3],
                                 ['name' => 'アルバルク東京', 'gametype_id' => 3],
                                 ['name' => 'サンロッカーズ渋谷', 'gametype_id' => 3],
                                 ['name' => '川崎ブレーブサンダース', 'gametype_id' => 3],
                                 ['name' => '横浜ビーコルセアーズ', 'gametype_id' => 3],
                                 ['name' => '新潟アルビレックスBB', 'gametype_id' => 3],
                                 ['name' => '富山グラウジーズ', 'gametype_id' => 3],
                                 ['name' => '三遠ネオフェニックス', 'gametype_id' => 3],
                                 ['name' => 'シーホース三河', 'gametype_id' => 3],
                                 ['name' => '名古屋ダイアモンドドルフィンズ', 'gametype_id' => 3],
                                 ['name' => '滋賀レイクスターズ', 'gametype_id' => 3],
                                 ['name' => '京都ハンナリーズ', 'gametype_id' => 3],
                                 ['name' => '大阪エヴェッサ', 'gametype_id' => 3],
                                 ['name' => '西宮ストークス', 'gametype_id' => 3],
                                 ['name' => '島根スサノオマジック', 'gametype_id' => 3],
                                 ['name' => '琉球ゴールデンキングス', 'gametype_id' => 3],

                                 ['name' => 'エスポラーダ北海道', 'gametype_id' => 4],
                                 ['name' => 'ヴォスクオーレ仙台', 'gametype_id' => 4],
                                 ['name' => 'バルドラール浦安フットボールサラ', 'gametype_id' => 4],
                                 ['name' => 'フウガドールすみだ', 'gametype_id' => 4],
                                 ['name' => 'ASVペスカドーラ町田', 'gametype_id' => 4],
                                 ['name' => '湘南ベルマーレフットサルクラブ', 'gametype_id' => 4],
                                 ['name' => 'アグレミーナ浜松', 'gametype_id' => 4],
                                 ['name' => '名古屋オーシャンズ', 'gametype_id' => 4],
                                 ['name' => 'シュライカー大阪', 'gametype_id' => 4],
                                 ['name' => 'デウソン神戸', 'gametype_id' => 4],
                                 ['name' => 'バサジィ大分', 'gametype_id' => 4],

                                 ['name' => '東レアローズ', 'gametype_id' => 5],
                                 ['name' => '豊田合成トレフェルサ', 'gametype_id' => 5],
                                 ['name' => 'ジェイテクトSTINGS', 'gametype_id' => 5],
                                 ['name' => 'サントリーサンバーズ', 'gametype_id' => 5],
                                 ['name' => 'パナソニックパンサーズ', 'gametype_id' => 5],
                                 ['name' => '堺ブレイザーズ', 'gametype_id' => 5],
                                 ['name' => 'JTサンダーズ', 'gametype_id' => 5],
                                 ['name' => 'FC東京', 'gametype_id' => 5],


                               ]);
    }
}
