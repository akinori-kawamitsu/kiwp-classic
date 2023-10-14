# kiwp-classic 2.0
WordPressクラシックテーマ標準テンプレート
企業向け

## ver 1系との相違
+ 12+2グリッドシステムの破棄（細かいグリッドは利用シーンが限られるため）
+ カラム数　デスクトップ：2~6, タブレット：2~3, モバイル：1~2 の組み合わせに制限。 

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
## カラムコントロール
親要素に以下のクラス名を設定することで、等幅のグリッドを設定できる。
| クラス名 | 役割 |
|:-------------:|:-------------|
| pc-2 | デスクトップ：2カラム / タブレット：2カラム / モバイル：2カラム　で表示 |
| pc-3 | デスクトップ：3カラム / タブレット：2カラム / モバイル：2カラム　で表示 |
| pc-4 | デスクトップ：4カラム / タブレット：3カラム / モバイル：2カラム　で表示 |
| pc-5 | デスクトップ：5カラム / タブレット：3カラム / モバイル：2カラム　で表示 |
| pc-6 | デスクトップ：6カラム / タブレット：4カラム / モバイル：2カラム　で表示 |
| tab-1 | タブレット：1カラム / モバイル：1カラム　で表示 |
| tab-2 | タブレット：2カラム / モバイル：2カラム　で表示 |
| tab-3 | タブレット：3カラム / モバイル：1カラム　で表示 |
| sp-1 | モバイル：1カラム　で表示 |
| gap-* <br>gap-pc-* | グリッド間のギャップを設定する。*には数字を10刻みで入れる。gap-10なら10pxのギャップになる。<br>タブレットサイズでは半分のサイズになる。<br>モバイルでは全てgap: 5px 10pxになる。 |
| gap-tab-* | タブレットサイズで特別にギャップのサイズを指定したい場合に使う。10px刻みで30pxまで。 |
| gap-sp-* | モバイルサイズで特別にギャップのサイズをしていたい場合に使う。5px刻みで20pxまで。 |

親要素のクラス名に "flex" を設定し、各カラムになる子要素には "pc-*" "tab-*" "sp-*" を適宜設定する。

カラムの幅は全て同サイズ。

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
## ver 0.1
+ ki-orion 1.0 から分離。2カラムを1カラムに。

## ver 1.1
+ 原型完成

## ver 1.2
+ header-image 未設定時の処理追加
+ ショートコード [cat_list cat="" num="" title=""] および [cat_tile cat="" num="" title=""] で投稿記事・固定ページ内にカテゴリー一覧を出力する機能を追加。
+ 固定ページのキービジュアル（アイキャッチ画像）にスマートフォン用の画像を登録できる機能を追加。
+ ショートコード [img file="" alt=""] により、テーマフォルダ内の img フォルダにある画像を出力する機能を追加。file="example.jpg" alt="代替テキスト" である。

### ver 1.2.1
+ フッターのCSS追加

### ver 1.2.2
+ トップページの記事一覧の「もっと見る」ボタンの配置を修正

### ver 1.3.0
+ 記事ページに同一カテゴリの前後の記事へのリンク、同一カテゴリの他の記事へのリンクを追加。

### ver 1.3.1
+ スキップリンクを追加。ページ内リンクにスクロール機能を追加。

### ver 1.3.2
+ 変数を整理

### ver 1.3.3
+ ver1系最終バージョンとする。
+ function.php メディアサイズ（大）の制限を960pxに

### ver 2.0
+ 12+2グリッドシステムを破棄。カラムコントロールに差し替え
+ reset.scssチェック
+ chrome.scss, chrome.css, _grid.scss 廃止
+ viewport以外のscssパラメータを極力廃止
