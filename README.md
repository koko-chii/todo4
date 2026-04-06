# Todoアプリ

このリポジトリは、laravelを使用したTodoアプリです。

## 環境構築

#### リポジトリをクローン

```
git clone git@github.com:koko-chii/todo4.git
```
#### ディレクトリの移動

```
cd todo4/src
```
#### .env ファイルの作成

```
cp .env.example .env
```
#### .env ファイルの修正

```
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel_db
DB_USERNAME=laravel_user
DB_PASSWORD=laravel_pass
```
#### ディレクトリの移動

```
cd ..
```
#### コンテナの起動

```
docker compose up -d --build
```
#### PHPライブラリのインストール

```
docker compose exec -u 1000 php composer install
```
#### PHPライブラリのインストール

```
npm install && npm run build
```
### キー生成

```
docker compose exec php php artisan key:generate
```
#### 権限の付与

```
docker compose exec php chmod -R 777 storage bootstrap/cache
```
### マイグレーション・シーディングを実行

```
docker-compose exec php php artisan migrate --seed
```
## 使用技術（実行環境）

フレームワーク：Laravel 8.83.8

言語：PHP 8.1 以上

Webサーバー：Nginx 1.21.1

データベース：MySQL 8.0.26

## ER図

![ER図](Todo.drawio.png)

## URL

アプリケーション：http://localhost/

phpMyAdmin：http://localhost:8080
