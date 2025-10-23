# Calculadora de Comisiones (Mini Core MVC)

Esta es una aplicación web simple construida en Laravel 12 diseñada para calcular las comisiones de ventas de un equipo de vendedores. La aplicación permite filtrar ventas por un rango de fechas y aplica un conjunto de reglas de negocio para determinar la comisión de cada vendedor.

El proyecto está dockerizado y listo para desplegarse en servicios como [Render](https://render.com/).

## Stack Tecnológico

* **Backend:** PHP / Laravel 12
* **Base de Datos:** PostgreSQL (Recomendado)
* **Frontend:** Blade, CSS (BEM), Vite
* **Despliegue:** Docker, Nginx + PHP-FPM

---

## Instalación y Ejecución Local

Sigue estos pasos para correr la aplicación en tu máquina local.

### Prerrequisitos

* PHP >= 8.3
* Composer
* Node.js & npm
* Una base de datos PostgreSQL local

### Pasos

1.  **Clonar el repositorio:**
    ```bash
    git clone [https://github.com/tu-usuario/mini-core-mvc.git](https://github.com/tu-usuario/mini-core-mvc.git)
    cd mini-core-mvc
    ```

2.  **Instalar dependencias de PHP:**
    ```bash
    composer install
    ```

3.  **Instalar dependencias de Node.js:**
    ```bash
    npm install
    ```

4.  **Configurar el entorno:**
    Copia el archivo de ejemplo y genera tu llave de aplicación.
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

5.  **Configurar la Base de Datos en `.env`:**
    Abre tu archivo `.env` y actualiza las variables `DB_*` para que apunten a tu base de datos PostgreSQL local.

    ```ini
    DB_CONNECTION=pgsql
    DB_HOST=127.0.0.1
    DB_PORT=5432
    DB_DATABASE=tu_base_de_datos
    DB_USERNAME=tu_usuario
    DB_PASSWORD=tu_contraseña
    ```

6.  **Ejecutar las migraciones:**
    Esto creará la estructura de tablas (`sellers`, `sales`, `rules`, etc.).
    ```bash
    php artisan migrate
    ```

7.  **¡Importante! Poblar la base de datos:**
    Este proyecto incluye datos de prueba esenciales. Ejecuta los *seeders*:
    ```bash
    php artisan db:seed
    ```

8.  **Iniciar los servidores:**
    Necesitas dos terminales abiertas:

    * **Terminal 1 (Servidor de Laravel):**
        ```bash
        php artisan serve
        ```

    * **Terminal 2 (Servidor de Vite):**
        ```bash
        npm run dev
        ```

9.  **¡Todo listo!**
    Abre tu navegador y visita [http://localhost:8000](http://localhost:8000).

---
