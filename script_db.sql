-- Servidor: 127.0.0.1 via TCP/IP
-- Tipo de servidor: MariaDB
-- Conexión del servidor: No se está utilizando SSL Documentación
-- Versión del servidor: 10.4.17-MariaDB - mariadb.org binary distribution
-- Versión del protocolo: 10
-- Usuario: root@localhost
-- Conjunto de caracteres del servidor: UTF-8 Unicode (utf8mb4)
--
-- Apache/2.4.46 (Win64) OpenSSL/1.1.1h PHP/8.0.1
-- Versión del cliente de base de datos: libmysql - mysqlnd 8.0.1
-- extensión PHP: mysqli Documentación curl Documentación mbstring Documentación
-- Versión de PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `test_crud_disc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbldisc`
--

CREATE TABLE `tbldisc` (
  `id` int(10) UNSIGNED NOT NULL,
  `disc_code` varchar(20) NOT NULL,
  `disc_name` varchar(50) NOT NULL,
  `disc_author` varchar(50) NOT NULL,
  `disc_qty` int(20) NOT NULL,
  `price` decimal(12,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbldisc`
--

INSERT INTO `tbldisc` (`id`, `disc_code`, `disc_name`, `disc_author`, `disc_qty`, `price`) VALUES
(8, '002', 'Vida Mia', 'Lucho Jara', 25, '2.50'),
(9, '003', 'Coco Loco', 'Lucho Jara', 15, '5.25'),
(10, '0001', 'Red Cazuelas de Chillan', 'Charros de Lumaco', 50, '1.25'),
(11, '004', 'Queso Eden', 'Charros de Lumaco', 30, '3.25'),
(12, '005', 'Kiwi de Verano', 'Willy Sabor', 20, '2.00'),
(13, '006', 'De quién es la guagua', 'Willy Sabor', 60, '4.25'),
(14, '007', 'Pimienta negra', 'Shakira', 5, '1.25'),
(15, '008', 'Miel de aveja', 'Shakira', 40, '3.00'),
(16, '009', 'De dia de noche', 'Shakira', 15, '1.50'),
(18, '0011', 'Waka Waka Eh Eh', 'Shakira', 22, '0.50'),
(19, '001', 'Vida vida vida', 'Shakira', 98, '3.25'),
(21, '0015', 'El disco de Shakira', 'Shakira', 49, '4.25');

--
-- Indices de la tabla `tbldisc`
--
ALTER TABLE `tbldisc`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `book_id` (`disc_code`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbldisc`
-- Inicia en 22
ALTER TABLE `tbldisc`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;