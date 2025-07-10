
💉 Sistema de Gestión de Vacunas

Este sistema web permite registrar, administrar y gestionar **pacientes**, **doctores**, **vacunas** y **citas médicas** en una interfaz moderna, funcional y segura. Desarrollado con **PHP**, **MySQL** y **Bootstrap 5**, es ideal para centros de salud o consultorios que necesiten organizar la administración de vacunas.

---

🧩 Funcionalidades

### 👨‍⚕️ Doctores
- Registro y listado de doctores con especialidad, horario y contacto.
- Asignación de vacunas a cada doctor.

### 🧑 Pacientes
- Registro de pacientes con validaciones por DNI.
- Inicio de sesión con contraseña segura.

### 💉 Vacunas
- Agregar, editar y eliminar vacunas disponibles.
- Asignación de dosis, fabricante y fecha de caducidad.
- Relación entre vacunas y doctores responsables.

### 📅 Citas Médicas
- Separar cita desde cada vacuna.
- Datos de paciente, fecha y hora de atención.
- Mensaje personalizado para el doctor.

---

## 🔧 Tecnologías Usadas

- 💻 **PHP** (lógica del servidor)
- 🗄️ **MySQL** (base de datos relacional)
- 🧑‍🎨 **Bootstrap 5** (interfaz moderna y responsive)
- ✨ **HTML5 & CSS3**
- 🛠️ JavaScript (modales y acciones dinámicas)

---

## 🚀 Instalación Local

1. **Clona el repositorio**:
   
   git clone https://github.com/TU_USUARIO/sistema-vacunas.git


2. **Copia el proyecto** en tu carpeta `htdocs` de **XAMPP** o `www` de **Laragon**.

3. **Crea la base de datos**:

   * Abre **phpMyAdmin**
   * Crea una nueva base de datos (por ejemplo: `vacunas_db`)
   * Importa el archivo `database.sql` si está disponible.

4. **Configura el archivo `Conexion.php`**:
   Ajusta tus datos de conexión:

   
   $link = new mysqli("localhost", "root", "", "vacunas_db");
   

5. **Inicia el servidor local**:
   Abre tu navegador y accede a:

   
   http://localhost/sistema-vacunas/
   

## 📌 Requisitos

* PHP 7.4+
* MySQL / MariaDB
* Servidor local como XAMPP, Laragon o WAMP

---

## 🙋 Autor

**Luis Angeles**
📧 (luis20angeles08@gmail.com)
💻 Proyecto realizado como parte de un sistema de gestión médica.



