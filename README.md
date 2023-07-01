# kiwp-classic 1.2.1
WordPressクラシックテーマ標準テンプレート

ki-orion 1.0 よりフォーク

# 必須プラグイン
+ WP Multibyte Patch 
+ Classic Editor

## 推奨プラグイン
+ All In One WP Security
+ Font Awesome
+ XML Sitemap Generator for Google

## 非推奨プラグイン
+ All in One SEO（ogタグなどが重複する。プラグイン自体のアップデート時のトラブルや破壊的アップデートが多いため推奨できない）

# CSSクラス
## グリッド
作り方は基本的にBootstrapと同じ。グリッドのコンテナ内にカラムを入れます。  

| Bootstrap | ki-orion | 備考 |
| :-------------: |:-------------|:-----|
| row | float, float-nm | 子要素をfloatでレイアウト。子要素の両側のマージン分コンテナを広げます。-nmはコンテナの拡張無し。 |
| - | flex, flex-r, flex-nm, flex-nmr | 子要素をflexboxのstrechでレイアウト。-rはrow-reverse（右詰め）になります。 |
| - | flex-sp-eq | 子要素を等幅分割 |
| - | flex-tab-eq | 577px以上で子要素を等幅分割。576px以下では子要素を縦並び。 |
| - | flex-pc-eq | 769px以上で子要素を等幅分割。768px以下では子要素を縦並び。 |
| col-xs-* | col-sp-*, col-sp-*r | *にはグリッド数を入れます。576px以下にも適用。-*rはfloat:right;がかかっていて右詰になります。（以下同じ） |
| col-sm-* | col-tab-*, col-tab-*r | 577px～768pxに適用。576px以下では1カラムになります。 |
| col-md-* | col-pc-*, col-pc-*r | 769px以上に適用。768px以下では1カラムになります。 |
| col-lg-*, col-xl-* | 対応無し |
| 対応無し | col-*, col-*r | 769px以上に適用。577px～768pxでは2カラムに、576px以下では1カラムになります。 |

## その他のクラス名と役割
| クラス名 | 役割 |
|:-------------:|:-------------|
| container | 最大幅960px、両側にマージン |
| clear | clear:both;を要素に設定 |
| clearfix | 要素にclearfixを設定 |
| list-style-none | リストの行頭記号と段落ちをなくします。 |
| text-left, text-right, text-center, text-justify | text-align:の値の設定。 |
| table-fix | 表の幅を100％にする。なお、表はデフォルトで幅100%となる。 |
| table, middle-container | display:table;にする。 |
| table-cell | display:table-cellにする。 |
| middle-item | display:table-cell;にして、中の要素を上下中央揃えにする。 |
| sp-center | 576px以下で中央に配置する |
| mt-* | margin-topの設定。*には設定したいピクセル数を入れる。20pxまでは5刻み。20px以上は10px刻みで60pxまで設定可能。 |
| mb-* | margin-bottomの設定。*には設定したいピクセル数を入れる。20pxまでは5刻み。20px以上は10px刻みで60pxまで設定可能。 |
| pc, pc-inline | 769px以上で表示、768px以下ではdisplay:none;で非表示。pcはdisplay:block;、-inlineはdisplay:inline;として表示する。（以下同様） |
| tab, tab-inline | 577px～768pxで表示、それ以外では非表示。 |
| sp, sp-inline | 576px以下で表示、それ以外では非表示。 |
| youtube | 中にyoutubeの埋め込みコードを入れるとレスポンシブ対応になる。アスペクト比16:9。埋め込みコードからはflameborder="0"を削除してvalidなコードにできる。 |
| gmap | 中にGoogle Mapの埋め込みコードを入れるとレスポンシブ対応になる。アスペクト比16:9。最大幅90% |
| breadclumb | パン屑リスト（ul）を囲む要素（nav推奨）にこのクラスを適用するとパン屑リストのスタイルになります。区切り文字は_parametor.scssでカスタマイズ可能。 |
| header-fix | スクロールしてもヘッダーを表示したい場合、ヘッダーにこのクラスを付けます。ヘッダーの高さは_parametor.scssで変更できます。 |

## imgのレスポンシブ処理について
alignleft, alignright, aligncenterでそれぞれ左寄せ、右寄せ、中心へ配置される。  
alignleft, arignrightで画像に回り込みを設定した場合、画像がグリッド（col-*など）の中にない場合、577px以上では最大幅50％、576px以下では回り込みが解除され、最大幅100％となる。  
元の画像のサイズが576px未満で、回り込みを解除したときには中央揃えにしたい場合はsp-centerを付ける。  
768px以下で回り込みを解除したい場合は、br-tab　のクラスを画像に設置する。  
また、576px以下でも回り込みを解除したくない場合は、br-no を画像に設置する。  

# 変更履歴
## var 0.1
+ ki-orion 1.0 から分離。2カラムを1カラムに。

## var 1.1
+ 原型完成

## var 1.2
+ header-image 未設定時の処理追加
+ ショートコード [cat_list cat="" num="" title=""] および [cat_tile cat="" num="" title=""] で投稿記事・固定ページ内にカテゴリー一覧を出力する機能を追加。
+ 固定ページのキービジュアル（アイキャッチ画像）にスマートフォン用の画像を登録できる機能を追加。
+ ショートコード [img file="" alt=""] により、テーマフォルダ内の img フォルダにある画像を出力する機能を追加。file="example.jpg" alt="代替テキスト" である。

### var 1.2.1
+ フッターのCSS追加