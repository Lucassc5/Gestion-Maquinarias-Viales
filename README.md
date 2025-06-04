🚜 Gestión de Maquinarias Viales

Sistema web desarrollado con Laravel para la gestión de maquinaria vial. Permite administrar máquinas, asignarlas a proyectos, registrar mantenimientos, calcular kilómetros recorridos y generar alertas automáticas cuando una máquina supera cierto límite de uso.

🔧 Funcionalidades

- Registro y gestión de máquinas viales
- Asignación de máquinas a proyectos con fechas y kilómetros
- Registro de mantenimientos
- Cálculo acumulado de kilómetros por máquina
- Envío automático de alertas por email cuando una máquina supere los km deseados
- Exportación de datos (máquinas asignadas)
- Panel de administración con acciones: Editar, Finalizar, Eliminar


🛠️ Tecnologías utilizadas:

- Herd
- PHP 8.4
- Laravel 12
- MySQL
- Tailwind CSS
- Blade (Laravel templates)
- GitHub
- Composer

✉️ Configuración del correo de alerta con Mailtrap:
Utilice Mailtrap para los envios de correos electronicos, para el aviso de cuando una maquina llega a x cantidad de Km, por ej: cada 5000Km.

🛠️ Pasos para configurar Mailtrap:
1- Crear cuenta en Mailtrap:
    Ir a https://mailtrap.io
    Crear una cuenta gratuita
    Crear un inbox (buzón)

2- Obtener credenciales SMTP
    Dentro del inbox, hacer clic en "SMTP Settings" o "Integrations"
    Seleccionar Laravel como tipo de integración (opcional)
    Copiar los valores que aparecen

3- Configurar el archivo .env
    Abrí el archivo .env y reemplazá la sección de mail por las credenciales copiadas, por ej:
    
    MAIL_MAILER=smtp
    MAIL_HOST=sandbox.smtp.mailtrap.io
    MAIL_PORT=2525
    MAIL_USERNAME=TU_USERNAME
    MAIL_PASSWORD=TU_PASSWORD
    MAIL_ENCRYPTION=tls
    MAIL_FROM_ADDRESS=maquinarias@example.com
    MAIL_FROM_NAME="Gestión de Maquinarias"
    
Y listo, ahora cuando una maquina supere los 5000km, se enviara una alerta.
  
🧰 Requisitos previos

Antes de comenzar, asegurate de tener lo siguiente instalado:

✅ Opción recomendada: Herd

Herd ya incluye PHP, Composer. Ideal para entornos Laravel.

- 🔗 [Descargar Herd](https://herd.laravel.com)

🛠️ Manual (si no usás Herd)

- [PHP 8.x](https://www.php.net/)
- [Composer](https://getcomposer.org/)
- [MySQL](https://www.mysql.com/)
- [Git](https://git-scm.com/)
- [Node.js y npm](https://nodejs.org/) (para compilar assets como CSS)

  Instalación del proyecto:

1. Clonar el repositorio:
   
   git clone https://github.com/Lucassc5/Gestion-Maquinarias-Viales.git
   cd Gestion-Maquinarias-Viales


    Instalación de librerias:
   
1- composer install
npm install && npm run dev

2- cp .env.example .env

3- php artisan key:generate

4- Primero se debe configurar la base de datos en .env y ejecutar comando:
   php artisan migrate --seed

5-Recorda escribir en la consola:
    
    npm run dev
    
Esto habilitará los estilos de Tailwind.

6- Abrir el proyecto desde: Herd -> Sites -> URL
   Y esta listo para usar.

