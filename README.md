# test_contact-form

<h2>環境構築</h2><br>
Dockerビルド<br>
<ol>
  <li>git clone </li>
  <li>composer install</li>
</ol>
※MySQLは、OSによって起動しない場合があるのでそれぞれのPCに合わせてdocker-compose.ymlファイルを編集してください。
<h2>Laravel構築環境</h2>
<ol>
  <li>docker-compose exec php bash</li>
  <li>composer install</li>
  <li>.env.exampleファイルから.envを作成し、環境変数を変更</li>
  <li>php artisan key:generate</li>
  <li>php artisan migrate</li>
  <li>php artisan db:seed</li>
</ol>
<h2>使用技術（実行環境）</h2>
<ul>
  <li>PHP 7.4.9</li>
  <li>Laravel 8.83.29</li>
  <li>MySQL 8.0</li>
</ul>
<h2>URL</h2>
<ul>
  <li>開発環境：<a href="http://localhost/">http://localhost/</a></li>
  <li>phpMyAdmin：<a href="http://localhost:8080/">http://localhost:8080/</a></li>
</ul>
