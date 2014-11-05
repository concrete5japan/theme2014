theme2014
=========

concrete5-japan.org用テーマ2014年版

## themes制作について
* 各ページタイトル：記事ブロック内でページ制作時にh1タグを配置する。

## htmlファイルの保存先
* c5japan2014/work/

## css構成
* c5japan2014/css/bootstrap.min.css
* c5japan2014/css/font-awesome.min.css

### 追加cssの保存先
* c5japan2014/work/bootstrap-3.0.3/less/main.less
* c5japan2014/work/bootstrap-3.0.3/less/mainvariables.less
（brand-primaryとbrand-successの色を変更とそれにともなうbutton:hoverの設定変更に使用）

### bootstrap.lessの変更点
追加cssを追加
* main.less
* mainvariables.less

## 追加ライブラリ
* FontAwesome （http://fortawesome.github.io/Font-Awesome/）
* tile.js

## 画像ファイル
* c5japan2014/images内に保存
* concrete5 Japan 日本語公式サイト内のものは、http://concrete5-japan.org/ 内へリンク

## Grunt 関連
/themes/c5japan2014/work/bootstrap-3.0.3
内の`Gruntfile.js` から `bootstrap.less` ファイルを

/themes/c5japan2014/css
内の `bootstrap.min.css` にコンパイルしています。

`bootstrap.less` 末尾の `@import "main.less";` が Bootstrap 以外の css をまとめたファイルダッタと思います。今回はその中を修正して、 `main.less` と` bootstrap.min.css`（ `bootstrap.css` もかな）をpushしてます。

/themes/c5japan2014/work/bootstrap-3.0.3
npm install で各ツールをインストールしたと思うんですが、ここは教えてもらいながらやったのでうる覚えです。
私は、`grunt watch` で `grunt`を動かしてコンパイルしています。