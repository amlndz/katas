## Kata DDD en TypeScript (Sin Clases)

**Título: Sistema de Gestión de Pedidos de una Tienda Online**

### **Enunciado:**

Eres responsable de desarrollar un sistema simple de gestión de pedidos para una tienda online. Actualmente, el código está estructurado de forma monolítica y sin una separación clara de responsabilidades. Tu objetivo es refactorizar el código utilizando los principios de Domain-Driven Design (DDD), dividiéndolo en capas bien definidas: Dominio, Aplicación e Infraestructura.

---

### **Requisitos del sistema:**

1. **Agregar un nuevo pedido:**

   - Cada pedido tiene un `id`, una `lista de productos` (nombre y cantidad) y un `estado` (pendiente, enviado, entregado).
   - Se debe registrar la fecha del pedido automáticamente.

2. **Actualizar el estado de un pedido:**

   - El estado de un pedido puede cambiar de "pendiente" a "enviado" o "entregado", pero nunca volver atrás.

3. **Listar pedidos:**
   - Mostrar la lista de pedidos con sus detalles.
4. **Filtrar pedidos por estado:**
   - Obtener solo los pedidos en un estado específico.

### **Tu tarea:**

1. **Refactorización a DDD:**

   - Organiza el código en capas: Dominio, Aplicación e Infraestructura.
   - Usa estructuras como funciones puras y objetos inmutables en lugar de clases.
   - Implementa un modelo de entidad para representar un pedido de manera adecuada.
   - Crea un repositorio para la gestión de pedidos (simulado en memoria).
   - Desarrolla un servicio de aplicación que gestione la lógica de negocio.

2. **Mantenimiento de funcionalidad:**

   - Asegúrate de que las funcionalidades existentes siguen funcionando correctamente después de la refactorización.

3. **Implementa pruebas unitarias:**
   - Añade tests para validar la funcionalidad del sistema tras la refactorización.

---

### **Criterios de aceptación:**

- El sistema debe permitir agregar, actualizar y listar pedidos sin modificar el estado de datos directamente.
- Se debe respetar la separación de responsabilidades de cada capa del sistema.
- La lógica de negocio debe estar separada de la infraestructura.
- No se deben utilizar clases, solo funciones y objetos inmutables.
