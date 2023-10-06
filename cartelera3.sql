-- MySQL dump 10.13  Distrib 8.0.28, for Win64 (x86_64)
--
-- Host: localhost    Database: cartelera2
-- ------------------------------------------------------
-- Server version	8.0.28

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `administrador`
--

DROP TABLE IF EXISTS `administrador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `administrador` (
  `id_adm` int NOT NULL AUTO_INCREMENT,
  `nom_usuario` varchar(255) NOT NULL,
  `apellido_usuario` varchar(255) NOT NULL,
  `clave_usuario` int NOT NULL,
  `rol` varchar(255) NOT NULL,
  PRIMARY KEY (`id_adm`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administrador`
--

LOCK TABLES `administrador` WRITE;
/*!40000 ALTER TABLE `administrador` DISABLE KEYS */;
INSERT INTO `administrador` VALUES (1,'Alejandro','Martinez',212121,'Admin');
/*!40000 ALTER TABLE `administrador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categoria` (
  `id_categoria` int NOT NULL AUTO_INCREMENT,
  `nom_categoria` varchar(255) NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (1,'Acción'),(2,'Comedia'),(3,'Drama'),(4,'Aventura'),(5,'Animación'),(6,'Fantasia'),(7,'Suspenso'),(8,'Terror'),(9,'Misterio'),(10,'Superhéroes'),(11,'Musical');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pelicula`
--

DROP TABLE IF EXISTS `pelicula`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pelicula` (
  `id_pelicula` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `trama` varchar(255) NOT NULL,
  `id_categoria` int NOT NULL,
  `publico` varchar(255) NOT NULL,
  `origen` varchar(255) NOT NULL,
  `duracion` int NOT NULL,
  `idioma` varchar(255) NOT NULL,
  `director` varchar(255) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id_pelicula`),
  KEY `id_categoria` (`id_categoria`),
  CONSTRAINT `pelicula_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pelicula`
--

LOCK TABLES `pelicula` WRITE;
/*!40000 ALTER TABLE `pelicula` DISABLE KEYS */;
INSERT INTO `pelicula` VALUES (12,'Barbie','Después de ser expulsada de Barbieland por no ser una muñeca de aspecto perfecto Barbie parte hacia el mundo humano para encontrar la verdadera felicidad.',11,'+13','Estados Unidos',114,'Castellano','Greta Gerwig',2200.88),(13,'Oppenheimer','Durante la Segunda Guerra Mundial el teniente general Leslie Groves designa al físico J. Robert Oppenheimer para un grupo de trabajo que está desarrollando el Proyecto Manhattan cuyo objetivo consiste en fabricar la primera bomba atomica.',3,'+14','Estados Unidos',180,'Subtitulada','Christopher Nolan',2200.88),(14,'Cacería en Venecia','En la década de 1940 en la Venecia de la posguerra el célebre detective belga Hércules Poirot se ve obligado a abandonar el retiro profesional para investigar el asesinato cometido durante una sesión de espiritismo en la que él mismo participaba.',7,'+12','Reino Unido',103,'Castellano','Kenneth Branagh',2000.88),(15,'La Monja II','Francia, 1956. El asesinato de un sacerdote provoca que un mal demoníaco se extienda sin control. La hermana Irene deberá enfrentarse, de nuevo, a la monja satánica Valak.',8,'+13','Estados Unidos',109,'Castellano','Michael Chaves',1900.88),(16,'Wonka','La historia se centra en el joven Willy Wonka y en cómo conoció a los Oompa-Loompas en una de sus primeras aventuras.',6,'Todo Público','Reino Unido',150,'Subtitulada','Paul King',3000.88),(17,'Wish: el poder de los deseos','En el Reino de Rosas, ubicado en la Península Ibérica, una chica de 17 años llamada Asha siente una oscuridad que nadie más siente, lo que la lleva a una súplica apasionada a las estrellas en un momento de necesidad.',6,'Todo Público','Estados Unidos',92,'Castellano','Chris Buck',3000.88),(18,'Blue Beetle','una antigua reliquia extraterrestre ,elige al estudiante Jaime Reyes como el huésped simbiótico en cuyo cuerpo resguardarse. A partir de ese momento, Jaime desarrolla una armadura que le otorga poderes increíbles e impredecibles.',4,'Todo Público','Estados Unidos',127,'Español','Ángel Manuel Soto',2000.88),(19,'Misión Imposible 7:Sentencia mortal-Parte 1','Ethan debe detener a una inteligencia artificial que todas las potencias mundiales codician, la cual se ha vuelto tan poderosa que se rebeló contra sus creadores y ahora es una amenaza en sí misma.',1,'+13','Estados Unidos',163,'Subtitulada','Christopher McQuarrie',3000.88),(20,'Elementos','En una ciudad en la que los elementos de fuego, agua, tierra y aire viven en distritos separados una chica de fuego y un chico de agua descubren que, aunque la sociedad les diga lo contrario, tienen muchas cosas en común.',4,'Todo Público','Estados Unidos',110,'Castellano','Peter Sohn',2100.88),(21,'La Sirenita','Una joven sirena que anhela conocer el mundo que se extiende donde acaba el mar emerge a la superficie y se enamora del príncipe Eric. Sin embargo, la única manera de estar con él exige hacer un pacto con Úrsula, la perversa bruja del mar.',5,'Todo Público','Estados Unidos',135,'Subtitulada','Rob Marshall',2100.88),(22,'Misántropo','La joven, talentosa pero traumatizada agente de policía Eleanor ayuda al FBI a localizar a un francotirador que está perpetrando asesinatos en masa en Baltimore. La mente atormentada de Eleanor es la única que puede predecir sus movimientos.',1,'+18','Estados Unidos',117,'Subtitulada','Darren Aronofsky',1700.88);
/*!40000 ALTER TABLE `pelicula` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proyeccion`
--

DROP TABLE IF EXISTS `proyeccion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `proyeccion` (
  `id_proyeccion` int NOT NULL AUTO_INCREMENT,
  `fecha` datetime NOT NULL,
  `id_pelicula` int NOT NULL,
  PRIMARY KEY (`id_proyeccion`),
  KEY `id_pelicula` (`id_pelicula`),
  CONSTRAINT `proyeccion_ibfk_1` FOREIGN KEY (`id_pelicula`) REFERENCES `pelicula` (`id_pelicula`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proyeccion`
--

LOCK TABLES `proyeccion` WRITE;
/*!40000 ALTER TABLE `proyeccion` DISABLE KEYS */;
INSERT INTO `proyeccion` VALUES (34,'2023-10-05 19:00:00',12),(35,'2023-10-10 15:30:00',13),(36,'2023-10-15 18:15:00',14),(37,'2023-10-20 20:30:00',15),(38,'2023-10-25 16:45:00',16),(39,'2023-10-30 14:00:00',17),(40,'2023-10-08 17:30:00',18),(41,'2023-10-12 19:45:00',19),(42,'2023-10-16 14:15:00',20),(43,'2023-10-22 21:00:00',21),(44,'2023-10-28 18:30:00',22);
/*!40000 ALTER TABLE `proyeccion` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-10-05 19:18:49
