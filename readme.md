# MyForum
Proyecto basado en un foro realizado en Laravel 5.6 y Bootstrap v4.0.

**Instalación**

Para poder usar la aplicacion es necesario instalar PHP, Composer , Vagrant , Virtualbox y Node.js.

**PHP**

Link para instalar _PHP:_ http://php.net/manual/es/install.windows.php

**Composer**

Link para instalar _Composer:_ https://getcomposer.org/download/

**Vagrant**

Link para instalar _Vagrant:_ https://www.vagrantup.com/downloads.html

**VirtualBox**

Link para instalar _VirtualBox:_ https://www.virtualbox.org/wiki/Downloads

**Node.js**

Link para instalar _npm:_ https://nodejs.org/es/download/package-manager/

**Homestead**

Link para instalar _homestead:_ https://laravel.com/docs/5.6/homestead

**Tutorial paso a paso de la instalación por si no ha quedado claro:**

https://medium.com/eaimanshoshi/i-am-going-to-write-down-step-by-step-procedure-to-setup-homestead-for-laravel-5-2-17491a423aa

Una vez que se hayan completado todos los pasos, descargamos/clonamos el proyecto desde github en la carpeta que haya usted determinado para los proyectos Homestead.

_git clone https://github.com/Raojayou/myForum.git_

**Configuración**

Una vez descargado el proyecto, pasamos a la configuración, todos los pasos pueden ser modificados por el usuario.

**Homestead.yaml**

En primer lugar modificaremos el archivo Homestead.yaml ubicado en la carpeta Homestead.

![alt text](//)

**Hosts**

En segundo lugar modificaremos el archivo hosts con permisos de administrador.

En _Windows_ la ruta sería: C:\Windows\System32\drivers\etc

En _Linux_ se encuentra en: etc/hosts

![alt text](//)

Una vez realizados todos estos pasos, encendemos la máquina virtual, al añadir una base de datos, será necesario utilizar el siguiente comando en la carpeta de _Homestead:_

_vagrant up --provision_

El resto de veces que queramos iniciar vagrant, será necesario utilizar sólo este comando:

_vagrant up_

**.env**

Una vez realizado estos pasos, nos faltará configurar el archivo _.env_ del proyecto **MyForum.** 

Para ello podemos renombramos el archivo _.env.example_ o creamos un archivo _.env_, en cualquier caso, la configuración deberá ser así:

![alt text](//)

Para generar 'APP_KEY, deberá utilizar el siguiente comando:'

_php artisan key:generate_

**Base de datos**

Para la configuración de la base de datos, utilizará los datos del archivo _.env._

Accedemos a _Database -> New -> Data Source -> MySQL_

![alt text](//)

**Instalación de los componentes de MyForum**

Para instalar los componentes necesarios para que funcione correctamente el proyecto, se deberán utilizar los siguientes comandos:

_composer install_

_npm run dev_

Una vez que estemos conectados a la _Base de Datos_ y todos los componentes estén ya instalados, el usuario podrá utilizar el siguiente comando en el proyecto, este comando creará datos usando factorías, con información generada aleatoriamente con **$faker**.

_php artisan migrate:refresh --seed_

**Manual de uso de la aplicación**

Funcionalidades de la aplicación:

El usuario dispondrá de diferentes opciones dependiendo si está logeado o no.

**Usuario NO logeado**

En el navbar dispondrá de 2 opciones:

**Login:** nos permite logearnos en la página si ya disponemos de una cuenta.

**Registro** nos permite registrar un nuevo usuario.

El contenido principal de la página se divide en _tres secciones_:

* La parte superior posee una barra de navegación.

* En la parte central de la página aparecerán las siguientes opciones:
    * Mostrar Temas.
    * Cargar Datos.
* Si el usuario hace click en mostrar temas le aparecerá una lista de los títulos de todos los temas creados y si le hace click lo redireccionará a una página de vista en detalle de dicho tema.

* Los temas poseen la siguiente información:

    * Título del tema.
    * Categoría del tema.
    * Contenido del tema.
    * Fecha de creación del tema.
    
En la parte **izquierda superior** de la página, encontramos el **logo** del proyecto y el texto **MyForum**, al pulsarlos, nos redirecciona a la página principal.

**Vista de un tema en particular**

* Aquí dispondrá de toda la información acerca del tema al que ha accedido el usuario.

**Vista de un usuario en particular**

* En la parte superior encontrará el avatar del usuario e información detallada.

* Podrá ver todos los temas que ha creado dicho usuario.

**Usuario logeado**

Al logearse, el usuario tendrá funciones y permisos que no tiene al no estar logeado, a continuación les explicaré las nuevas funcionalidades, las anteriores se mantendrán igual.

* En la parte central, debajo de discusión general aparece las opción:

    * Añadir Tema. Aquí el usuario podrá añadir un nuevo tema.
    
    
* En la parte superior derecha si hace click en el nombre del usuario logeado, aparecerá un dropdown:
    
    * Perfil: Accedemos a una nueva sección, aquí podremos ver todos los datos del usuario.
            
       * Cuenta: Nos permite editar los datos de la cuenta del usuario (Nombre y Email).
       * Contraseña: Nos permite editar la contraseña del usuario (Contraseña Actual, Contraseña Nueva y Repetir Contraseña).
       * Avatar: Nos muestra el avatar del usuario.
       * Borrar Usuario: Nos permite borrar el usuario (No hay vuelta atrás al borrarlo).
            
    * Logout: Desconectamos la cuenta.

**Componentes utilizados en el proyecto**

//

_Componentes básicos para el funcionamiento de Bootstrap v4.0._

