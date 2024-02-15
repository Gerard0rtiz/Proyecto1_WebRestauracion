-Primero se creó una nueva vista que se implementó en el header, dedicada a mostrar las reseñas, con sus respectivos filtros para ordenar de manera ascendente/descentente o mediante la puntuación que el usuario le asignó.
Tal y como se indica en la explicación del proyecto, las reseñas se obtuvieron a partir de una API creada desde cero con sus funciones y con método GET. Un problema que surgió fue que no sabía como montarla con POST y como me había informado y había entendido como hacerlo
con GET, decidí hacerlo de esa manera, pero por como tenia mi codigo de index.php, me vi forzado a ponerle a la funcion donde se encontraban todos los metodos que los JavaScripts usaban, tuve que llamar a la funcion INDEX(), no api.

-Mediante Javascript y la misma api, se realizaron los filtros de las reseñas anteriormente mencionados. Todos los Javascripts usados, estan en la carpeta "model".

-Para añadir una nueva reseña, lo que se hizo fue que cada vez que un usuario finalizaba una compra, se le abría una vista nueva donde le obliga a insertar una reseña, y aprovechando el espacio disponible en esa vista, también se adjuntó ahí la llamada a la API de un 
generador de QRs para que cuando el usuario lea el QR con su telefono, le abra la web de gerardortiz.bernat2024.es donde tenga visión de una vista con informacion sobre su pedido, como la fecha de pagado, el total, los productos, etc.

-Para el programa de puntos, se adjuntó en el carrito (siempre que haya algun producto en él), un input, un boton y un texto informativo, donde en el texto, el usuario pueda ver sus puntos disponibles y siempre que canjee alguno mediante el input y el boton, se le actualice
en tiempo real esa cantidad. Eso si, si el usuario decide no pagar el pedido y sale de la web, si vuelve, los puntos volveran a su valor inicial, como si no los hubiera canjeado, solamente en caso de realizar el pedido, se restaran de la BBDD. La regla que siguen los puntos
es la siguiente:
  para canjear -> 200 puntos = 1 euro de descuento
  para obtener -> 1 euro = 1 puntos para canjear en la proxima compra

-Las propinas, similar a los puntos, hay un slider para seleccionar el porcenaje a dar como extra, donde en la vista se visualiza el incremento en valor monetario que es la propina seleccionada, y luego un botón que si se le da, asigna la propina al 0%.

-Mediante checkboxes en la pagina de productos, y mediante un javascript, se realizó el filtrado de productos, usando display block o display none, tambien metodos de array como "map".

-Los principales problemas han sido a la hora de la API, tanto la creada desde cero como la del QR, pero sobretodo la creada, ya que muchas veces creaba metodos que realmente se debian hacer por php, y no por javascript ni api, confundiendome y haciendome perder
bastantes horas. Tambien he tenido problemas a la hora de implementar el NotieJS al proyecto ya que en el github no acaba de estar bien explicado. Y por ultimo, tambien he tenido problemas a la hora de implementar el proyecto y la bbdd a plesk ya que se explicó
en clase demasiado rapido y he tenido que estar importando los archivos del proyecto varias veces por tema de urls que enviaban a localhost o directamente porque revisaba el codigo y detectaba fallos, haciendo que perdiera tiempo luego en volver a importar esos
fallos corregidos al plesk.

-Para corregir los problemas con la api, simplemente he seguido usando el metodo GET, pero cambié esos metodos que pensaba que iban ahi, a hacerlos con PHP, y el QR lo solucioné simplemente concatenando la url a la que quería que me enviara el qr pero esa url
la codifiqué para que funcionara bien. Para la implementacion del notieJS simplemente estuve haciendo pruebas y buscando por diferentes webs para solucionar fallos absurdos como por ejemplo dejarme la etiqueta <script> en algunas vistas o creando mal las notificaciones.
Y para plesk simplemente he seguido importando el proyecto en él haciendo todas las pruebas pertinentes hasta tenerlo finalizado el proyecto.

usuarios disponibles:
  ADMIN-> username: admin
          pwd: 123

  USER-> username: user
          pwd: user
