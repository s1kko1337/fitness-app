**Проект Fitness CRM**

**Описание**

Это проект на Laravel 12 (PHP 8.3), предназначенный для внутреннего управления фитнес-клубом.

**Основные возможности**

* Управление ролями: админ, тренер
* Расписание занятий: создание, редактирование, удаление
* Учет занятых комнат для тренеров
* Настройка группы: количество участников, уведомления о тренировках
* Админы выдают доступы для регистрации тренеров

---

## 📦 Стек технологий

* PHP 8.3, Laravel 12
* MySQL 8
* Nginx в Docker
* Redis
* Node.js + Vite + Vue.js для фронтенда
* Docker + Docker Compose
* Makefile для автоматизации команд
* Git Flow (ветки `master` (protected) и `develop`)

---

## 🚀 Установка и запуск

1. Клонируйте репозиторий:

   ```bash
   git clone https://github.com/s1kko1337/fitness-app fitness-crm
   cd fitness-crm
   ```

2. Скопируйте пример окружения и настройте:

   ```bash
   cp .env.example .env
   # Отредактируйте в соответствии с вашими потребностями 
   ```

3. Запустите установку через Makefile:

   ```bash
   make install
   ```

   Это выполнит по очереди:

    * `make down`   – остановка и удаление контейнеров
    * `make docker-build` – сборка образов
    * `make up`    – запуск контейнеров в фоне

---

## 📝 Makefile команды

```makefile
install:     # полный цикл (down, build, up)
build:       # сборка образов через docker-build
up:          # запустить контейнеры (docker-up)
down:        # остановить и удалить контейнеры (docker-down)
restart:     # перезапуск (down + up)
ps:          # показ запущенных контейнеров
logs:        # просмотр логов в реальном времени
docker-build:       # сборка PHP/FPM, PHP/CLI, nginx, nodejs
```

---

## 🌳 Git Flow

1. `master` — защищенная ветка для релизов
2. `develop` — основная ветка для разработки
3. Для новых фич:

   ```bash
   git checkout develop
   git checkout -b feature/your-feature-name
   ```
4. После завершения работы:

   ```bash
   git push origin feature/your-feature-name
   # создайте Merge Request в develop
   ```

---

## 🔧 Настройка `.env`

В репозитории есть `.env.example` с примерами ключей. Создайте собственный `.env` на основе него и заполните:

* `APP_WEB_PORT` — порт для nginx
* `DB_*` — параметры для MySQL
* `REDIS_HOST`, `REDIS_PASSWORD` и т.д.

---

## 🔗 Полезные ссылки

* Документация Laravel: [https://laravel.com/docs](https://laravel.com/docs)
* Redis команды: [https://redis-doc.netlify.app/commands/](https://redis-doc.netlify.app/commands/)

---
