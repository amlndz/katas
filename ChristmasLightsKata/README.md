# Desafío: ¡Gana el Concurso de Decoración de luces de Navidad!

## Contexto
Tus vecinos te han estado derrotando año tras año en el concurso de decoración de casas para Navidad. Pero este año, has decidido desplegar **un millón de luces** en una cuadrícula de **1000x1000**. Además, Santa, impresionado por lo bien que te has portado, te ha enviado instrucciones para configurar la iluminación ideal.

### Detalles de la cuadrícula
- La cuadrícula de luces tiene coordenadas de **0 a 999** en ambas direcciones.
- Las esquinas de la cuadrícula son:
  - (0,0), (0,999), (999,999) y (999,0).
- Todas las luces comienzan apagadas.

### Instrucciones de Santa
Las instrucciones indican si debes **encender**, **apagar** o **alternar** luces en ciertas áreas definidas por pares de coordenadas. Cada par de coordenadas representa las esquinas opuestas de un rectángulo, e incluye todas las luces dentro de ese rectángulo.

Por ejemplo:
- `encender 0,0 a 2,2` se refiere a las luces dentro de un cuadrado de **3x3** (9 luces en total).
- Las acciones disponibles son:
  - **encender**: Enciende (o deja encendidas) las luces en el área especificada.
  - **apagar**: Apaga (o deja apagadas) las luces en el área especificada.
  - **alternar**: Cambia el estado de las luces: las apagadas se encienden y las encendidas se apagan.

## Ejemplos de instrucciones
- `encender 0,0 a 999,999` encendería todas las luces de la cuadrícula.
- `alternar 0,0 a 999,0` alternaría las luces de la primera fila (1000 luces).
- `apagar 499,499 a 500,500` apagaría las cuatro luces centrales.

## Tu misión
Configura las luces siguiendo las instrucciones de Santa y responde: **¿Cuántas luces están encendidas al final?**

### Instrucciones de Santa
```plaintext
encender 887,9 a 959,629
encender 454,398 a 844,448
apagar 539,243 a 559,965
apagar 370,819 a 676,868
apagar 145,40 a 370,997
apagar 301,3 a 808,453
encender 351,678 a 951,908
alternar 720,196 a 897,994
alternar 831,394 a 904,860
```


## Parte Dos: Brillo de las luces
Después de configurar tu cuadrícula, te das cuenta de que cometiste un error al interpretar las instrucciones de Papá Noel. En lugar de simplemente encender y apagar las luces, la cuadrícula cuenta con un control de **brillo individual**. Cada luz comienza con un brillo inicial de **cero** y puede incrementarse sin límite.

### Nuevas reglas de Santa
- **encender**: Incrementa el brillo de las luces afectadas en **1**.
- **apagar**: Reduce el brillo de las luces afectadas en **1**, pero nunca por debajo de **0**.
- **alternar**: Incrementa el brillo de las luces afectadas en **2**.

### Ejemplo:
- `encender 0,0 a 0,0` aumentará el brillo total en **1**.
- `alternar 0,0 a 999,999` incrementará el brillo total en **2,000,000**.

### Tu misión
Después de seguir las instrucciones de Santa bajo estas nuevas reglas, responde:  
**¿Cuál es el brillo total combinado de todas las luces en la cuadrícula?**

### Nuevas instrucciones de Santa
```plaintext
encender 887,9 a 959,629
encender 454,398 a 844,448
apagar 539,243 a 559,965
apagar 370,819 a 676,868
apagar 145,40 a 370,997
apagar 301,3 a 808,453
encender 351,678 a 951,908
alternar 720,196 a 897,994
alternar 831,394 a 904,860
