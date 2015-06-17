CREATE DATABASE  IF NOT EXISTS `tg` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `tg`;
-- MySQL dump 10.13  Distrib 5.5.43, for debian-linux-gnu (i686)
--
-- Host: 127.0.0.1    Database: tg
-- ------------------------------------------------------
-- Server version	5.6.21

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `user_deleted` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'admin','$2y$10$6HkhubIT.3AKziGsdmHpI.vGgfWldombkv/U.06aJZ3I93csZV4BC','0000-00-00',NULL,0);
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomb_ape` varchar(50) NOT NULL,
  `ced` varchar(9) NOT NULL,
  `email` varchar(20) NOT NULL,
  `fech_ing` datetime NOT NULL,
  `cli_activo` tinyint(1) NOT NULL,
  `dir` text NOT NULL,
  `status_pag` int(11) NOT NULL,
  `extra` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ced` (`ced`,`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cont_serv`
--

DROP TABLE IF EXISTS `cont_serv`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cont_serv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `desc` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `id_serv` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fondo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `images` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cont_serv`
--

LOCK TABLES `cont_serv` WRITE;
/*!40000 ALTER TABLE `cont_serv` DISABLE KEYS */;
INSERT INTO `cont_serv` VALUES (1,'Pagina web sencilla','<p class=\"text_description\">Comparta información en la web de manera original, sencilla y económica con <strong>tecnographic</strong>. Perfecta para blogs y sites informativos.</p><p class=\"text_description\">El servicio de pagina web sencilla cuenta con:</p><ul class=\"text_description\">	<li>Galería estática de 12 imágenes.</li>	<li>Formulario de contacto.</li>	<li>Cinco módulos o páginas.</li>	<li>Versión para dispositivos móviles (opcional).</li>	<li>Hospedaje por un año.</li></ul>',1,'web_sencilla','fondo20-01.png',''),(2,'Pagina web estandar','<p class=\"text_description\">Comparta su contenido informativo y gráfico con diseños originales y altamente profesionales mientras se mantiene en contacto con sus usuarios. Gracias al servicio “Registro de usuario”, usted podrá clasificar a sus visitantes registrados para compartir con ellos información pertinente. Además, esta página cuenta con (Searching Engine Optimizer) SEO u Optimizadores de motores de búsqueda, lo cual permite que posibles usuarios encuentren su página fácilmente.</p><p class=\"text_description\">La página Estandar cuenta con:</p><ul class=\"text_description\">	<li>Galería dinámica.</li>	<li>Formulario de contacto.</li>	<li>Buscador.</li>	<li>Doce módulos o páginas.</li>	<li>Registro de usuario (Login)</li>		<li>SEO</li>	<li>Slidershow.</li>	<li>Hospedaje por un año.</li></ul>',1,'web_standar','fondo30-01.png',''),(3,'Tienda virtual','<p class=\"text_description\">Expanda o inicie su negocio en internet con <strong>tecnographic</strong>. Muestre su producto en galerías dinámicas, venda y facture virtualmente, contacte a su cliente de manera sencilla y rápida y manténgalo informado para nuevas promociones, boletines y pagos. ¡Haga que todos conozcan su negocio!</p> <p class=\"text_description\">La tienda virtual cuenta con:</p> <ul class=\"text_description\"> 	<li>Galería dinámica de fotos.</li> 	<li>Galería dinámica de productos.</li> 	<li>Formulario de contacto.</li> 	<li>Buscador.</li> 	<li>Doce links.</li> 	<li>Registro de usuario (Login).</li> 	<li>Registro de cliente</li> 	<li>SEO</li> 	<li>Animaciones sencillas y avanzadas.</li> 	<li>Autogestionable.</li> 	<li>Asesoría y entrenamiento para la autogestión.</li> 	<li>Carrito de compras.</li> 	<li>Facturas electrónica.</li> </ul>',1,'web_tienda','fondo10-01.png',''),(4,'Pagina web empresarial','<p class=\"text_description\">Maneje usted mismo la página de su empresa, contacte sus clientes o usuarios fácilmente y reciba asesorías para hacerlo de manera eficiente. ¡Esta página es autogestionable al 100%!</p> <p class=\"text_description\">La página empresarial cuenta con:</p> <ul class=\"text_description\"> 	<li>Galería dinámica.</li> 	<li>Formulario de contacto.</li> 	<li>Buscador.</li> 	<li>Doce links.</li> 	<li>Registro de usuario (Login).</li> 	<li>Registro de cliente</li> 	<li>SEO</li> 	<li>Animación.</li> 	<li>Autogestionable.</li> 	<li>Asesoría y entrenamiento para la autogestión.</li> </ul>',1,'web_empresa','fondo40-01.png',''),(5,'Pagina web Movil','',1,'web_moviles','fondo50-01.png',''),(6,'Logotipo',' <p class=\"text_description\">Un logotipo es un símbolo formado por imágenes y/o letras que puede identificar una empresa, marca, institución o sociedad y las cosas que tienen relación con ellas. El logo es esencial en la imagen corporativa de cualquier empresa, puede representar su esencia y generar empatía para con el cliente, lo cual impulsa su posicionamiento en el mercado altamente competitivo. ¡Diseñe su logo con <strong>tecnographic</strong> e impulse su empresa en el mercado!</p> <p class=\"text_description\">Para el diseño de su logo ofrecemos:</p> <ul class=\"text_description\"> 	<li>Tres (3) propuestas de diseño 100% originales.</li> 	<li>Dos sesiones de cambio y/o modificaciones.</li> 	<li>Entrega del arte en formato digital (un CD conteniendo su diseño)</li> </ul>',2,'logotipo','fondo60-01.png',''),(7,'Slogan','<p class=\"text_description\">El slogan o lema es una estrategia publicitaria que toda marca debe tener. Un slogan aplica la mnemotecnia, el cual es un proceso  de asociación mental que facilita el recuerdo de algo. Usted necesita que todos recuerden su marca, !Diseñe su lema y permanezca siempre en la mente de su target con <strong>tecnographic</strong>!</p>  <p class=\"text_description\">Para los diseños de Slogan le ofrecemos:</p> <ul class=\"text_description\"> 	<li>Tres (3) propuestas de diseños 100% originales.</li> 	<li>Dos (2) sesiones de cambio.</li> 	<li>Entrega del arte en formato digital (CD).</li> </ul>',2,'slogan','fondo10-01.png',''),(8,'Manual de imagen corporativa','<p class=\"text_description\">Un manual de imagen o identidad corporativa es un documento en el que se definen las normas para el uso e impresión de la marca y el logo de una empresa o institución.</p> <p class=\"text_description\"> Poseer un manual de imagen corporativa tiene muchas ventajas:</p> <ul class=\"text_description\"> 	<li>Ayudar a forjar y fortalecer el desarrollo de una marca.</li> 	<li>Evitar que los proveedores y aliados le den un mal uso al logo y a la imagen de una empresa, arruinándola frente a sus clientes y prospectos clientes.</li> 	<li>Brindar una imagen más profesional a un producto o servicio.</li> </ul> <p class=\"text_description\">Evítese logos estirados, bordes borrosos, tipografías incorrectas y colores diferentes diseñando el <strong>manual de identidad corporativa</strong> con <strong>tecnographic</strong>.</p>',2,'manual_imagen','fondo20-01.png',''),(9,'Tarjetas de presentacion',' <p class=\"text_description\">Diseñe su tarjeta de presentación con <strong>tecnographic</strong> y genere o incremente sus oportunidades de negocio, refuerce el contacto con las personas que lo rodean y respalde su estrategia de mercado de manera original mientras mantiene su identidad.</p> <p class=\"text_description\">Para el diseño de tarjetas de presentación le ofrecemos:</p> <ul class=\"text_description\"> 	<li>Tres (3) propuestas de diseños 100% originales.</li> 	<li>Dos (2) sesiones de cambio.</li> 	<li>Entrega del arte en formato digital (CD).</li> </ul>',2,'tarjetas_papel','fondo30-01.png',''),(10,'Papeleria corporativa','<p class=\"text_description\">La papelería corporativa es todo el material que se emplea para la comunicación de su empresa, negocio, servicio y/o productos. Los componentes de papelería corporativa son el contacto más permanente y directo con su cliente, quién reconocerá su imagen y recordará toda la información relacionada a la misma.</p>  <p class=\"text_description\">Para sus diseños de papelería le ofrecemos:</p> <ul class=\"text_description\"> 	<li>Tres (3) propuestas de diseños 100% originales.</li> 	<li>Dos (2) sesiones de cambio.</li> 	<li>Entrega del arte en formato digital (CD).</li> </ul>',2,'papeleria','fondo40-01.png',''),(11,'Imagen Semantica','<p class=\"text_description\">La imagen semántica es un tipo de diseño que transmite significados propagandísticos o publicitarios con íconos sencillos pero, interpretables y memorables. Este tipo de diseño requiere de estudios intensivos de la sociedad y el target, en Tecnographic lo hacemos de manera profesional y atendiendo siempre a sus necesidades. Las marcas más grandes del mundo usan esta técnica para sus campañas publicitarias ¿Por qué usted no? Publicite su marca con imágenes semánticas diseñadas por <strong>tecnographic</strong> y su campaña tendrá éxito garantizado.</p>  <p class=\"text_description\">Para sus diseños de imagen semántica le ofrecemos:</p> <ul class=\"text_description\"> 	<li>Tres (3) propuestas de diseños 100% originales.</li> 	<li>Dos (2) sesiones de cambio.</li> 	<li>Entrega del arte en formato digital (CD).</li> </ul>',2,'img_semantica','fondo50-01.png',''),(12,'Flyers, Volantes y Afiche','<p class=\"text_description\">Los flyers, volantes y afiches son piezas gráficas que tienen el propósito de informar de manera directa, sencilla y atraciva acerca de un evento, servicio, marca o promoción. Garantice un diseño original, profesional y creativo con <strong>tecnographic</strong>.</p>  <p class=\"text_description\">Para sus diseños de flyers, afiches y/o volantes le ofrecemos:</p> <ul class=\"text_description\"> 	<li>Tres (3) propuestas de diseños 100% originales.</li> 	<li>Dos (2) sesiones de cambio.</li> 	<li>Entrega del arte en formato digital (CD).</li> </ul>',3,'afiche','fondo60-01.png',''),(13,'Tripticos y Dipticos','<p class=\"text_description\">Los dípticos y los trípticos son piezas gráficas de presentación que se usan mayormente para posibles clientes, clientes reales, proveedores y otras instituciones; a su vez para la emisión de mensajes propagandísticos (de ética-moral, religiosos o políticos). Para que estos consoliden su mensaje y la marca o institución que representan, los trípticos y los dípticos requieren máxima calidad de diseño, excelente nivel de impresión y originalidad. Estos factores harán que el target quiera conservarlos y de este modo no serían una inversión perdida. ¡En <strong>tecnographic</strong> le garantizamos que su inversión siempre dará frutos!</p>  <p class=\"text_description\">Para sus diseños de dípticos y trípticos le ofrecemos:</p> <ul class=\"text_description\"> 	<li>Tres (3) propuestas de diseños 100% originales.</li> 	<li>Dos (2) sesiones de cambio.</li> 	<li>Entrega del arte en formato digital (CD).</li> </ul>',3,'tript_dipt','fondo10-01.png',''),(14,'Empaque de producto','',3,'empaque','fondo20-01.png',''),(15,'Etiqueta de producto','',3,'etiq_prod','fondo30-01.png',''),(16,'Catalogo','',3,'catalogo','fondo40-01.png',''),(17,'Brochure','<p class=\"text_description\">Un brochure es un flyer, panfleto, tríptico o díptico que se usa para pasar información. Son también piezas publicitarias principalmente usadas para presentar una compañía u organización y sus productos y/o servicios a un target determinado, manteniendo siempre la identidad de gráfica de la empresa. ¡Diseñe el Brochure de su negocio y aumente  su reconocimiento ante su target!</p>  <p class=\"text_description\">Para el diseño de Brochures le ofrecemos:</p> <ul class=\"text_description\"> 	<li>Tres (3) propuestas de diseños 100% originales.</li> 	<li>Dos (2) sesiones de cambio.</li> 	<li>Entrega del arte en formato digital (CD).</li> </ul>',3,'brochure','fondo50-01.png',''),(18,'Invitaciones','',3,'invitaciones','fondo60-01.png',''),(19,'Gigantografia','',4,'gigantografia','fondo10-01.png',''),(20,'Fotografia de producto','',5,'fotografia_prod','fondo20-01.png',''),(21,'Fotografia de modelos','',5,'fotografia_model','fondo30-01.png',''),(22,'Fotografia de espacios','',5,'fotografia_espa','fondo40-01.png',''),(23,'Sistemas administrativos','',6,'','fondo50-01.png',''),(24,'Volantes','',-1,'volante','fondo60-01.png',''),(25,'Cracion de base de datos','',6,'base_datos','fondo10-01.png',''),(26,'analisis_sistema','',6,'','fondo60-01.png',''),(27,'Flyers','',-1,'af_vol_fly','fondo30-01.png',''),(28,'Se&ntilde;aletica','',3,'senialetica','fondo40-1.png','');
/*!40000 ALTER TABLE `cont_serv` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `logs` (
  `id_user` int(11) NOT NULL,
  `user` varchar(20) NOT NULL,
  `login` datetime NOT NULL,
  `logout` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logs`
--

LOCK TABLES `logs` WRITE;
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
INSERT INTO `logs` VALUES (1,'bakuryuthem0','2014-08-27 01:23:09','0000-00-00 00:00:00'),(1,'bakuryuthem0','2014-08-27 01:23:25','0000-00-00 00:00:00'),(1,'bakuryuthem0','2014-08-27 01:23:28','0000-00-00 00:00:00'),(1,'bakuryuthem0','2014-08-27 01:23:31','0000-00-00 00:00:00'),(1,'bakuryuthem0','2014-08-27 01:23:34','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `portafolio`
--

DROP TABLE IF EXISTS `portafolio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `portafolio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `desc` text COLLATE utf8_spanish_ci NOT NULL,
  `id_serv` int(11) NOT NULL,
  `fecha_ini` date NOT NULL,
  `fecha_entrega` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `portafolio`
--

LOCK TABLES `portafolio` WRITE;
/*!40000 ALTER TABLE `portafolio` DISABLE KEYS */;
/*!40000 ALTER TABLE `portafolio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servicios`
--

DROP TABLE IF EXISTS `servicios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servicios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `image` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `alt` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `servicios_desc` longtext CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servicios`
--

LOCK TABLES `servicios` WRITE;
/*!40000 ALTER TABLE `servicios` DISABLE KEYS */;
INSERT INTO `servicios` VALUES (1,'Diseño Web','diseno_web','diseno_web_alt.png','Herramienta de promoción y mercadeo online profesional. Planificación, diseño e implementación de sitios web.'),(2,'Imagen Corporativa','imagen_corporativa','imagen_corporativa_alt.png','Fortalezca la presencia de su compañia con una image profesional desarrollada,solida y bien definida'),(3,'Medios Impresos','medios_impresos','medios_impresos_alt.png','Le damos vida a su mensaje usando populares y valiosas herramientas: afiches, volantes, dípticos, tíipticos, catálogo, invitaciones.'),(4,'Publicidad Exterior','pub_exterior','pub_exterior_alt.png','Gigantografias y señaletica, señalizaciones internas y/o externas para su oficina o empresa de acuerdo a su imagen grafica'),(5,'Fotografia','fotografia','fotografia_alt.png','Una foto creativa puede ser muchas veches mas fuerte que un gran texto, ya que ayuda a simplificar el mensaje que se desea transmitir'),(6,'Sistemas Administrativos','sistema_administrativo','sistema_administrativo_alt.png','Desarrollamos sistemas administrativos web para la getion');
/*!40000 ALTER TABLE `servicios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `slides`
--

DROP TABLE IF EXISTS `slides`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `slides` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) NOT NULL,
  `tipo` int(11) NOT NULL,
  `alt` varchar(30) NOT NULL,
  `activo` int(11) NOT NULL DEFAULT '0',
  `deleted` int(11) DEFAULT '0',
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `slides`
--

LOCK TABLES `slides` WRITE;
/*!40000 ALTER TABLE `slides` DISABLE KEYS */;
INSERT INTO `slides` VALUES (7,'grand-theft-auto-5-1920x1080-wallpaper-16680.jpg',1,'',1,0,'2015-06-16','2015-06-16'),(8,'star-wars-battlefront-1920x1080-wallpaper-16473.jpg',1,'',1,0,'2015-06-16','2015-06-16'),(9,'metal-gear-rising-revengeance-game-1920x1080-wallpaper-16036.jpg',2,'',1,0,'2015-06-16','2015-06-16'),(11,'scorpion-mortal-kombat-x-1920x1080-wallpaper-15575.jpg',2,'',1,0,'2015-06-16','2015-06-16');
/*!40000 ALTER TABLE `slides` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-06-17 16:42:41
