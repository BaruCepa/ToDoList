SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Databáze: `todo_project`
--
CREATE DATABASE IF NOT EXISTS `todo_project` DEFAULT CHARACTER SET utf8 COLLATE utf8_czech_ci;
USE `todo_project`;

-- --------------------------------------------------------

--
-- Struktura tabulky `todo`
--

DROP TABLE IF EXISTS `todo`;
CREATE TABLE `todo` (
  `name` varchar(150) NOT NULL,
  `description` text DEFAULT NULL,
  `is_done` tinyint(1) NOT NULL DEFAULT 0,
  `id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `todo`
--

INSERT INTO `todo` (`name`, `description`, `is_done`, `id`) VALUES
('Test', 'Testuji svůj To Do list', 0, 1);

--
-- Indexy pro tabulku `todo`
--
ALTER TABLE `todo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pro tabulku `todo`
--
ALTER TABLE `todo`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;
